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
    <link rel="stylesheet" href="{{ asset('shop/css/slide.css') }}">
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
        <div class="col-7">
            <form action="{{ route('search') }}" method="post">
            @csrf

                <div class="row">
                    <div class="col-10">
                        <input type="text" name="keyword" placeholder="Nhập từ khóa tìm kiếm" class="form-control">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary"><i class='fa fa-search m-sm-1'></i> Tìm kiếm</button>
                    </div>
                </div>
            </form>

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

<div class="container">
    <div class="row">
        <div class="col-6">
            @if(count($product->files)>0)
                @foreach ( $product->files as $img )
                    <div class="mySlides">
                        <img src="{{ asset('/img/banner/'.$img->name) }}" style="width:100%;height:445px">
                    </div>
                @endforeach
            @else
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
            @endif

                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>

                <div class="caption-container">
                  <p id="caption"></p>
                </div>
                @if(count($product->files)>0)
                @foreach ( $product->files as $key=>$img )
                    <div class="column">
                        <img class="demo cursor" src="{{ asset('/img/banner/'.$img->name) }}" style="width:90px;height:86px" onclick="currentSlide({{ $key+1 }})" alt="Ảnh {{ $key+1 }}">
                      </div>
                @endforeach
                @else
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
                @endif

        </div>
        <div class="col-6">
            <h3 class="text-center my-3 py-3">Thông tin xe</h3>
            <div class="row text-danger">
                <div class="col-5">
                    <h4>Mã Sản Phẩm:</h4>
                </div>
                <div class="col-7">
                    <h4>{{ strtoupper ($product->code) }}</h4>
                </div>
            </div>
            <div class="row text-danger">
                <div class="col-5">
                    <h4>Giá:</h4>
                </div>
                <div class="col-7">
                    <h4>{{ number_format($product->export_price)." đ" }}</h4>
                </div>
            </div>

            <div class="form-group">
                <div class="form-control">
                    <div class="row">
                        <div class="col-5">
                            Dòng xe:
                        </div>
                        <div class="col-7">
                            {{ $product->name?? 'Đang cập nhật' }}
                        </div>
                    </div>
                </div>
                <div class="form-control">
                    <div class="row">
                        <div class="col-5">
                            Màu:
                        </div>
                        <div class="col-7">
                            {{ $product->color?? 'Đang cập nhật' }}
                        </div>
                    </div>
                </div>
                <div class="form-control">
                    <div class="row">
                        <div class="col-5">
                            Đã đi:
                        </div>
                        <div class="col-7">
                            {{ $product->miles? $product->miles.' km':'Đang cập nhật' }}
                        </div>
                    </div>
                </div>
                <div class="form-control">
                    <div class="row">
                        <div class="col-5">
                            Đời xe:
                        </div>
                        <div class="col-7">
                            {{ $product->model_year?? 'Đang cập nhật' }}
                        </div>
                    </div>
                </div>
                <div class="form-control">
                    <div class="row">
                        <div class="col-5">
                            Loại xe:
                        </div>
                        <div class="col-7">
                            {{ $product->category->name?? 'Đang cập nhật' }}
                        </div>
                    </div>
                </div>
                <div class="form-control">
                    <div class="row">
                        <div class="col-5">
                            Xuất sứ:
                        </div>
                        <div class="col-7">
                            {{ $product->origin?? 'Đang cập nhật' }}
                        </div>
                    </div>
                </div>
                <div class="form-control">
                    <div class="row">
                        <div class="col-5">
                            Phân khối:
                        </div>
                        <div class="col-7">
                            {{ $product->cc?? 'Đang cập nhật' }}
                        </div>
                    </div>
                </div>
                <div class="form-control">
                    <div class="row">
                        <div class="col-5">
                            Chi nhánh bán:
                        </div>
                        <div class="col-7">
                            {{ $product->branch->name?? 'Đang cập nhật' }}
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
<script src="{{ asset('/shop/js/shop.js') }}"></script>
</html>
</html>
