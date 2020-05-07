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
