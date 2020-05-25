<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mua bán xe cũ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<header>
    <div class="row my-3">
        <div class="col-4">
            <h3 class="text-center"><i class="fa fa-car m-sm-1"></i>Chợ Xe Cũ</h3>
        </div>
        <div class="col-6">
            <input type="text" placeholder="Nhập từ khóa tìm kiếm" class="form-control btn-block">
        </div>
        <div class="col-1">
            <button class="btn"><i class='fa fa-search m-sm-1'></i> Tìm kiếm</button>
        </div>
        <div class="col-1">
            <a href="{{ route('login') }}" class="btn btn-primary"><i class="fa fa-user m-sm-1"></i>Đăng nhập</a>
        </div>
    </div>

    <nav class="navbar navbar-expand-sm bg-light justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="" class="nav-link"><i class="fa fa-home"></i></a></li>
            <li class="nav-item"><a href="" class="nav-link">Xe phân khối lớn</a></li>
            <li class="nav-item"><a href="" class="nav-link">Xe độ</a></li>
            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Loại xe
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Link 1</a>
                    <a class="dropdown-item" href="#">Link 2</a>
                    <a class="dropdown-item" href="#">Link 3</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Phân khối
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Link 1</a>
                    <a class="dropdown-item" href="#">Link 2</a>
                    <a class="dropdown-item" href="#">Link 3</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Xuất sứ
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Link 1</a>
                    <a class="dropdown-item" href="#">Link 2</a>
                    <a class="dropdown-item" href="#">Link 3</a>
                </div>
            </li>
        </ul>
    </nav>
</header>
    <div class="container">
        <div class="row">
            <div class="col-3 ">
                <h3>Loại xe</h3>
                <nav class="navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="" class="nav-link">Sản Phẩm 1</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Sản Phẩm 2</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Sản Phẩm 3</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Sản Phẩm 4</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Sản Phẩm 5</a></li>
                    </ul>
                </nav>

                <hr>
                <h3>Phân khối</h3>
                <nav class="navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="" class="nav-link">Sản Phẩm 1</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Sản Phẩm 2</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Sản Phẩm 3</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Sản Phẩm 4</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Sản Phẩm 5</a></li>
                    </ul>
                </nav>

                <hr>
                <h3>Xuất sứ</h3>
                <nav class="navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="" class="nav-link">Sản Phẩm 1</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Sản Phẩm 2</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Sản Phẩm 3</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Sản Phẩm 4</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Sản Phẩm 5</a></li>
                    </ul>
                </nav>
                <hr>
                <h3>Sản phẩm</h3>
            </div>
            <div class="col-9">
                <h3>Sản phẩm</h3>
                <style>
                </style>
                <div class="row row-cols-3">
                    @for ($i = 0 ; $i < 10 ; $i++)
                        <div class="col p-1">
                            <div class="card ">
                            <img class="card-img-top" src="data:image/jpeg;base64,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" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title">Xe không cũ 1 tỉ beli</h4>
                                <p class="card-text">Xe ngon miễn bàn !!!</p>
                                <a href="#" class="btn btn-primary">Xem thêm</a>
                            </div>
                        </div>
                        </div>
                    @endfor
                </div>
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                  </ul>
            </div>
        </div>
    </div>
<footer class="bg-light p-5">
    <div class="row">
        <div class="col-6 p-5">
            Chợ Xe Cũ chỉ là tên ở đây không bán xe cũ
        </div>
        <div class="col-3 p-5">
            <strong>Địa chỉ:</strong>
            28 nguyễn tri phương thành phố Huế
        </div>
        <div class="col-3 p-5">
            <strong>HotLine:</strong>
            0999995578
        </div>
    </div>
</footer>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>
