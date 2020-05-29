<div id="billEditModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <form id="formEditBill">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-clipboard" aria-hidden="true"></i> / Cập nhật đơn hàng</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="text" id="billIdED" name="billIdEd">
                    <div class="row form-group">
                        <div class="col-4">
                            <strong>Tên khách hàng:</strong>
                        </div>
                        <div class="col-8">
                            <input type="text" name="customerEd">
                            <p id="customerEd"></p>
                        </div>
                    </div>
    
                    <div class="row form-group">
                        <div class="col-4">
                            <strong>Nhân viên</strong>
                        </div>
                        <div class="col-8">
                            <input type="text" value="{{ Auth::user()->id }}">
                            <p id="staffInfo">{{ Auth::user()->name }}</p>
                        </div>
                    </div>
    
                    <div class="row form-group">
                        <div class="col-4">
                            <strong>Tên sản phẩm</strong>
                        </div>
                        <div class="col-8">
                            <p id="productInfo"></p>
                        </div>
                    </div>
    
                    <div class="row form-group">
                        <div class="col-4">
                            <strong>Chi nhánh: </strong>
                        </div>
                        <div class="col-8">
                            <p id="branchInfo"></p>
                        </div>
                    </div>
    
                    <div class="row form-group">
                        <div class="col-4">
                            <strong>Loại đơn</strong>
                        </div>
                        <div class="col-8">
                            <p id="statusInfo"></p>
                        </div>
                    </div>
    
                    <div class="row form-group">
                        <div class="col-4">
                            <strong>Trạng thái</strong>
                        </div>
                        <div class="col-8">
                            <p id="completeInfo"></p>
                        </div>
                    </div>
    
                    <div class="row form-group">
                        <div class="col-4">
                            <strong>Tiền đặt cọc</strong>
                        </div>
                        <div class="col-8">
                            <p id="depositInfo"></p>
                        </div>
                    </div>
    
                    <div class="row form-group">
                        <div class="col-4">
                            <strong>Giá sản phẩm</strong>
                        </div>
                        <div class="col-8">
                            <p id="paymentInfo"></p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-4">
                            <strong>Ngày thanh toán</strong>
                        </div>
                        <div class="col-8">
                            <p id="payment_at_info"></p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-4">
                            <strong>Ngày giao hàng</strong>
                        </div>
                        <div class="col-8">
                            <p id="delivered_at_info"></p>
                        </div>
                    </div>
                        <div class="col-md-12">
                            <label><b>Khách hàng </b></label>
                            <select name="customer_id" id="customer_id" class="form-control">
                                <option value="" hidden>---chọn---</option>
                            </select>
                            <small class="errors-customer_id sml-er"></small>
                        </div>
                        <input type="hidden" value="{{ Auth::user()->id }}" id="staff_id" name="staff_id">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <input type="hidden" id="branch" value="">
                            <label><b>Sản phẩm</b></label>
                            <select name="product_id" id="product_id" class="form-control">
                                <option value="" selected hidden>---chọn---</option>
                            </select>
                            <small class="errors-product_id sml-er"></small>
                        </div>
                        <div class="form-group col-md-4">
                            <label><b>Loại đơn hàng</b></label>
                            <select name="status" id="status" class="form-control">
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
                            <label for="deposit"><b>Tiền đặt cọc (vnđ)</b></label>  
                            <input name="deposit" id="deposit" type="number" class="form-control">
                            <input type="hidden" id="getDeposit">
                            <small class="errors-deposit sml-er"></small>
                        </div>
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-5">
                            <label for="payment"><h6><strong>Giá sản phẩm (vnđ)</strong></h6></label><br>
                            <input type="hidden" name="payment">
                            <span id="payment"></span>
                        </div>
                    </div>
                </div> 
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-primary" onclick="bill.save()">Thêm</a>
                    <input class="btn btn-outline-primary" type="reset" id="configreset" value="Reset">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </form>
    </div>
</div>