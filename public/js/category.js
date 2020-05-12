var category = {} || category;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    category.showdata = function() {
        $.ajax({
            url: "http://127.0.0.1:8000/category",
            method: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#categorydata tbody').empty();
                console.log(data);
                $.each(data, function (i, v) {
                    // alert(v.name);
                    $('#categorydata tbody').append(
                        `
                        <tr>
                            <td>${v.id}</td>
                            <td>${v.name}</td>
                            <td>${v.created_at}</td>
                            <td>
                                <a href="javascript:;" onclick="category.getDetail(${v.id})" class="btn btn-warning">Edit</a>
                                <a href="javascript:;" onclick="category.remove(${v.id})" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        `
                    );
                });
                $('#categorydata').DataTable(); 
            }
        });
    }
    


    category.showModal = function(){   
        // category.resetForm();    
        $('#categoryModal').modal('show');  
    } 
    
    category.save = function () {
        if ($('#frmAddEditCategory').valid()) {
            //create a category
            if ($('#CategoryId').val() == 0) {
                var objAdd = {};
                objAdd.name = $('#categoryName').val();
                // console.log(JSON.stringify(objAdd));
                console.log(objAdd);
                $.ajax({
                    url: "http://127.0.0.1:8000/category",
                    type: "POST",
                    dataType: "JSON",
                    contentType: 'application/json',    
                    data: JSON.stringify(objAdd),
                    success: function (data) {
                        console.log(data);
                        bootbox.alert("Thêm mới thành công");
                        $('#addEditModal').modal('hide');
                        category.showdata();
                        
                        
                    },
                    error: function(data){
                        // console.log(data.responseJSON.errors);
                        $.each(data.responseJSON.errors, function(i, v) {
                            $('.errors-categoryName').text(v);
                        });
                        // console.log(data.responseJSON.errors.categoryName[0]);
                    }
                });

            }else{     
                // update a category
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
                            objEdit.name = $('#categoryName').val();
                            // console.log(objEdit.id);
                            $.ajax({
                                url: "http://127.0.0.1:8000/category/" + objEdit.id,
                                method: "PUT",
                                dataType: "json",
                                contentType: 'application/json',
                                data: JSON.stringify(objEdit),
                                success: function (data) {
                                    $('#addEditModal').modal('hide');
                                    bootbox.alert("Cập nhật thành công!");
                                    console.log(data);
                                    category.showdata();
                                },
                                error: function(data){
                                    console.log(data.responseJSON.errors);
                                    $.each(data.responseJSON.errors, function(i, v) {
                                        $('.errors-categoryName').text(v);
                                    });
                                    // console.log(data.responseJSON.errors.categoryName[0]);
                                }
                                
                            }); 
                        }
                    }
                }); 
            }
        }    
    }

    category.getDetail = function (id) {
        $('#error').empty(); 
        $.ajax({
            url: "http://127.0.0.1:8000/category/" + id + "/",
            method: "get",
            dataType: "json",
            contentType: 'application/json', 
            success: function (data) {
                console.log(data);
                $('#categoryName').val(data.name);
                $('#CategoryId').val(data.id);
                $('#addEditModal').find('.modal-title').text("Update Category");
                $('#frmAddEditCategory').find('a').text('Update');
                $('#addEditModal').modal('show');
            },
            error: function (e){
                console.log(e);
            }
        });
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
                    url: "http://127.0.0.1:8000/category/" + id,
                    method: "DELETE",
                    dataType: "json",
                    contentType: 'application/json',    
                    success: function (data) {
                        bootbox.alert("Remove successfully");
                        category.showdata();
                        
                    }
                });
            }
        }
    });
    }

    category.resetForm = function () {

        $('#categoryName').val("");
        $('input:hidden[name=CategoryId]').val("0");
        $('#addEditModal').find('.modal-title').text("Thêm mới danh mục");
        $('#frmAddEditCategory').find('a').text('Thêm');
    
        var form = $('#frmAddEditCategory').validate();
        form.resetForm();
    }

    // category.formValid = function(){
    //     $("#frmAddEditCategory").validate({
    //         onfocusout: false,
    //         onkeyup: false,
    //         onclick: false,
    //         rules: {
    //             "categoryName": {
    //                 required: true,
    //                 maxlength: 60,
    //                 minlength: 3
    //             },
    //         },
    //         messages: {
    //             "categoryName": {
    //                 required: "Bắt buộc nhập tên danh mục",
    //                 maxlength: "Nhập ít hơn 60 ký tự",
    //                 minlength: "Nhập nhiều hơn 3 ký tự"
    //             },
    //         }
	//     });
    // }

    category.showTrash = function () {  
        $('.container').find('h1').text("Lish trash category");
        $('#categorydata').find('#date').text('deleted at');
        $('#addcategory').replaceWith(
            `<a href="javascript:;" class="btn btn-dark" id="back" onclick="category.home()">Back</a>`
        );
        $.ajax({
            type: "GET",
            url: "http://127.0.0.1:8000/category-trash",
            dataType: "JSON",
            success: function (data) {
                $('#categorydata tbody').empty();
                console.log(data);
                $.each(data, function (i, v) {
                    // alert(v.name);
                    $('#categorydata tbody').append(
                        `
                        <tr>
                            <td>${v.id}</td>
                            <td>${v.name}</td>
                            <td>${v.deleted_at}</td>
                            <td>
                                <a href="javascript:;" onclick="category.restore(${v.id})" class="btn btn-info">Restore</a>
                                <a href="javascript:;" onclick="category.remove(${v.id})" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        `
                    );
                });
                // $('#categorydata').DataTable(); 
            }
        });
    }

    category.home = function (){
        $.get("http://127.0.0.1:8000", {}, function (data) {
            $('body').html(data);
        });
    }

    category.restore = function(id) {

        $.ajax({
            type: "GET",
            url: "http://127.0.0.1:8000/category-restore/" + id,
            dataType: "JSON",
            success: function (data) {
                console.log(data);
                bootbox.alert("Restore successfully");
                category.showTrash();
            },
            error: function (errors){
                console.log(errors);
            }
        });
    }
    
    category.hardDelete = function(id) {
        
        $.ajax({
            type: "GET",
            url: "http://127.0.0.1:8000/category-hard-delete/" + id,
            dataType: "JSON",
            success: function (response) {
                console.log(response);
            },
            error: function (errors) {  
                console.log(errors);
            }
        });
    }


    category.init = function(){
        
        // category.formValid();
        category.showdata();
    }


    $(document).ready(function () {
        category.init();
    });