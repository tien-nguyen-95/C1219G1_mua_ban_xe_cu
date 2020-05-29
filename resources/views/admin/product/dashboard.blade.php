@extends('layouts.admin')
@push('style-css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/image.css')}}"/>
@endpush
@section('content')
 <h1 id="title" style=" text-align: center;">Danh sách sản phẩm</h1>
<div  class="row">
    <div class="col-12 mb-3" id="btnProduct">
        <a href="javascript:;" class="btn btn-success" onclick="product.showModal()" id="comeback"><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới</a>
        <a id="trash" href="javascript:;" class="btn btn-warning" onclick="product.next()"><i class="fas fa-trash"></i>Thùng rác</a>
    </div>
</div>
<div id="showImage"></div>
<div id="checkImage"></div>
<div id="hideTable" class="row">
    <div class="col-12 table-responsive" id="tableProduct">
        <table id="table" class="table table-hover table-striped">
            <thead >
                <tr>
                    <th>STT</th>
                    <th>Mã sản phẩm</th>
                    <th>Tiêu đề</th>
                    <th>Dòng xe</th>
                    <th>CC</th>
                    <th>Ảnh</th>
                    <th>Đời xe</th>
                    <th>Năm đăng kí</th>
                    <th>Đã đi</th>
                    <th>Màu</th>
                    <th>Xuất xứ</th>
                    <th>Giá nhập</th>
                    <th>Giá bán</th>
                    <th>Trạng thái</th>
                    <th>Chi nhánh</th>
                    <th>Thương hiệu</th>
                    <th>Thẻ</th>
                    <th>Loại xe</th>
                    <th>Nhân viên</th>
                    <th>Hoạt động</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
@include('admin.product.modal')
@include('admin.product.modalfile')
@endsection
@push('crud-ajax-js')
    <script src="{{asset('/js/product.js')}}"></script>
@endpush
