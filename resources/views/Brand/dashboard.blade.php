@extends('partials.head')
@section('content')
 <h1 id="title">List Brand</h1>
<div class="row">
    <div class="col-12 mb-3">
        <a id="comback" href="javascript:;" class="btn btn-info" onclick="brand.showModal()">Create</a>
        <a id="trash" href="javascript:;" class="btn btn-info" onclick="brand.next()">Trash</a>
    </div>
</div>
<div class="row">
    <div class="col-12 table-responsive">
        <table id="table" class="table table-hover table-striped">
            <thead >
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- show Data --}}
            </tbody>
        </table>
    </div>
</div>
@include('brand.modal')
@endsection


