@extends('layouts.admin')
@section('content')

<h1>Danh sách khách hàng</h1>
<div class="row">
    <div class="col-12 mb-3">
        <a href="javascript:;" class="btn btn-info" onclick="customer.showModal()" id="addcustomer">Thêm mới</a>
    </div>
</div>
<div class="row">
    <div class="col-12 table-responsive">
        <table id="tbCustomer" class="table table-hover text-center  table-striped" width="100%">
            <thead >
                <tr>
                    <th>Tên danh mục</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Ngày tạo</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal -->
<div id="customerModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <form id="formCustomer">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm khách hàng mới</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <input type="hidden" id="customerId" name="customerId" value="0">
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-3">
                            <label>Tên danh mục</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="name" name="name" class="form-control">
                            <span class="errors-name"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger" onclick="customer.save()">Lưu</a>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Đóng</button>
                </div>
            </>
        </form>
    </div>
</div>
@endsection
@push('crud-ajax-js')
    <script src="{{ asset('js/customer.js') }}"></script>
@endpush