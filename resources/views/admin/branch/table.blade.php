{{-- @if(empty($branches))
    <tr>
        <td colspan="8">
            <h6 class="alert alert-danger text-center" >Không có dữ liệu</h6>
        </td>
    </tr>
@else
    @foreach ($branches as $key=>$item)
    <tr>
        <td>{{ ++$key }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->phone }}</td>
        <td>{{ $item->address }}</td>
        <td>{{ $item->created_at }}</td>
        <td>{{ $item->updated_at }}</td>
        <td>
<a href="{{ route('branch.edit', $item->id) }}" class="btn btn-success editBranch"><i class="fas fa-edit" title="Sửa"></i></a>
            <div class="conatiner">
            <button data-url="{{ route('branch.edit',$item) }}" ​ onclick="edit(this)" class="btn btn-info editBranch">
                <i class="fa fa-edit" title="Sửa"></i></button>
        </td>
        <td>
            <button data-url="{{ route('branch.destroy',$item->id) }}" ​ onclick="destroy(this)" class="btn btn-danger destroyBranch">
                <i class="fa fa-trash" title="Xoá"></i></button>
        </td>
    </tr>
    @endforeach
@endif --}}

<div class="container" >
    <button class="btn btn-info" data-url="{{ route('branch.create') }}" onclick="add(this)">Thêm mới</button>
    <button class="btn btn-info" style="float: right" onclick="trash()"><i class="fas fa-trash"></i> Thùng rác</button>
    <h2>Danh sách Chi nhánh</h2>
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Điện thoại</th>
                <th>Địa chỉ</th>
                <th>Thời gian tạo</th>
                <th>Thời gian sửa</th>
                <th colspan="2">Thao tác</th>
            </tr>
        </thead>
        <tbody class="data-table">
          {{-- @include('admin.branch.table') --}}
          @if(empty($branches))
    <tr>
        <td colspan="8">
            <h6 class="alert alert-danger text-center" >Không có dữ liệu</h6>
        </td>
    </tr>
        @else
            @foreach ($branches as $key=>$item)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>
                    {{-- <a href="{{ route('branch.edit', $item->id) }}" class="btn btn-success editBranch"><i class="fas fa-edit" title="Sửa"></i></a> --}}
                    <button data-url="{{ route('branch.edit',$item) }}" ​ onclick="edit(this)" class="btn btn-info editBranch">
                        <i class="fa fa-edit" title="Sửa"></i></button>
                </td>
                <td>
                    <button data-url="{{ route('branch.destroy',$item->id) }}" ​ onclick="destroy(this)" class="btn btn-danger destroyBranch">
                        <i class="fa fa-trash" title="Xoá"></i></button>
                </td>
            </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="crud-branch"></div>
</div>
</div>
