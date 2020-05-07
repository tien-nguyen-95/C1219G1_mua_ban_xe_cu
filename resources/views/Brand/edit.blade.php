@extends('partials.head')
@section('content')
<label for="">Name</label>
    <form action="{{route('brands.update')}}" method="POST">
        @csrf
        @method("PUT")
        <input id="name" type="text" name="name" value="{{$brand->name}}" placeholder="nhập tên">
        <input type="submit" value="Create">
    </form>
@endsection
