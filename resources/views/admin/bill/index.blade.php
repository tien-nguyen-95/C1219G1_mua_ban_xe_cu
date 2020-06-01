@extends('layouts.admin')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/customer.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bill.css') }}">
@endpush

@section('content')

<h1 id="titleDefine">Danh sách đơn hàng</h1>
<h1 id="titleTrash" hidden>Danh sách đơn hàng tạm xóa</h1>



<div class="row">
    <div class="col-12 mb-3">
        <div class="d-flex flex-row">
            <div class="p-2"  id="showModal">
                <a href="javascript:;" class="btn btn-primary" onclick="bill.showModal()"> <i class="fa fa-plus-square" aria-hidden="true"></i> Thêm hóa đơn</a>
            </div>
            <div class="p-2" id="back" hidden>
                <a href="javascript:;" class="btn btn-dark" onclick="bill.back()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</a>
            </div>
            <div class="p-2" id="showTrash">
                <a href="javascript:;" class="btn btn-secondary" onclick="bill.showTrash()" id="showTrash"><i class="fa fa-trash" aria-hidden="true"></i> Thùng rác</a>
            </div>
        </div>
        
        
        
    </div>
</div>
<div class="row" id="billData">
    <div class="col-12 table-responsive">
        <table id="tbBill" class="table table-hover text-center  table-striped" width="100%">
            <thead >
                <tr>
                    <th>Tên khách hàng</th>
                    <th>Tên sản phẩm</th>
                    <th>Chi nhánh</th>
                    <th>Giá sản phẩm</th>
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

<div class="row" id="billTrashData" hidden>
    <div class="col-12 table-responsive">
        <table id="tbTrashBill" class="table table-hover text-center  table-striped" width="100%">
            <thead >
                <tr>
                    <th>Tên khách hàng</th>
                    <th>Tên sản phẩm</th>
                    <th>Chi nhánh</th>
                    <th>Giá sản phẩm</th>
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


{{-- Modal bill--}}
<div id="billModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <form id="formBill">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-clipboard" aria-hidden="true"></i><span>/ Thêm hóa đơn</span></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="billId" name="billId" value="0">
                    <div class="row">
                        <div class="col-md-12">
                            <label><b>Khách hàng </b></label>
                            <input type="text" id="customer_hide" class="form-control edit-hide" disabled hidden>
                            <select id="customer_id" class="form-control edit-show">
                                <option value="" hidden>---chọn---</option>
                            </select>
                            <small class="errors-customer_id sml-er"></small>
                        </div>
                        <input type="hidden" value="{{ Auth::user()->id }}" id="staff_id">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <input type="hidden" id="branch" value="">
                            <label><b>Sản phẩm</b></label>
                            <input type="text" id="product_hide" class="form-control edit-hide" disabled hidden>
                            <select  id="product_id" class="form-control edit-show">
                                <option value="" selected hidden>---chọn---</option>
                            </select>
                            <small class="errors-product_id sml-er"></small>
                        </div>
                        <div class="form-group col-md-4">
                            <label><b>Loại đơn hàng</b></label>
                            <input type="text" id="status_hide" class="form-control edit-hide" disabled hidden>
                            <select  id="status" class="form-control edit-show">
                                <option value="" selected hidden>---chọn---</option>
                                <option value="0">Đơn mua hàng</option>
                                <option value="1">Đơn bán hàng</option>
                            </select>
                            <small class="errors-status sml-er"></small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <label><b>Ngày thanh toán</b></label>
                                    <div class="input-group date" id="payment_at" data-target-input="nearest">
                                        <input type="text" name="payment_at" class="form-control datetimepicker-input" data-target="#payment_at"/>
                                        <div class="input-group-append" data-target="#payment_at" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <small class="errors-payment_at sml-er"></small>
                                </div>
                                <div class="col-md-6">
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
                        </div>
                        <div class="form-group col-md-4">
                            <label><b>Tình trạng</b></label>
                            <select id="complete" class="form-control">
                                <option value="" selected hidden>---chọn---</option>
                                <option value="0">Đã hoàn thành</option>
                                <option value="1">Chưa hoàn thành</option>
                            </select>
                            <small class="errors-complete sml-er"></small>
                        </div>
                    </div>
                    <div class="form-row">    
                        <div class="form-group col-md-6">
                            <label for="deposit"><b>Tiền đặt cọc (vnđ)</b></label>  
                            <input id="deposit" type="number" class="form-control">
                            <small class="errors-deposit sml-er"></small>
                        </div>
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-5">
                            <label for="payment"><h6><strong>Giá sản phẩm (vnđ)</strong></h6></label><br>
                            <input type="hidden" id="payment">
                            <span class="payment"></span>
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

{{-- show bill --}}
<div class="modal fade" id="billInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-info" aria-hidden="true"></i> Thông tin đơn hàng</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <table class="table table-bordered">
                        
                            <tr>
                                <th>Mã hóa đơn</th>
                                <td width="70%" id="codeBill"></td>
                            </tr>
                            <tr>
                                <th>Tên khách hàng</th>
                                <td width="70%" id="cutomerInfo"></td>
                            </tr>
                            <tr>
                                <th>Sản phẩm</th>
                                <td width="70%">
                                    <table>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <td id="productInfo"></td>
                                        </tr>
                                        <tr>
                                            <th>Giá sản phẩm</th>
                                            <td id="paymentInfo">dsa</td>
                                        </tr>
                                        <tr>
                                            <th>Chi nhánh</th>
                                            <td id="branchInfo">dsa</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th>Nhân viên</th>
                                <td width="70%" id="staffInfo"></td>
                            </tr>
                            <tr>
                                <th>Tiền đặt cọc</th>
                                <td width="70%" id="depositInfo"></td>
                            </tr>
                            <tr>
                                <th>Số tiền thanh toán</th>
                                <td width="70%" id="remainInfo"></td>
                            </tr>
                            <tr>
                                <th>Loại đơn hàng</th>
                                <td width="70%" id="statusInfo"></td>
                            </tr>
                            <tr>
                                <th>Trạng thái</th>
                                <td width="70%" id="completeInfo"></td>
                            </tr>
                            <tr>
                                <th>Ngày thanh toán</th>
                                <td width="70%" id="payment_at_info"></td>
                            </tr>
                            <tr>
                                <th>Ngày giao hàng</th>
                                <td width="70%" id="delivered_at_info"></td>
                            </tr>
                       
                    </table>
                </div>
            </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



@endsection
@push('crud-ajax-js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="https://kit.fontawesome.com/da3993873f.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    
    {{-- <script src="{{ asset('js/pcsFormatNumber.jquery.js') }}"></script> --}}
    
    <script src="{{ asset('js/bill.js') }}"></script>
@endpush