@extends('layouts.admin')
@section('content')
<div class="container-fluid" id="body">
    <h1>Quản lý người dùng</h1>
    <div class="row">
        <div class="col-12 table-responsive" id="tableBranch">
            <table id="tbUser" class="table table-hover table-striped">
                <thead >
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Phân quyền</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal-->
<div id="userModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form id="formUser">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thông tin người dùng</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <input hidden id="userId" name="userId" value="0">
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-4">
                            <label>Tên:</label>
                        </div>
                        <div class="col-8">
                            <span id="name" name="name" ></span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-4">
                            <label>Email:</label>
                        </div>
                        <div class="col-8">
                            <span id="email" name="email" ></span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-4">
                            <label>Quyền Truy cập:</label>
                        </div>
                        <div class="col-8">
                            <span id="role" name="role" ></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('crud-ajax-js')
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/user.js') }}"></script>
@endpush
