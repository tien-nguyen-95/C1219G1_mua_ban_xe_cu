var position = {} || position;

position.showData = function () {
    $.ajax({
        url: "/position",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $('#tbPosition tbody').empty();
            $.each(data, function (i, v) {
                $('#tbPosition tbody').append(
                    `
                    <tr>
                        <td>${++i}</td>
                        <td>${v.name}</td>
                        <td>${v.description}</td>
                        <td>
                            <a href="javascript:;" title="Sửa" style="font-size:20px" onclick="position.getDetail(${v.id})" ><i class="fa fa-edit"></i></a>
                            <a href="javascript:;" title="Chuyển tới thùng rác" style="font-size:20px;color:gray" onclick="position.remove(${v.id})"><i class="fa fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    `
                );
            });
            $('#tbPosition').DataTable();
        }
    });
}

position.showModal = function () {
    $('small.fieldError').remove();
    position.resetForm();
    $('#positionModal').modal('show');
};

position.remove = function (id) {
let check = confirm("Bạn chắc chắn muốn xóa ???")
    if(check){
        $.ajax({
            url: "/position/" + id,
            method: "DELETE",
            dataType: "json",
            contentType: 'application/json',
            success: function (data) {
                position.showData();
                messenger("Xóa thành công");
            }
        });
    }
}

position.getDetail = function (id) {
    $.ajax({
        url: "/position/" + id +"/edit",
        method: "GET",
        dataType: "json",
        success: function (data) {
                $('#name').val(data.positions.name);
                $('#description').val(data.positions.description);
                $('#positionId').val(data.positions.id);
                $('#positionModal').find('.modal-title').text("Cập nhật chức vụ");
                $('#positionModal').modal('show');
                $('small.fieldError').remove();
        }
    });
}

position.save = function () {
    if ($('#formPosition').valid()) {
        //create
        if ($('#positionId').val() == 0) {
            var objAdd = {};
            objAdd.name = $('#name').val();
            objAdd.description = $('#description').val();
            $.ajax({
                url: "/position",
                method: "POST",
                dataType: "json",
                contentType: 'application/json',
                data: JSON.stringify(objAdd),
                success: function (data) {
                        $('#positionModal').modal('hide');
                        messenger("Tạo mới thành công !!!");
                        position.showData();
                },error: function(errors) {
                    showError(errors);
                }
            });
        }
        //update
        else {
            let check = confirm("Bạn chắc chắn muốn thay đổi ???");
            if(check){
                var objEdit = {};
                objEdit.name = $('#name').val();
                objEdit.description = $('#description').val();
                objEdit.id = $('#positionId').val();
                data = JSON.stringify(objEdit);
                $.ajax({
                    url: "/position/" + objEdit.id,
                    method: "PUT",
                    // dataType: "json",
                    contentType: 'application/json',
                    data: data,
                    success: function (data) {
                            $('#positionModal').modal('hide');
                            messenger("Cập nhật thành công !!!");
                            position.showData();
                    },error: function(errors) {
                        showError(errors);
                    }
                });
            }
        }

    }
}

position.restore = function(id){
    let check = confirm("Bạn chắc chắn muốn khôi phục ???")
    if(check){
        $.ajax({
            url: "/position_restore/" + id,
            method: "GET",
            dataType: "json",
            contentType: 'application/json',
            success: function (data) {
                position.getTrash();
                messenger("KHôi phục thành công !!!");
            }
        });
    }
}

position.delete = function(id){
    let check = confirm("Bạn chắc chắn muốn xoá ???")
    if(check){
        $.ajax({
            url: "/position_delete/" + id,
            method: "GET",
            dataType: "json",
            contentType: 'application/json',
            success: function (data) {
                position.getTrash();
                messenger("Xóa thành công");
            }
        });
    }
}

position.resetForm = function () {
    $('#name').val("");
    $('#description').val("");
    $('#positionId').val("0");
    $('#positionModal').find('.modal-title').text("Thêm chi nhánh mới");
    var form = $('#formPosition').validate();
    form.resetForm();
}

position.getTrash = function() {
    $.ajax({
        url: "position_trash",
        method: "GET",
        dataType: "json",
        success: function(data) {
            $('.row').first().replaceWith(
                `
                <div class="row">
                    <div class="col-12 mb-3">
                        <a href="javascript:;" class="btn btn-info" onclick="position.back()" >Back</a>
                    </div>
                </div>
                `
            );
            $('#tablePosition').replaceWith(
                `
                <div class="col-12 table-responsive" id="tablePosition">
                    <table id="tbTrashPosition" class="table table-hover table-striped">
                        <thead >
                            <tr>
                                <th>STT</th>
                                <th>Tên chức vụ</th>
                                <th>Mô tả công việc</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                `
            );
            $.each(data, function (i, v) {
                $('#body').find('h1').text('Danh sách Chức vụ xóa tạm');
                $('#tbTrashPosition tbody').append(
                    `
                    <tr>
                        <td>${++i}</td>
                        <td>${v.name}</td>
                        <td>${v.description}</td>
                        <td>
                            <a href="javascript:;" title="Phục hồi" style="font-size:30px;color:green" onclick="position.restore(${v.id})" ><i class="fa fa-trash-restore"></i></a>
                            <a href="javascript:;" title="Xóa vĩnh viễn" style="font-size:30px;color:red" onclick="position.delete(${v.id})" ><i class="fa fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    `
                );
            });
            $('#tbTrashPosition').DataTable();
        }
    });
}



position.back = function() {
    $('.row').first().replaceWith(
        `
        <div class="row">
            <div class="col-12 mb-3">
                <a href="javascript:;" class="btn btn-info" onclick="position.showModal()" id="addpositionBtn">Thêm mới</a>
                <a href="javascript:;" class="btn btn-info" style="float: right" onclick="position.getTrash()"><i class="fa fa-trash"></i> Thùng rác</a>
            </div>
        </div>
        `
    );
    $('#tablePosition').replaceWith(
        `
        <div class="col-12 table-responsive" id="tablePosition">
            <table id="tbPosition" class="table table-hover table-striped">
                <thead >
                    <tr>
                        <th>STT</th>
                        <th>Tên Chức vụ</th>
                        <th>Mô tả</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        `
    );
    position.showData();
}

position.init = function () {
    position.showData();
}

$(document).ready(function () {
    position.init();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
});
