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
            <a href="javascript:;" class="btn btn-primary" id="addcategory" onclick="category.showModal()">Add</a>
            <a href="javascript:;" class="btn btn-primary" onclick="category.showTrash()">Trash</a>
        </div>
        <br>

        <table class="table" id="categorydata" value="list">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col" id="date">created at</th>
                    <th scope="col" style="width:%">Action</th>
                </tr>
            </thead>
            <tbody> 
            </tbody>
        </table>  
    </div>
	@include('admin.category.create')
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.jqueryui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.js"></script>
<script src="{{ asset('js/category.js') }}"></script>

</html> --}}

@extends('layouts.admin')
@section('content')
<div class="container-fluid" id="body">
    <h1>Chi nhánh</h1>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="javascript:;" class="btn btn-info" onclick="category.showModal()" id="addcategory">Thêm mới</a>
            <a href="javascript:;" class="btn btn-info" style="float: right" onclick="category.getTrash()"><i class="fa fa-trash"></i> Thùng rác</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 table-responsive">
            <table id="categorydata" class="table table-hover table-striped">
                <thead >
                    <tr>
                        <th>STT</th>
                        <th>Tên danh mục</th>
                        <th>Ngày tạo</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="addEditModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form id="frmAddEditCategory">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm chi nhánh mới</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <input hidden id="categoryId" name="categoryId" value="0">
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-4">
                            <label>Tên danh mục</label>
                        </div>
                        <div class="col-8">
                            <input type="text" id="categoryName" name="categoryName" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger" onclick="category.save()">Lưu</a>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Đóng</button>
                </div>
            </>
        </form>
    </div>
</div>
@endsection
@push('crud-ajax-js')
    <script src="{{ asset('js/category.js') }}"></script>
@endpush