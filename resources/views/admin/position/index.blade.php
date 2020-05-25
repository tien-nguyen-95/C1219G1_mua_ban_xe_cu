@extends('layouts.admin')
@section('content')
<div class="container-fluid" id="body">
    <h1>Chức vụ</h1>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="javascript:;" onclick="position.showModal()" class="btn btn-primary" >Thêm mới</a>
            <a href="javascript:;" onclick="position.getTrash()" class="btn btn-dark" style="float: right"><i class="fa fa-trash"></i> Thùng rác</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 table-responsive" id="tablePosition">
            <table id="tbPosition" class="table table-hover table-striped">
                <thead >
                    <tr>
                        <th>STT</th>
                        <th>Tên Chức vụ</th>
                        <th>Mô tả công việc</th>
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
<div id="positionModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form id="formPosition">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm Chức vụ mới</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <input hidden id="positionId" name="positionId" value="0">
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-4">
                            <label>Tên Chức vụ</label>
                        </div>
                        <div class="col-8">
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-4">
                            <label>Mô tả công việc</label>
                        </div>
                        <div class="col-8">
                            <input type="text" id="description" name="description" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" onclick="position.save()" class="btn btn-danger" >Lưu</a>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('crud-ajax-js')
    <script src="{{ asset('js/position.js') }}"></script>
@endpush
