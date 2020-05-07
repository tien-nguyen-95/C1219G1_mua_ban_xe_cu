@extends('partials.head')
@section('content')
    <div class="container">
        <!-- Button to Open the Modal -->
        <button type="button" id="add" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Create</button>
        <div>
            <table id="table" class="table table-inverse">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="brands-list" name="brands-list">
                    @if (!isset($brands) || count($brands)===0)
                    {
                        <p class="text-danger">Không có sản phẩm nào.</p>
                    }@else
                        @foreach($brands as $key => $brand)
                    <tr id="link{{$brand->id}}">
                        <td>{{$key++}}</td>
                        <td>{{$brand->name}}</td>
                        <td>
                            <button class="btn btn-info open-modal" value="{{$brand->id}}">Edit</button>
                            <button class="btn btn-danger delete-link" value="{{$brand->id}}">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@include('brand.create')
@include('partials.ajax')
    @endif
@endsection
