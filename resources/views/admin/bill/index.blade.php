@extends('layouts.admin')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/customer.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/bill.css') }}">
@endpush

@section('content')

<h1>Danh sách đơn hàng</h1>

<div class="row">
    <div class="col-12 mb-3">
        <div class="d-flex flex-row">
            <div class="p-2">
                <a href="javascript:;" class="btn btn-primary" onclick="bill.showModal()"> <i class="fa fa-plus-square" aria-hidden="true"></i>Thêm hóa đơn</a>
            </div>
            <div class="p-2">
                <a href="javascript:;" class="btn btn-secondary" onclick="customer.showTrash()"><i class="fa fa-trash" aria-hidden="true"></i> Thùng rác</a>
            </div>
        </div>
        
        
        
    </div>
</div>
<div class="row">
    <div class="col-12 table-responsive">
        <table id="tbBill" class="table table-hover text-center  table-striped" width="100%">
            <thead >
                <tr>
                    <th>Tên khách hàng</th>
                    <th>Chi nhánh</th>
                    <th>Tổng thanh toán</th>
                    <th>Loại đơn hàng</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>


{{-- Modal customer--}}
<div id="billModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <form id="formBill">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-user" aria-hidden="true"></i> / Thêm mới đơn hàng</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="billId" name="billId" value="0">
                    <div class="row">
                        <div class="col-md-12">
                            <label><b>Khách hàng </b></label>
                            <select name="customer_id" id="customer_id" class="form-control">
                                <option value="" selected>---chọn---</option>
                            </select>
                            <small class="errors-customer_id sml-er"></small>
                        </div>
                        <input type="hidden" value="{{ Auth::user()->id }}" id="staff_id" name="staff_id">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label><b>Sản phẩm</b></label>
                            <select name="product_id" id="product_id" class="form-control">
                                <option value="" selected>---chọn---</option>
                            </select>
                            <small class="errors-product_id sml-er"></small>
                        </div>
                        <div class="form-group col-md-4">
                            <label><b>Loại đơn hàng</b></label>
                            <select name="status" id="status" class="form-control">
                                <option value="" selected>---chọn---</option>
                                <option value="0">Đơn mua hàng</option>
                                <option value="1">Đơn bán hàng</option>
                            </select>
                            <small class="errors-status sml-er"></small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label><b>Chi nhánh</b></label>
                            <select name="branch_id" id="branch_id" class="form-control">
                                <option value="" selected>---chọn---</option>
                            </select>
                            <small class="errors-branch_id sml-er"></small>
                        </div>
                        <div class="form-group col-md-4">
                            <label><b>Tình trạng</b></label>
                            <select name="complete" id="complete" class="form-control">
                                <option value="" selected>---chọn---</option>
                                <option value="0">Đã hoàn thành</option>
                                <option value="1">Chưa hoàn thành</option>
                            </select>
                            <small class="errors-complete sml-er"></small>
                        </div>
                    </div>
                    <div class="form-row">    
                        <div class="form-group col-md-6">
                            <label><b>Ngày thanh toán</b></label>
                            <div class="input-group date" id="payment_at" data-target-input="nearest">
                                <input type="text" name="payment_at" class="form-control datetimepicker-input" data-target="#payment_at"/>
                                <div class="input-group-append" data-target="#payment_at" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            <small class="errors-payment_at sml-er"></small>
                        </div>

                        <div class="form-group col-md-6">
                            <label><b>Ngày giao hàng</b></label>
                            <div class="input-group date" id="delivered_at" data-target-input="nearest">
                                <input type="text" name="delivered_at" class="form-control datetimepicker-input" data-target="#delivered_at"/>
                                <div class="input-group-append" data-target="#delivered_at" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            <small class="errors-delivered_at sml-er"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="deposit"><b>Tiền đặt cọc (vnđ)</b></label>  
                            <input name="deposit" id="deposit" type="number" min="0" class="form-control money">
                            <small class="errors-deposit sml-er"></small>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="payment"><b>Giá sản phẩm (vnđ)</b></label><br>
                            <input type="hidden" name="payment" value="">
                            <span id="payment"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="remain"><b>Còn lại phải trả (vnđ)</b></label><br>
                            <span id="remain"></span>
                        </div>
                    </div>
                </div> 
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-primary" onclick="bill.save()">Thêm</a>
                    {{-- <input class="btn btn-outline-primary" type="reset" id="configreset" value="Reset"> --}}
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- The Modal -->

{{-- show customer --}}
{{-- <div class="modal" id="thongtin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-user-circle"></i> Thông tin khách hàng</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row form-group">
                    <div class="col-4">
                        <label>Mã khách hàng:</label>
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
{{-- <div id="customerTrashModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-user" aria-hidden="true"></i> Khách hàng tạm xóa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="tbCustomerTrash1">
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
</div> --}} 

@endsection
@push('crud-ajax-js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.min.js"></script> --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    {{-- <script src="{{ asset('js/pcsFormatNumber.jquery.js') }}"></script> --}}
    
    <script src="{{ asset('js/bill.js') }}"></script>
@endpush