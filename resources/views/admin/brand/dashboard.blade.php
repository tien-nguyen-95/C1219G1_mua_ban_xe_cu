@extends('layouts.admin')
@section('content')
 <h1 id="title" style=" text-align: center;">Danh sách thương hiệu</h1>
<div class="row">
    <div class="col-12 mb-3" id="btnBrand">
        <a id="comeback" href="javascript:;" class="btn btn-success" onclick="brand.showModal()">Create</a>
        <a id="trash" href="javascript:;" class="btn btn-warning" onclick="brand.next()">Trash</a>
    </div>
</div>
<div class="row">
    <div class="col-12 table-responsive" id="tableBrand">
        <table id="table" class="table table-hover table-striped">
            <thead >
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>
@include('admin.brand.modal')
@endsection
@push('crud-ajax-js')
    <script src="{{asset('/js/brand.js')}}"></script>
@endpush
