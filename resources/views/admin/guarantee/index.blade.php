@extends('layouts.admin')
@section('content')
    <!-- showdata -->
    <div class="container-fluid">
            <h1>Danh sách bảo hành</h1>
            <div class="row">
                <div class="col-12 mb-3" >
                    <a href="javascript:;" class="btn btn-info" onclick="guarantee.showModal()" id="create">Thêm mới</a>
                    {{-- <a href="javascript:;" class="btn btn-info" style="float: right" onclick="tag.showTrash()" id="trash">Trash</a> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-12 table-responsive">
                    <table id="tbGuaranteeData" class="table table-hover table-striped">
                        <thead >
                            <tr>
                                <th>STT</th>
                                <th>Tên khách hàng</th>
                                <th>Tên sản phẩm</th>
                                <th>Mô tả dịch vụ</th>
                                <th>Ngày nhận</th>
                                <th>Ngày trả</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- showtrash -->
        <div class="container-fluid">
            <h1>Danh sách dịch vụ tạm xóa</h1>
            {{-- <div class="row">
                <div class="col-12 mb-3" id="addTag">
                    <a href="javascript:;" class="btn btn-info" onclick="tag.showModal()" id="create">Create</a>
                    <a href="javascript:;" class="btn btn-info" style="float: right" onclick="tag.showTrash()" id="trash">Trash</a>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-12 table-responsive">
                    <table id="tbGuaranteeTrash" class="table table-hover table-striped">
                        <thead >
                            <tr>
                                <th>STT</th>
                                <th>Tên khách hàng</th>
                                <th>Tên sản phẩm</th>
                                <th>Mô tả dịch vụ</th>
                                <th>Ngày nhận</th>
                                <th>Ngày trả</th>
                                <th>Thao tác</th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal create -->
        <div class="modal fade" id="addEditGuarantee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm bảo hành</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formAddEditGuarantee">
                            <input type="hidden" id="GuaranteeId" name="GuaranteeId" value="0">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="#"><b><i> Tên sản phẩm </i></b></label>
                                    <select name="Product" id="Product" class="form-control">
                                        <option value="">--Chọn sản phẩm--</option>
                                    </select>
                                    <small class="error-product_id text-danger"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="#"><b><i> Tên khách hàng </i></b></label>
                                    <select name="Customer" id="Customer" class="form-control">
                                        <option value="">--Chọn khách hàng--</option>
                                    </select>
                                    <small class="error-customer_id text-danger"></small>
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="#"><b><i> Mô tả dịch vụ </i></b></label>
                                    <textarea name="Issue" type="text" id="Issue" class="form-control"
                                    placeholder="Nhập mô tả"></textarea>
                                    <small class="error-issue text-danger"></small>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="#"><b><i>Chi nhánh tiếp nhận </i></b></label>
                                    <select name="Branch" id="Branch" class="form-control">
                                        <option value="">--Chọn chi nhánh--</option>
                                    </select>
                                    <small class="error-branch_id text-danger"></small>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="#"><b><i>Nhân viên hỗ trợ </i></b></label>
                                    <select name="Staff" id="Staff" class="form-control">
                                        <option value="">--Chọn nhân viên--</option>
                                    </select>
                                    <small class="error-staff_id text-danger"></small>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="#"><b><i>Ngày nhận bảo hành </i></b></label>
                                    <input name="Date-in" type="date" id="Date-in" class="form-control">
                                    <small class="error-date_in text-danger"></small>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="#"><b><i>Ngày trả bảo hành </i></b></label>
                                    <input name="Date-out" type="date" id="Date-out" class="form-control" onchange="guarantee.checkDate()">
                                    <small id="checkDate" class="error-date_out text-danger"></small>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" type="button" class="btn btn-primary" onclick="guarantee.save()">Save</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->

         <!-- Modal edit -->
         <div class="modal fade" id="editGuarantee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="formEditGuarantee">
                        <div class="form-group">
                            <label for="#"><b><i> Tên sản phẩm :</i></b></label>
                            <input name="editProduct" type="text" id="editProduct" class="form-control"
                            placeholder="Nhập tên sản phẩm">

                        </div>
                        <div class="form-group">
                            <label for="#"><b><i> Tên khách hàng :</i></b></label>
                            <select name="editCustomer" id="editCustomer">

                            </select>

                        </div>

                        <div class="form-group">
                            <label for="#"><b><i> Mô tả dịch vụ :</i></b></label>
                            <textarea name="editIssue" type="text" id="editIssue" class="form-control"
                            placeholder="Nhập mô tả"></textarea>

                        </div>
                        <div class="form-group">
                            <label for="#"><b><i>Chi nhánh tiếp nhận :</i></b></label>
                            <select name="editBranch" id="editBranch">

                            </select>

                        </div>
                        <div class="form-group">
                            <label for="#"><b><i>Nhân viên hỗ trợ :</i></b></label>
                            <select name="editStaff" id="editStaff">

                            </select>

                        </div>
                        <div class="form-group">
                            <label for="#"><b><i>Ngày nhận bảo hành :</i></b></label>
                            <input name="editDate-in" type="date" id="editDate-in" class="form-control">

                        </div>
                        <div class="form-group">
                            <label for="#"><b><i>Ngày trả bảo hành :</i></b></label>
                            <input name="editDate-out" type="date" id="editDate-out" class="form-control">

                        </div>


                        <a type="button" class="btn btn-danger" onclick="guarantee.save()">Save</a>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>

                    </form>
                </div>
            </div>
            </div>
        </div>
        <!-- Button trigger modal -->

        <!-- Modal show detail-->
        <div class="modal fade" id="showModalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông tin chi tiết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <div class="form-group">
                    <label for=""><b><i>Tên khách hàng :</i></b></label>
                    <p id="nameCustomer"></p>
                </div>
                <label for=""><b><i>Tên sản phẩm :</i></b></label>
                <p id="nameProduct"></p>
                <label for=""><b><i>Mô tả dịch vụ :</i></b></label>
                <p id="issue"></p>
                <label for=""><b><i>Nhân viên hỗ trợ :</i></b></label>
                <p id="nameStaff"></p>
                <label for=""><b><i>Chi nhánh tiếp nhận :</i></b></label>
                <p id="nameBranch"></p>
                <label for=""><b><i>Ngày nhận bảo hành :</i></b></label>
                <p id="dateIn"></p>
                <label for=""><b><i>Ngày trả bảo hành :</i></b></label>
                <p id="dateOut"></p>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
            </div>
        </div>
        <!-- show trash -->
        <div class="container-fluid">
            <h1>Danh sách dịch vụ tạm xóa</h1>

            <div class="row">
                <div class="col-12 table-responsive">
                    <table id="tbGuarantee Trash" class="table table-hover table-striped">
                        <thead >
                            <tr>
                                <th>STT</th>
                                <th>Tên khách hàng</th>
                                <th>Tên sản phẩm</th>
                                <th>Mô tả dịch vụ</th>
                                <th>Ngày nhận </th>
                                <th>Ngày trả</th>
                                <th>Thao tác</th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
@push('crud-ajax-js')
    {{-- <script src="{{ asset('js/tag.js') }}"></script> --}}
    <script src="{{ asset('js/guarantee.js') }}"></script>
@endpush
