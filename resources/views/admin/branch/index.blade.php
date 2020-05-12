@extends('layouts.admin')
@section('content')
<div class="container-fluid" id="body">
    <h1>Chi nhánh</h1>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="javascript:;" class="btn btn-info" onclick="branch.showModal()" id="addBranchBtn">Thêm mới</a>
            <a href="javascript:;" class="btn btn-info" style="float: right" onclick="branch.getTrash()"><i class="fa fa-trash"></i> Thùng rác</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 table-responsive" id="tableBranch">
            <table id="tbBranch" class="table table-hover table-striped">
                <thead >
                    <tr>
                        <th>STT</th>
                        <th>Tên Chi Nhánh</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
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
<div id="branchModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form id="formBranch">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm chi nhánh mới</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <input hidden id="branchId" name="branchId" value="0">
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-4">
                            <label>Tên Chi Nhánh</label>
                        </div>
                        <div class="col-8">
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-4">
                            <label>Số Điện thoại</label>
                        </div>
                        <div class="col-8">
                            <input type="text" id="phone" name="phone" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-4">
                            <label>Địa chỉ</label>
                        </div>
                        <div class="col-8">
                            <input type="tel" id="address" name="address" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger" onclick="branch.save()">Lưu</a>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('crud-ajax-js')
    <script src="{{ asset('js/branch.js') }}"></script>
@endpush
