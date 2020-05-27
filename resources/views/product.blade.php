<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mua bán xe cũ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('shop/css/slide.css') }}">
    <style>
        .nav-link{
            color: black;
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
                <div class="dropdown-menu" id="origin">

                </div>
            </li>
        </ul>
    </nav>
</header>

<div class="container">
    <div class="row">
        <div class="col-6">
                <div class="mySlides">
                  <div class="numbertext">1 / 6</div>
                  <img src="{{ asset('shop/img/darkrai1.jpg') }}" style="width:100%;height:445px">
                </div>

                <div class="mySlides">
                  <div class="numbertext">2 / 6</div>
                  <img src="{{ asset('shop/img/darkrai2.jpg') }}" style="width:100%;height:445px">
                </div>

                <div class="mySlides">
                  <div class="numbertext">3 / 6</div>
                  <img src="{{ asset('shop/img/darkrai3.jpg') }}" style="width:100%;height:445px">
                </div>

                <div class="mySlides">
                  <div class="numbertext">4 / 6</div>
                  <img src="{{ asset('shop/img/darkrai4.jpg') }}" style="width:100%;height:445px">
                </div>

                <div class="mySlides">
                  <div class="numbertext">5 / 6</div>
                  <img src="{{ asset('shop/img/darkrai5.jpg') }}" style="width:100%;height:445px">
                </div>

                <div class="mySlides">
                  <div class="numbertext">6 / 6</div>
                  <img src="{{ asset('shop/img/darkrai6.jpg') }}" style="width:100%;height:445px">
                </div>

                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>

                <div class="caption-container">
                  <p id="caption"></p>
                </div>

                <div class="row">
                  <div class="column">
                    <img class="demo cursor" src="{{ asset('shop/img/darkrai1.jpg') }}" style="width:100%" onclick="currentSlide(1)" alt="Ảnh 1">
                  </div>
                  <div class="column">
                    <img class="demo cursor" src="{{ asset('shop/img/darkrai2.jpg') }}" style="width:100%" onclick="currentSlide(2)" alt="Ảnh 2">
                  </div>
                  <div class="column">
                    <img class="demo cursor" src="{{ asset('shop/img/darkrai3.jpg') }}" style="width:100%" onclick="currentSlide(3)" alt="Ảnh 3">
                  </div>
                  <div class="column">
                    <img class="demo cursor" src="{{ asset('shop/img/darkrai4.jpg') }}" style="width:100%" onclick="currentSlide(4)" alt="Ảnh 4">
                  </div>
                  <div class="column">
                    <img class="demo cursor" src="{{ asset('shop/img/darkrai5.jpg') }}" style="width:100%" onclick="currentSlide(5)" alt="Ảnh 5">
                  </div>
                  <div class="column">
                    <img class="demo cursor" src="{{ asset('shop/img/darkrai6.jpg') }}" style="width:100%" onclick="currentSlide(6)" alt="Ảnh 6">
                  </div>
                </div>

        </div>
        <div class="col-6">
            <h3 class="text-center my-1 py-1">Thông tin xe</h3>
            <h4 class="text-danger">100.000.000 đ</h4>
            <div class="form-group">
                <div class="form-control">
                    <div class="row">
                        <div class="col-5">
                            Dòng xe:
                        </div>
                        <div class="col-7">
                            Đang cập nhật
                        </div>
                    </div>
                </div>
                <div class="form-control">
                    <div class="row">
                        <div class="col-5">
                            Đã đi:
                        </div>
                        <div class="col-7">
                            Đang cập nhật
                        </div>
                    </div>
                </div>
                <div class="form-control">
                    <div class="row">
                        <div class="col-5">
                            Đời xe:
                        </div>
                        <div class="col-7">
                            Đang cập nhật
                        </div>
                    </div>
                </div>
                <div class="form-control">
                    <div class="row">
                        <div class="col-5">
                            Loại xe:
                        </div>
                        <div class="col-7">
                            Đang cập nhật
                        </div>
                    </div>
                </div>
                <div class="form-control">
                    <div class="row">
                        <div class="col-5">
                            Xuất sứ:
                        </div>
                        <div class="col-7">
                            Đang cập nhật
                        </div>
                    </div>
                </div>
                <div class="form-control">
                    <div class="row">
                        <div class="col-5">
                            Phân phối:
                        </div>
                        <div class="col-7">
                            Đang cập nhật
                        </div>
                    </div>
                </div>
                <div class="form-control">
                    <div class="row">
                        <div class="col-5">
                            Chi nhánh bán:
                        </div>
                        <div class="col-7">
                            Đang cập nhật
                        </div>
                    </div>
                </div>
            </div>
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
<script src="{{ asset('/shop/js/showSlide.js') }}"></script>
</html>
