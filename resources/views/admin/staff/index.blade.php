@extends('layouts.admin')
@section('content')
<div class="container-fluid" id="body">
    <h1>Nhân viên</h1>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="javascript:;" onclick="staff.showModal()" class="btn btn-primary" >Thêm mới</a>
            <a href="javascript:;" onclick="staff.getTrash()" class="btn btn-dark" style="float: right"><i class="fa fa-trash"></i> Thùng rác</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 table-responsive" id="tableStaff">
            <table id="tbStaff" class="table table-hover table-striped">
                <thead >
                    <tr>
                        <th>STT</th>
                        <th>Tên Nhân viên</th>
                        <th>Email</th>
                        <th>Giới tính</th>
                        <th>Sinh nhật</th>
                        <th>Điện thoại</th>
                        <th>Ảnh</th>
                        <th>Chức vụ</th>
                        <th>Địa chỉ</th>
                        <th>Chi nhánh</th>
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
<div id="staffModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form id="formStaff">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm nhân viên mới</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <input hidden id="staffId" name="staffId" value="0">
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-4">
                            <label>Tên nhân viên</label>
                        </div>
                        <div class="col-8">
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-4">
                            <label>Email</label>
                        </div>
                        <div class="col-8">
                            <select name="user_id" id="user_id" class="form-control">

                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-4">
                            <label>Giới tính</label>
                        </div>
                        <div class="col-8">
                            <select name="gender" id="gender" class="form-control">
                                <option value="1">Nam</option>
                                <option value="0">Nữ</option>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-4">
                            <label>Sinh nhật</label>
                        </div>
                        <div class="col-8">
                            <input type="date" id="birthday" name="birthday" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-4">
                            <label>Điện thoại</label>
                        </div>
                        <div class="col-8">
                            <input type="tel" id="phone" name="phone" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-4">
                            <label>Ảnh</label>
                        </div>
                        <div class="col-8">
                            <input type="file" id="image" name="image" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-4">
                            <label>Chức vụ</label>
                        </div>
                        <div class="col-8">
                            <select name="position_id" id="position_id" class="form-control">

                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-4">
                            <label>Địa chỉ</label>
                        </div>
                        <div class="col-8">
                            <input type="text" id="address" name="address" class="form-control">
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-4">
                            <label>Chức vụ</label>
                        </div>
                        <div class="col-8">
                            <select name="branch_id" id="branch_id" class="form-control">

                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" onclick="staff.save()" class="btn btn-danger" >Lưu</a>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('crud-ajax-js')
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/staff.js') }}"></script>
@endpush
