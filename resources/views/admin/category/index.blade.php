@extends('layouts.admin')
@section('content')

    <h1>Danh sách danh mục</h1>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="javascript:;" class="btn btn-info" onclick="category.showModal()" id="addcategory">Thêm mới</a>
            <a href="javascript:;" class="btn btn-info" style="float:right" id="showtrash" onclick="category.getTrash()"><i class="fa fa-trash"></i> Thùng rác</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 table-responsive">
            <table id="tbCategory" class="table table-hover table-striped">
                <thead >
                    <tr>
                        <th>Tên danh mục</th>
                        <th>Ngày tạo</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <h1><i class="fa fa-trash"></i> -   Danh sách danh mục tạm xóa</h1>
    <div id="category-trash">
        <div class="col-12 table-responsive">
            <table id="tbCateTrash" class="table table-hover table-striped">
                <thead >
                    <tr>
                        <th>Tên danh mục</th>
                        <th>Ngày xóa</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

<!-- Modal -->
<div id="categoryModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form id="formCategory">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm danh mục mới</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <input type="hidden" id="categoryId" name="categoryId" value="0">
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-4">
                            <label>Tên danh mục</label>
                        </div>
                        <div class="col-8">
                            <input type="text" id="name" name="name" class="form-control">
                            <span class="errors-name"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger" onclick="category.save()">Lưu</a>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Đóng</button>
                </div>
            </>
        </form>
    </div>
</div>
@endsection
@push('crud-ajax-js')
    <script src="{{ asset('js/category.js') }}"></script>
@endpush