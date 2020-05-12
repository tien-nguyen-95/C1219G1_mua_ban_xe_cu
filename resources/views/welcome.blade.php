{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="_token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.jqueryui.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>List category</h1>
        <div class="col">
            <a href="#ex1" class="btn btn-primary" onclick="category.showModal()">Add</a>
        </div>
        <br>

        <table class="table" id="categorydata">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">created_at</th>
                    <th scope="col" style="width:15%">Action</th>
                </tr>
            </thead>
            <tbody> 
            </tbody>
          </table>  
    </div>

    <!-- Button trigger modal -->
    
    
    <!-- Modal -->
    <div class="modal fade" id="addEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form id="frmAddEditCategory">
                    <input type="hidden" id="CategoryId" name="CategoryId" value="0">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input name="categoryName" type="text" id="categoryName" class="form-control" 
                        placeholder="Enter category name">
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a type="button" class="btn btn-primary" onclick="category.save()">Save</a>
                </form>
            </div>
        </div>
        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.jqueryui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.js"></script>

<script>

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
            }
        });
    }
    


    category.showModal = function(){   
        category.resetForm();    
        $('#addEditModal').modal('show');  
    } 
    
    category.save = function () {
        if ($('#frmAddEditCategory').valid()) {
            //create a category
            if ($('#CategoryId').val() == 0) {
                var objAdd = {};
                objAdd.name = $('#categoryName').val();
                // console.log(objAdd);
                $.ajax({
                    url: "http://127.0.0.1:8000/category",
                    type: "POST",
                    dataType: "JSON",
                    contentType: 'application/json',    
                    data: JSON.stringify(objAdd),
                    success: function (data) {
                        // console.log(data);
                        bootbox.alert("Thêm mới thành công");
                        $('#addEditModal').modal('hide');
                        category.showdata();
                    },
                    error: function(e){
                        console.log(e);
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
                                }
                            }); 
                        }
                    }
                }); 
            }
        }    
    }

    category.getDetail = function (id) {
        
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
                        category.showdata();
                        bootbox.alert("Remove successfully");
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

    // category.validateForm() = function() {
        
    // }

    // category.datatale() = function (){
        
    // }

    category.init = function(){
        $('#categorydata').DataTable();
        $("#frmAddEditCategory").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: {
                "categoryName": {
                    required: true,
                    maxlength: 60,
                    minlength: 3
                },
            },
            messages: {
                "categoryName": {
                    required: "Bắt buộc nhập tên danh mục",
                    maxlength: "Nhập ít hơn 60 ký tự",
                    minlength: "Nhập nhiều hơn 3 ký tự"
                },
            }
	    });
        category.showdata();
    }

    $(document).ready(function () {
        
        category.init();
    });
</script>
</html> --}}