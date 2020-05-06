<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chi nhánh</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>

    <div class="container" >
        @include('admin.branch.create')
        <h2>Danh sách Chi nhánh</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Thời gian tạo</th>
                    <th>Thời gian sửa</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody class="data-table">
              @include('admin.branch.table')
            </tbody>
        </table>
       @include('admin.branch.addBranchAjax')
    </div>
</body>
</html>
