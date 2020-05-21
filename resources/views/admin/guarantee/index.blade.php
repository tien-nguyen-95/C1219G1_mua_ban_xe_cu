@extends('layouts.admin')
@section('content')
    <!-- showdata -->
    <div class="container-fluid">
            <h1>Danh sách bảo hành</h1>
            <div class="row">
                <div class="col-12 mb-3" id="addGuarantee">
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
                                <th>Tên sản phẩm</th>
                                <th>Mô tả dịch vụ</th>
                                <th>Ngày nhận</th>
                                <th>Ngày trả</th>
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
                                <th>Tên sản phẩm</th>
                                <th>Mô tả dịch vụ</th>
                                <th>Ngày nhận</th>
                                <th>Ngày trả</th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addEditGuarantee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form id="formAddEditGuarantee">
                        <input type="hidden" id="GuaranteeId" name="GuaranteeId" value="0">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input name="Product" type="text" id="Product" class="form-control"
                            placeholder="Nhập tên sản phẩm">
                            <span class="error-Product"></span>
                        </div>
                        <div class="form-group">

                            <select name="Customer" id="Customer">

                            </select>

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả dich vụ</label>
                            <input name="Issue" type="text" id="Issue" class="form-control"
                            placeholder="Nhập mô tả">
                            <span class="error-Product"></span>
                        </div>
                        <div class="form-group">

                            <select name="Branch" id="Branch">

                            </select>

                        </div>
                        <div class="form-group">

                            <select name="Staff" id="Staff">

                            </select>

                        </div>
                        <div class="form-group">
                            <label for="">Ngày nhận</label>
                            <input name="Date-in" type="date" id="Date-in" class="form-control">
                            {{-- <span class="error-Product"></span> --}}
                        </div>
                        <div class="form-group">
                            <label for="">Ngày trả</label>
                            <input name="Date-out" type="date" id="Date-out" class="form-control">
                            {{-- <span class="error-Product"></span> --}}
                        </div>


                        <a type="button" class="btn btn-danger" onclick="guarantee.save()">Save</a>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>

                    </form>
                </div>
            </div>
            </div>
        </div>
@endsection
@push('crud-ajax-js')
    {{-- <script src="{{ asset('js/tag.js') }}"></script> --}}
    <script src="{{ asset('js/guarantee.js') }}"></script>
@endpush
