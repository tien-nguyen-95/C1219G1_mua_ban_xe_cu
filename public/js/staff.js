var staff = {} || staff;

staff.showData = function () {
    $.ajax({
        url: "/staff/index",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $('#tbStaff tbody').empty();
            $.each(data, function (i, v) {
                $('#tbStaff tbody').append(
                    `
                    <tr>
                        <td>${++i}</td>
                        <td>${v.name}</td>
                        <td>${v.user.email}</td>
                        <td>${v.gender?"Nam":"Nữ"}</td>
                        <td>${dateForm(v.birthday)}</td>
                        <td>${v.phone}</td>
                        <td>${v.image}</td>
                        <td>${v.position.name}</td>
                        <td>${v.address}</td>
                        <td>${v.branch.name}</td>
                        <td>
                            <a href="javascript:;" title="Sửa" style="font-size:20px" onclick="staff.getDetail(${v.id})" ><i class="fa fa-edit"></i></a>
                            <a href="javascript:;" title="Chuyển tới thùng rác" style="font-size:20px;color:gray" onclick="staff.remove(${v.id})"><i class="fa fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    `
                );
            });
            $('#tbStaff').DataTable();
        }
    });
}


staff.showModal = function () {
    $('small.fieldError').remove();
    staff.resetForm();
    $('#staffModal').modal('show');
    selectData('user');
    selectData('branch');
    selectData('position');
};

staff.remove = function (id) {
let check = confirm("Bạn chắc chắn muốn xóa ???")
    if(check){
        $.ajax({
            url: "/staff/" + id,
            method: "DELETE",
            dataType: "json",
            contentType: 'application/json',
            success: function (data) {
                staff.showData();
                messenger("Xóa thành công");
            }
        });
    }
}

staff.getDetail = function (id) {
    selectData('user');
    selectData('branch');
    selectData('position');
    $.ajax({
        url: "/staff/" + id +"/edit",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $('#name').val(data.staffs.name);
            $('#user_id').val(data.staffs.user_id);
            $('#gender').val(data.staffs.gender);
            $('#birthday').val(data.staffs.birthday);
            $('#phone').val(data.staffs.phone);
            $('#image').val(data.staffs.image);
            $('#position_id').val(data.staffs.position_id);
            $('#address').val(data.staffs.address);
            $('#branch_id').val(data.staffs.branch_id);
            $('#staffId').val(data.staffs.id);
            $('#staffModal').find('.modal-title').text("Cập nhật nhân viên");
            $('#staffModal').modal('show');
            $('small.fieldError').remove();
        },
    });
}

staff.save = function () {
    if ($('#formStaff').valid()) {
        //create
        if ($('#staffId').val() == 0) {
            var objAdd = {};
            objAdd.name = $('#name').val();
            objAdd.user_id = $('#user_id').val();
            objAdd.gender = $('#gender').val();
            objAdd.birthday = $('#birthday').val();
            objAdd.phone = $('#phone').val();
            objAdd.image = $('#image').val();
            objAdd.position_id = $('#position_id').val();
            objAdd.address = $('#address').val();
            objAdd.branch_id = $('#branch_id').val();
            $.ajax({
                url: "/staff",
                method: "POST",
                dataType: "json",
                contentType: 'application/json',
                data: JSON.stringify(objAdd),
                success: function (data) {
                        $('#staffModal').modal('hide');
                        messenger("Tạo mới thành công !!!");
                        staff.showData();
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
                objEdit.user_id = $('#user_id').val();
                objEdit.gender = $('#gender').val();
                objEdit.birthday = $('#birthday').val();
                objEdit.phone = $('#phone').val();
                objEdit.image = $('#image').val();
                objEdit.position_id = $('#position_id').val();
                objEdit.address = $('#address').val();
                objEdit.branch_id = $('#branch_id').val();
                objEdit.id = $('#staffId').val();
                data = JSON.stringify(objEdit);

                $.ajax({
                    url: "/staff/" + objEdit.id,
                    method: "PUT",
                    contentType: 'application/json',
                    data: data,
                    success: function (data) {
                        $('#staffModal').modal('hide');
                        messenger("Cập nhật thành công !!!");
                        staff.showData();
                    },error: function(errors) {
                        showError(errors);
                    }
                });
            }
        }
    }
}

staff.restore = function(id){
    let check = confirm("Bạn chắc chắn muốn khôi phục ???")
    if(check){
        $.ajax({
            url: "/staff/restore/" + id,
            method: "GET",
            dataType: "json",
            contentType: 'application/json',
            success: function (data) {
                staff.getTrash();
                messenger("KHôi phục thành công !!!");
            }
        });
    }
}

staff.delete = function(id){
    let check = confirm("Bạn chắc chắn muốn xoá ???")
    if(check){
        $.ajax({
            url: "/staff/delete/" + id,
            method: "GET",
            dataType: "json",
            contentType: 'application/json',
            success: function (data) {
                staff.getTrash();
                messenger("Xóa thành công");
            }
        });
    }
}

staff.resetForm = function () {
    $('#name').val("");
    $('#user_id').val("");
    $('#gender').val("1");
    $('#birthday').val("");
    $('#phone').val("");
    $('#image').val("");
    $('#position_id').val("");
    $('#address').val("");
    $('#branch_id').val("");
    $('#staffId').val("0");
    $('#staffModal').find('.modal-title').text("Thêm nhân viên mới");
    var form = $('#formStaff').validate();
    form.resetForm();
}

staff.getTrash = function() {
    $.ajax({
        url: "staff/trash",
        method: "GET",
        dataType: "json",
        success: function(data) {
            $('.row').first().replaceWith(
                `
                <div class="row">
                    <div class="col-12 mb-3">
                        <a href="javascript:;" class="btn btn-info" onclick="staff.back()" >Back</a>
                    </div>
                </div>
                `
            );
            $('#tableStaff').replaceWith(
                `
                <div class="col-12 table-responsive" id="tableStaff">
                    <table id="tbTrashStaff" class="table table-hover table-striped">
                        <thead >
                            <tr>
                                <th>STT</th>
                                <th>Tên Nhân viên</th>
                                <th>Email</th>
                                <th>Giới tính</th>
                                <th>Sinh nhật</th>
                                <th>Điện thoại</th>
                                <th>Ảnh</th>
                                <th>Chức vụ</th>
                                <th>Địa chỉ</th>
                                <th>Chi nhánh</th>
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
                $('#body').find('h1').text('Danh sách Nhân viên xóa tạm');
                $('#tbTrashStaff tbody').append(
                    `
                    <tr>
                        <td>${++i}</td>
                        <td>${v.name}</td>
                        <td>${v.user.email}</td>
                        <td>${v.gender?"Nam":"Nữ"}</td>
                        <td>${dateForm(v.birthday)}</td>
                        <td>${v.phone}</td>
                        <td>${v.image}</td>
                        <td>${v.position.name}</td>
                        <td>${v.address}</td>
                        <td>${v.branch.name}</td>
                        <td>
                            <a href="javascript:;" title="Phục hồi" style="font-size:30px;color:green" onclick="staff.restore(${v.id})" ><i class="fa fa-trash-restore"></i></a>
                            <a href="javascript:;" title="Xóa vĩnh viễn" style="font-size:30px;color:red" onclick="staff.delete(${v.id})" ><i class="fa fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    `
                );
            });
            $('#tbTrashStaff').DataTable();
        }
    });
}



staff.back = function() {
    $('.row').first().replaceWith(
        `
        <div class="row">
            <div class="col-12 mb-3">
                <a href="javascript:;" class="btn btn-info" onclick="staff.showModal()" id="addstaffBtn">Thêm mới</a>
                <a href="javascript:;" class="btn btn-info" style="float: right" onclick="staff.getTrash()"><i class="fa fa-trash"></i> Thùng rác</a>
            </div>
        </div>
        `
    );
    $('#tableStaff').replaceWith(
        `
        <div class="col-12 table-responsive" id="tableStaff">
            <table id="tbStaff" class="table table-hover table-striped">
                <thead >
                    <tr>
                        <th>STT</th>
                        <th>Tên Nhân viên</th>
                        <th>Email</th>
                        <th>Giới tính</th>
                        <th>Sinh nhật</th>
                        <th>Điện thoại</th>
                        <th>Ảnh</th>
                        <th>Chức vụ</th>
                        <th>Địa chỉ</th>
                        <th>Chi nhánh</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        `
    );
    staff.showData();
}

staff.init = function () {
    staff.showData();
}

$(document).ready(function () {
    staff.init();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
});
