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
                <i class="fa fa-edit" title="Edit"></i></button>
        </td>
        </td>
        <td>
            <a href="#" class="btn btn-danger deleteBranch" onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="fas fa-trash" title="Xóa"></i></a>
        </td>
    </tr>
    @endforeach
@endif
