<!-- Header -->
<div class="navbar-area">
    <div class="acavo-responsive-nav">
        <!-- Container -->
        <div class="container">
            <div class="acavo-responsive-menu">
                <div class="logo">

                </div>
            </div>
        </div>
        <!-- /Container -->
    </div>
    <div class="acavo-nav">
        <!-- Container -->
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="/">
                    <img src="{{asset('enduser/images/logo_reapla.png')}}" alt="logo">
                </a>

                <div class="collapse navbar-collapse ">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="/" class="nav-link active">Trang chủ </a>
                        </li>
                        <li class="nav-item"><a href="/danh-sach-san-pham" class="nav-link">Cửa hàng </a></li>
                        <li class="nav-item"><a href="/tin-tuc" class="nav-link">Tin Tức</a>
                        </li>
                        <li class="nav-item"><a href="/lien-he" class="nav-link">Liên Hệ</a></li>
                    </ul>
                    <div class="others-option d-flex align-items-center">
                        <div class="option-item">
                            <form class="search-box" method="get" action="{{route('product.search')}}">
                                @csrf
                                <input type="text" value="{{request()->get('keyword')}}" name="keyword" class="input-search" placeholder="Tìm kiếm...">
                                <button type="submit"><i class="uil uil-search-alt"></i></button>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="option-item">
                    <form class="search-box" method="get" action="{{route('product.search')}}">
                        @csrf
                        <input type="text" name="keyword" class="input-search ipad" placeholder="Tìm kiếm...">
                        {{--                        <button type="submit"><i class="uil uil-search-alt"></i></button>--}}
                    </form>
                </div>
            </nav>
        </div>
        <!-- /Container -->
    </div>
    <style>
        @media (min-width: 1200px) {
            .input-search.mobile{
                display: none;
            }

        }
        @media (min-width: 1499px){
            .input-search.ipad{
                display: none;
            }

        }
    </style>
    <div class="others-option-for-responsive">
        <!-- Container -->
        <div class="container">
            <div class="dot-menu">
                <div class="option-item">
                    <form class="search-box" method="get" action="{{route('product.search')}}">
                        @csrf
                        <input type="text" name="keyword" value="{{request()->get('keyword')}}" class="input-search mobile" placeholder="Tìm kiếm...">
{{--                        <button type="submit"><i class="uil uil-search-alt"></i></button>--}}
                    </form>
                </div>
                <div class="button-toggle">
                    <i class="las la-sliders-h" style="font-size:30px"></i>
                </div>
            </div>

                <ul class="toggle-menu-responsive" style="background: white">
                    <li ><a href="/" class="nav-link " style="color: black">Trang chủ </a>
                    </li>
                    <li  ><a href="/danh-sach-san-pham" style="color: black" class="nav-link">Cửa hàng </a></li>
                    <li ><a href="/tin-tuc" class="nav-link" style="color: black">Tin Tức</a>
                    </li>
                    <li ><a href="/lien-he" class="nav-link" style="color: black">Liên Hệ</a></li>
                </ul>

            <!-- Container -->
{{--            <div class="container">--}}
{{--                <div class="option-inner">--}}
{{--                    <div class="others-option">--}}
{{--                        <div class="option-item">--}}
{{--                            <form class="search-box" method="get" action="{{route('product.search')}}">--}}
{{--                                @csrf--}}
{{--                                <input type="text" name="keyword" class="input-search" placeholder="Tìm kiếm...">--}}
{{--                                <button type="submit"><i class="uil uil-search-alt"></i></button>--}}
{{--                            </form>--}}
{{--                        </div>--}}


{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- /Container -->
        </div>
        <!-- /Container -->
    </div>
</div>
<!-- /Header -->
