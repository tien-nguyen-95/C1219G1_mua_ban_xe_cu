<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chi nhánh</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
        <h2>Danh sách Chi nhánh</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Thời gian tạo</th>
                    <th>Thời gian sửa</th>
                </tr>
            </thead>
            <tbody>
                @if(count($branches) < 1)
                <tr>
                    <td colspan="5">
                        <h6 class="alert alert-danger text-center" >Không có dữ liệu</h6>
                    </td>
                </tr>
                @else
                @foreach ($branches as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>

</body>
</html>
