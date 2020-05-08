
<div class="container" >
    <button class="btn btn-info back">Back</button>
            <h2>Danh sách Chi nhánh đã xóa tạm</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Thời gian xoá</th>
                        <th colspan="2">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @if(empty($branches))
                    <tr>
                        <td colspan="7">
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
                        <td>{{ $item->deleted_at }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
            <div class="crud-branch"></div>
</div>
