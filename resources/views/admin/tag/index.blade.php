@extends('layouts.admin')
@section('content')
        <div class="container-fluid">
            <h1>Tag</h1>
            <div class="row">
                <div class="col-12 mb-3" id="addTag">
                    <a href="javascript:;" class="btn btn-info" onclick="tag.showModal()" id="create">Create</a>
                    <a href="javascript:;" class="btn btn-info" style="float: right" onclick="tag.showTrash()" id="trash">Trash</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 table-responsive">
                    <table id="tbTag" class="table table-hover table-striped">
                        <thead >
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th id="date">Created_at</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addEditTag" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form id="formAddEditTag">
                        <input type="hidden" id="TagId" name="TagId" value="0">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input name="Title" type="text" id="Title" class="form-control"
                            placeholder="Enter title">
                            <span class="error-title"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                            <input name="Category" type="text" id="Category" class="form-control"
                            placeholder="Enter category">
                            <span class="error-category"></span>
                        </div>
                        <a type="button" class="btn btn-danger" onclick="tag.save()">Save</a>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>

                    </form>
                </div>
            </div>
            </div>
        </div>
@endsection
@push('crud-ajax-js')
    {{-- <script src="{{ asset('js/tag.js') }}"></script> --}}
    <script src="{{ asset('js/tag.js') }}"></script>
@endpush
