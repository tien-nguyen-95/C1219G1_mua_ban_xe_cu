@isset($branches)
@forelse ($branches as $item)
<tr>
    <td>{{ $item->name }}</td>
    <td>{{ $item->phone }}</td>
    <td>{{ $item->address }}</td>
    <td>{{ $item->created_at }}</td>
    <td>{{ $item->updated_at }}</td>
    <td><a href="">sửa</a> <a href="">xóa</a></td>
</tr>
@empty
    <tr>
        <td colspan="6">
            <h6 class="alert alert-danger text-center" >Không có dữ liệu</h6>
        </td>
    </tr>
    @endforelse
@endif
