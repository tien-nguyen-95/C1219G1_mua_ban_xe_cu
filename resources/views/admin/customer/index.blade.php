@extends('layouts.admin')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/customer.css') }}">
@endpush

@section('content')

<h1>Danh sách khách hàng</h1>
<div class="row">
    <div class="col-12 mb-3">
        <a href="javascript:;" class="btn btn-info" onclick="customer.showModal()" id="addcustomer"><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới</a>
        <a href="javascript:;" class="btn btn-dark" onclick="customer.showTrash()"><i class="fa fa-trash" aria-hidden="true"></i> Thùng rác</a>
    </div>
</div>
<div class="row">
    <div class="col-12 table-responsive">
        <table id="tbCustomer" class="table table-hover text-center  table-striped" width="100%">
            <thead >
                <tr>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Ngày tạo</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>


{{-- Modal customer--}}
<div id="customerModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <form id="formCustomer">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-user" aria-hidden="true"></i> / Thêm khách hàng mới</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <input type="hidden" id="customerId" name="customerId" value="0">
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-3">
                            <label>Tên khách hàng</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="name" name="name" class="form-control">
                            <span class="errors-name"></span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3">
                            <label>Số điện thoại</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="phone" name="phone" class="form-control">
                            <span class="errors-phone"></span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3">
                            <label>Email</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="email" name="email" class="form-control">
                            <span class="errors-email"></span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3">
                            <label>Địa chỉ</label>
                        </div>
                        <div class="col-9">
                            <textarea style="size:none" class="form-control" name="address" id="address" cols="30"></textarea>
                            <span class="errors-address"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger" onclick="customer.save()">Thêm</a>
                    <input class="btn btn-primary" type="reset" id="configreset" value="Reset">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- The Modal -->

{{-- show customer --}}
<div class="modal" id="thongtin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-user-circle"></i> Thông tin khách hàng</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row form-group">
                    <div class="col-4">
                        <strong>Mã khách hàng:</strong>
                    </div>
                    <div class="col-8">
                        <p id="id"></p>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-4">
                        <strong>Họ và tên:</strong>
                    </div>
                    <div class="col-8">
                        <p id="name"></p>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-4">
                        <strong>Email:</strong>
                    </div>
                    <div class="col-8">
                        <p id="email"></p>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-4">
                        <strong>Địa chỉ:</strong>
                    </div>
                    <div class="col-8">
                        <p id="address"></p>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-4">
                        <strong>Số điện thoại:</strong>
                    </div>
                    <div class="col-8">
                        <p id="phone"></p>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-4">
                        <strong>Ngày tạo</strong>
                    </div>
                    <div class="col-8">
                        <p id="created_at"></p>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-4">
                        <strong>Ngày cập nhật</strong>
                    </div>
                    <div class="col-8">
                        <p id="updated_at"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- modal trash customer --}}
<div id="customerTrashModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-user" aria-hidden="true"></i> Khách hàng tạm xóa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive-sm">
                        <table class="table table-sm" id="tbCustomerTrash" width="100%">
                            <thead>
                                <tr class="table-primary">
                                    <th>Tên khách hàng</th>
                                    <th>Email</th>
                                    <th>Ngày xóa</th>
                                    <th>Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Đóng</button>
                </div>
            </div>
    </div>
</div>

@endsection
@push('crud-ajax-js')
    <script src="{{ asset('js/customer.js') }}"></script>
@endpush