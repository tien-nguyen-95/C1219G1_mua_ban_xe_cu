<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mua bán xe cũ</title>
    <base href="{{ asset('') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .nav-link{
            color: black;
        }
        .nav-link :hover{
            color: red important!!!;
        }
    </style>
</head>
<body>
<header>
    <div class="row py-3 bg-dark" style="color:whitesmoke">
        <div class="col-4">
            <h3 class="text-center"><i class="fa fa-car m-sm-1"></i>Chợ Xe Cũ</h3>
        </div>
        <div class="col-6">
            <input type="text" placeholder="Nhập từ khóa tìm kiếm" class="form-control btn-block">
        </div>
        <div class="col-1">
            <button class="btn btn-primary"><i class='fa fa-search m-sm-1'></i> Tìm kiếm</button>
        </div>
        <div class="col-1">
            <a href="{{ route('login') }}" class="btn btn-primary"><i class="fa fa-user m-sm-1"></i>Đăng nhập</a>
        </div>
    </div>

    <nav class="navbar navbar-expand-sm border justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="{{ route('welcome') }}" class="nav-link"><i class="fa fa-home"></i></a></li>
            <li class="nav-item"><a href="{{ route('welcome') }}" class="nav-link">Tất cả</a></li>
            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Loại xe
                </a>
                <div class="dropdown-menu" id="category-menu">

                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Thương hiệu
                </a>
                <div class="dropdown-menu" id="brand-menu">

                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Chi nhánh
                </a>
                <div class="dropdown-menu" id="branch-menu">

                </div>
            </li>
        </ul>
    </nav>
</header>
    <div class="container border">
        <div class="row">
            <div class="col-3 pt-3">
                <h3>Loại xe</h3>
                <nav class="navbar">
                    <div id="category-list">

                    </div>
                </nav>

                <hr>
                <h3>Thương hiệu</h3>
                <nav class="navbar">
                    <ul class="navbar-nav" id="brand-list">

                    </ul>
                </nav>

                <hr>
                <h3>Chi nhánh</h3>
                <nav class="navbar">
                    <ul class="navbar-nav" id="branch-list">

                    </ul>
                </nav>
                <hr>
            </div>
            <div class="col-9 pt-3" >
                <h3>Sản phẩm</h3>
                <div class="clearfix">
                    <span class="float-left" id="span-left"></span>
                    <span class="float-right" id="span-right"></span>
                  </div>
                <div class="row row-cols-3" id="product-data">

                </div>
                {{-- <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul> --}}
            </div>
        </div>
    </div>
<footer class="bg-dark p-5 text-light">
    <div class="row">
        <div class="col-6 p-5">
            <h4>Chợ Xe Cũ chỉ là tên, ở đây không bán xe cũ</h4>
        </div>
        <div class="col-3 p-5">
            <h4> <strong>Địa chỉ:</strong>
            28 nguyễn tri phương thành phố Huế</h4>
        </div>
        <div class="col-3 p-5">
        <h4><strong>HotLine:</strong>
            0999995578</h4>
        </div>
    </div>
</footer>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="{{ asset('/shop/js/shop.js') }}"></script>


</html>
