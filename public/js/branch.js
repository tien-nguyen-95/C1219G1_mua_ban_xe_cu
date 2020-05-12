function messenger(_text){
    $.toast({
        heading: 'Thông báo',
        text: _text,
        hideAfter: 3000,
        position: 'top-center',
        showHideTransition: 'slide',
        icon: 'success'
    })
}

function printErrorMsg (msg) {
    console.log(msg);
    $('span.alert-danger').remove();
    $.each( msg, function( key, value ) {
        $(`input[name=${key}]`).before(`<span class="alert-danger" >${value}</span>`);
    });
}

// function trash(){
//     $.get('/branch_trash').done(function(data){
//         $('#body').html(data);
//         $('.back').click(function(){
//             init();
//         });
//     });
// }

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
                            <a href="javascript:;" onclick="branch.getDetail(${v.id})"><i class="fa fa-edit"></i></a>
                            <a href="javascript:;" onclick="branch.remove(${v.id})"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    `
                );
            });
            $('#tbUser').DataTable();
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
            console.log(objAdd);
            $.ajax({
                url: "/branch",
                method: "POST",
                dataType: "json",
                contentType: 'application/json',
                data: JSON.stringify(objAdd),
                success: function (data) {

                        $('#branchModal').modal('hide');
                        messenger("Tạo mới thành công");
                        branch.showData();
                },error: function(errors) {
                    branch.showError(errors);
                }
            });
        }
        //update
        else {
            var objEdit = {};
            objEdit.name = $('#name').val();
            objEdit.phone = $('#phone').val();
            objEdit.address = $('#address').val();
            objEdit.id = $('#branchId').val();

            data = JSON.stringify(objEdit);
            console.log(JSON.stringify(objEdit));
            $.ajax({
                url: "/branch/" + objEdit.id,
                method: "PUT",
                // dataType: "json",
                contentType: 'application/json',
                data: data,
                success: function (data) {
                        $('#branchModal').modal('hide');
                        messenger("Cập nhật thành công");
                        branch.showData();
                },error: function(errors) {
                    branch.showError(errors);
                }
            });
        }

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
            $('#tbBranch tbody').empty();
            $.each(data, function (i, v) {
                $('#body').find('h1').text('Danh sách Chi nhánh đã xóa tạm');
                $('.row').first().find('a').remove();
                $('#tbBranch tbody').append(
                    `
                    <tr>
                        <td>${++i}</td>
                        <td>${v.name}</td>
                        <td>${v.phone}</td>
                        <td>${v.address}</td>
                        <td>
                            <a href="javascript:;" >hồi phục</a>
                            <a href="javascript:;" ><i class="fa fa-trash"></i>xóa</a>
                        </td>
                    </tr>
                    `
                );
            });
            $('#tbUser').DataTable();
        }
    });
}

branch.showError = function(errors){
    if(errors.status == 422){
        $('small.fieldError').remove();
        $.each(errors.responseJSON.errors, function(i,v) {
            $(`input[name=${i}]`).before(`<small class="text-danger fieldError">${v}</small>`);
        });
    }
    console.clear();
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
