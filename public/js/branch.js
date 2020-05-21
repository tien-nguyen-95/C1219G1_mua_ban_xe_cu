var branch = {} || branch;

branch.showData = function () {
    $.ajax({
        url: "/branch",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $('#tbBranch tbody').empty();
            $.each(data, function (i, v) {
                $('#tbBranch tbody').append(
                    `
                    <tr>
                        <td>${++i}</td>
                        <td>${v.name}</td>
                        <td>${v.phone}</td>
                        <td>${v.address}</td>
                        <td>
                            <a href="javascript:;" title="Sửa" style="font-size:20px" onclick="branch.getDetail(${v.id})"><i class="fa fa-edit"></i></a>
                            <a href="javascript:;" title="Chuyển tới thùng rác" style="font-size:20px;color:gray" onclick="branch.remove(${v.id})"><i class="fa fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    `
                );
            });
            $('#tbBranch').DataTable();
        }
    });
}

branch.showModal = function () {
    $('small.fieldError').remove();
    branch.resetForm();
    $('#branchModal').modal('show');
};

branch.remove = function (id) {
let check = confirm("Bạn chắc chắn muốn xóa ???")
    if(check){
        $.ajax({
            url: "/branch/" + id,
            method: "DELETE",
            dataType: "json",
            contentType: 'application/json',
            success: function (data) {
                branch.showData();
                messenger("Xóa thành công");
            }
        });
    }
}

branch.getDetail = function (id) {
    $.ajax({
        url: "/branch/" + id +"/edit",
        method: "GET",
        dataType: "json",
        success: function (data) {
                $('#name').val(data.branches.name);
                $('#phone').val(data.branches.phone);
                $('#address').val(data.branches.address);
                $('#branchId').val(data.branches.id);
                $('#branchModal').find('.modal-title').text("Cập nhật chi nhánh");
                $('#branchModal').modal('show');
                $('small.fieldError').remove();
        }
    });
}

branch.save = function () {
    if ($('#formBranch').valid()) {
        //create
        if ($('#branchId').val() == 0) {
            var objAdd = {};
            objAdd.name = $('#name').val();
            objAdd.phone = $('#phone').val();
            objAdd.address = $('#address').val();
            $.ajax({
                url: "/branch",
                method: "POST",
                dataType: "json",
                contentType: 'application/json',
                data: JSON.stringify(objAdd),
                success: function (data) {
                        $('#branchModal').modal('hide');
                        messenger("Tạo mới thành công !!!");
                        branch.showData();
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
                objEdit.phone = $('#phone').val();
                objEdit.address = $('#address').val();
                objEdit.id = $('#branchId').val();

                data = JSON.stringify(objEdit);
                $.ajax({
                    url: "/branch/" + objEdit.id,
                    method: "PUT",
                    // dataType: "json",
                    contentType: 'application/json',
                    data: data,
                    success: function (data) {
                            $('#branchModal').modal('hide');
                            messenger("Cập nhật thành công !!!");
                            branch.showData();
                    },error: function(errors) {
                        showError(errors);
                    }
                });
            }
        }

    }
}

branch.restore = function(id){
    let check = confirm("Bạn chắc chắn muốn khôi phục ???")
    if(check){
        $.ajax({
            url: "/branch_restore/" + id,
            method: "GET",
            dataType: "json",
            contentType: 'application/json',
            success: function (data) {
                branch.getTrash();
                messenger("KHôi phục thành công !!!");
            }
        });
    }
}

branch.delete = function(id){
    let check = confirm("Bạn chắc chắn muốn xoá ???")
    if(check){
        $.ajax({
            url: "/branch_delete/" + id,
            method: "GET",
            dataType: "json",
            contentType: 'application/json',
            success: function (data) {
                branch.getTrash();
                messenger("Xóa thành công");
            }
        });
    }
}

branch.resetForm = function () {
    $('#name').val("");
    $('#phone').val("");
    $('#address').val("");
    $('#branchId').val("0");
    $('#branchModal').find('.modal-title').text("Thêm chi nhánh mới");
    var form = $('#formBranch').validate();
    form.resetForm();
}

branch.getTrash = function() {
    $.ajax({
        url: "branch_trash",
        method: "GET",
        dataType: "json",
        success: function(data) {
            $('.row').first().replaceWith(
                `
                <div class="row">
                    <div class="col-12 mb-3">
                        <a href="javascript:;" class="btn btn-info" onclick="branch.back()" >Back</a>
                    </div>
                </div>
                `
            );
            $('#tableBranch').replaceWith(
                `
                <div class="col-12 table-responsive" id="tableBranch">
                    <table id="tbTrashBranch" class="table table-hover table-striped">
                        <thead >
                            <tr>
                                <th>STT</th>
                                <th>Tên Chi Nhánh</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
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
                $('#body').find('h1').text('Danh sách Chi nhánh đã xóa tạm');
                $('#tbTrashBranch tbody').append(
                    `
                    <tr>
                        <td>${++i}</td>
                        <td>${v.name}</td>
                        <td>${v.phone}</td>
                        <td>${v.address}</td>
                        <td>
                            <a href="javascript:;" title="Phục hồi" style="font-size:30px;color:green" onclick="branch.restore(${v.id})" ><i class="fa fa-trash-restore"></i></a>
                            <a href="javascript:;" title="Xóa vĩnh viễn" style="font-size:30px;color:red" onclick="branch.delete(${v.id})" ><i class="fa fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    `
                );
            });
            $('#tbTrashBranch').DataTable();
        }
    });
}



branch.back = function() {
    $('.row').first().replaceWith(
        `
        <div class="row">
            <div class="col-12 mb-3">
                <a href="javascript:;" class="btn btn-info" onclick="branch.showModal()" id="addBranchBtn">Thêm mới</a>
                <a href="javascript:;" class="btn btn-info" style="float: right" onclick="branch.getTrash()"><i class="fa fa-trash"></i> Thùng rác</a>
            </div>
        </div>
        `
    );
    $('#tableBranch').replaceWith(
        `
        <div class="col-12 table-responsive" id="tableBranch">
            <table id="tbBranch" class="table table-hover table-striped">
                <thead >
                    <tr>
                        <th>STT</th>
                        <th>Tên Chi Nhánh</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        `
    );
    branch.showData();
}

branch.init = function () {
    branch.showData();
}

$(document).ready(function () {
    branch.init();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
});
