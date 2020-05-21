@extends('layouts.admin')
@section('content')
 <h1 id="title" style=" text-align: center;">Danh sách sản phẩm</h1>
<div class="row">
    <div class="col-12 mb-3" id="btnProduct">
        <a id="comeback" href="javascript:;" class="btn btn-success" onclick="product.showModal()">Create</a>
        <a id="trash" href="javascript:;" class="btn btn-warning" onclick="product.next()">Trash</a>
    </div>
</div>
<div class="row">
    <div class="col-12 table-responsive" id="tableProduct">
        <table id="table" class="table table-hover table-striped">
            <thead >
                <tr>
                    <th>STT</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Loại</th>
                    <th>Thương hiệu</th>
                    <th>Nhãn</th>
                    <th>Đời</th>
                    <th>Giá nhập</th>
                    <th>Giá bán</th>
                    <th>Chi nhánh</th>
                    <th>Trạng thái</th>
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
@endsection
@push('crud-ajax-js')
    <script src="{{asset('/js/product.js')}}"></script>
@endpush
