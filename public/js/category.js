var category = {} || category;

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

category.showData = function () {
    $.ajax({
        url: "/category",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $('#tbCategory tbody').empty();
            $.each(data, function (i, v) {
                $('#tbCategory tbody').append(
                    `
                    <tr>
                        <td>${++i}</td>
                        <td>${v.name}</td>  
                        <td>${v.created_at}</td>
                        <td>
                            <a href="javascript:;" onclick="category.getDetail(${v.id})"><i class="fa fa-edit"></i></a>
                            <a href="javascript:;" onclick="category.remove(${v.id})"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    `
                );
            });
            $('#tbCategory').DataTable();
        }
    });
}

category.showTrash = function(){
    $.ajax({
        url: "/category-trash",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $('#tbCateTrash tbody').empty();
            $.each(data, function (i, v) {
                $('#tbCateTrash tbody').append(
                    `
                    <tr>
                        <td>${++i}</td>
                        <td>${v.name}</td>  
                        <td>${v.deleted_at}</td>
                        <td>
                            <a href="javascript:;" onclick="category.restore(${v.id})"><i class="fa fa-retweet"></i></a>
                            <a href="javascript:;" onclick="category.delete(${v.id})"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    `
                );
            });
            $('#tbCateTrash').DataTable();
        }
    });
}

category.getDetail = function (id) {
    $('.errors-name').empty();
    $.ajax({
        url: "/category/" + id +"/edit",
        method: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data);
            $('#name').val(data.categories.name);
            $('#categoryId').val(data.categories.id);
            $('#categoryModal').find('.modal-title').text("Cập nhật danh mục");
            $('#categoryModal').find('a').text("Cập nhật");
            $('#categoryModal').modal('show');
             // $('small.fieldError').remove();
        }
    });
}

category.save = function () {
    if($('#formCategory').valid()){
        if($('#categoryId').val() == 0){
            var objAdd = {};
            objAdd.name = $('#name').val();
            // console.log(objAdd);
            $.ajax({
                url: "/category",
                type: "POST",
                dataType: "json",
                contentType: 'application/json',    
                data: JSON.stringify(objAdd),
                success: function (data) {
                    console.log(data);
                    messenger("Tạo mới thành công");
                    $('#categoryModal').modal('hide');
                    category.showData();
                },
                error: function(data){
                    console.log(data);
                    $.each(data.responseJSON.errors, function(key, val){
                        $(`.errors-${key}`).text(val);
                    });
                }
            });
        }else{
            bootbox.confirm({
                title: "Cập nhật bây giở?",
                message: "Bạn có chắc muốn sửa danh mục này.",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Đóng'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> Có'
                    }
                },
                callback: function (result) {
                    
                    if(result){
                     
                        var objEdit = {};
                        objEdit.id = $('input[type=hidden]').val();
                        // console.log(objEdit.id);
                        objEdit.name = $('#name').val();
                        // console.log(objEdit.id);
                        $.ajax({
                            url: "/category/" + objEdit.id,
                            method: "PUT",
                            dataType: "json",
                            contentType: 'application/json',
                            data: JSON.stringify(objEdit),
                            success: function (data) {
                                category.showData();
                                $('#categoryModal').modal('hide');
                                messenger("Cập nhật thành công");
                                console.log(data);
                                
                            },
                            error: function(data){
                                console.log(data);
                                $.each(data.responseJSON.errors, function(key, val) {
                                    $(`.errors-${key}`).text(val);
                                });
                            }
                            
                        }); 
                    }
                }
            });
        }
    }
}

category.remove = function(id) {
    bootbox.confirm({
        title: "Remove Category?",
        message: "Do you want to remove the category now",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> No'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Yes'
            }
        },
        callback: function (result) {
            console.log('dele');
            if (result) {
                $.ajax({
                    url: "/category/" + id,
                    method: "DELETE",
                    dataType: "json",
                    contentType: 'application/json',    
                    success: function (data) {
                        category.showData();
                        category.showTrash();
                        bootbox.alert("Remove successfully");
                    }
                });
            }
        }
    });
}

category.resetForm = function () {
    $('#name').val("");
    $('#categoryId').val("0");
    $('.errors-name').empty();
    $('#formCategory').find('.modal-title').text("Thêm mới danh mục");
    $('#formCategory').find('a').text('Thêm');
    var form = $('#formCategory').validate();
    form.resetForm();
}

category.showModal = function () {
    // $('small.fieldError').remove();
    category.resetForm();
    $('#categoryModal').modal('show');
};

// category.getTrash = function(){
//     $("#showtrash").click(function(){
//         $("#category-trash").toggle();
//     });
//     // $('#category-trash').show();
// }

category.restore = function (id){
    $.ajax({
        type: "GET",
        url: "/category-restore/" + id,
        dataType: "JSON",
        success: function (data) {
            console.log(data);
            messenger("Khôi phục danh mục thành công");
            category.showTrash();
            category.showData();
        },
        error: function (errors){
            console.log(errors);
        }
    });
}

category.delete = function(id){
    bootbox.confirm({
        title: "Xóa danh mục?",
        message: "Bạn có chắc muốn xóa hoàn toàn danh mục?",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> No'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Yes'
            }
        },
        callback: function (result) {
            if (result) {
                $.ajax({
                    type: "DELETE",
                    url: "/category-delete/" + id,
                    dataType: "JSON",
                    success: function (data) {
                        console.log(data);
                        messenger("Xóa hoàn toàn danh mục thành công");
                        category.showTrash();
                        // category.showData();
                    },
                    error: function (errors){
                        console.log(errors);
                    }
                });
            }
        }
    });
}

category.init = function(){
    // category.formValidate();
    category.showTrash();
    category.showData(); 
}

$(document).ready(function () {
    category.init();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
