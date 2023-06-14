@extends('layouts.layouts')

@section('content')
    <!-- Hero -->
    <?php
//    $productLatest = \App\Entities\Product::where('status', 1)->orderBy('id', 'desc')->limit(9)->get();
    $newLatest = \App\Entities\Post::where('status', 1)->orderBy('id', 'desc')->limit(10)->get();
    $categories = \App\Entities\Category::where('status', 1)->get();
    $brandProducts = \App\Entities\Brand::all();
    $banner = \App\Entities\Banner::where('status', 1)->get();
    ?>


    <div class="hero-1 oh pos-rel">
        <!-- container -->
        <div class="hero-banner-carousel">
            @foreach($banner as $k => $v)
            <div class="hero-carousel-item">
                <!-- row -->
                <div class="row align-items-center">
                    <div class="col-lg-12 d-lg-block">
                        <div class="hero-1-thumb-15 wow fadeInUp animated" data-wow-delay="0.4s">
                            <img class="img-fluid wow fadeInRight animated"
                                 src="{{Storage::url($v->image)}}" alt="hero-1">
                        </div>
                    </div>
                    <!-- /col -->
                </div>
                <!-- /row -->

                <!-- /container -->
            </div>
            @endforeach
        </div>
    </div>
    <!-- /Hero -->
    <div class="category pt-5 pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="category__header d-flex align-items-center justify-content-between">
                        <h3>Danh mục xe</h3>
                        <span><a href="{{route('category.list')}}">Xem tất cả</a></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <ul class="category-list mt-20 row">
                        @if(!empty($categories))
                            @foreach($categories as $k => $v)
                                @include('endUser.components.modal',['idName' => str_slug($v->name),'name' => $v->name,'brands'=> $v->brands ])
                                <li class="col-4 col-lg-2 col-sm-3 text-center">
                                    <div class="item__box" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#{{str_slug($v->name)}}">
                                        <img src="{{Storage::url($v->image)}}" width="48" alt="">
                                    </div>
                                    <p >{{$v->name}}</p>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="thuonghieu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="category__header d-flex align-items-center justify-content-between">
                        <h3>Thương hiệu xe</h3>
                        <span><a href="{{route('brand.list')}}">Xem tất cả</a></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="clients-carousel testimonial-item-wrap-1 mt-20">
                        @if(!empty($brandProducts))
                            @foreach($brandProducts as $k => $v)
                        <div class="clients-item">
                            <div class="col-12 text-center">
                                <div class="client-logso">
                                    <div class="client-logo-img">
                                        <a href="{{route('product.brand',['id' => $v->id])}}">
                                        <img src="{{Storage::url($v->image)}}" alt=""
                                             height="130px">
                                        </a>
                                    </div>
                                    <p>{{$v->name}}</p>
                                </div>
                            </div>
                        </div>
                            @endforeach
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-news">
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <div class="category__header d-flex align-items-center justify-content-between">
                        <h3>Xe mới nhất</h3>
                        <span><a href="{{route('product.list')}}">Xem tất cả</a></span>
                    </div>
                </div>
            </div>

            <div class="row mt-20">
                @if(!empty($productLatest))
                    @foreach($productLatest as $k => $v)
                        <div class="col-6 col-lg-4 col-sm-6">
                            @include('endUser.components.item',['data' => $v,'isBlog' => false,'id' => $v->id])
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- Blog -->
    <div class="blog-area pt-10 pb-10">
        <!-- Container-->
        <div class="container">
            <!-- row -->
            <div class="row justify-content-center text-center">
                <!-- col -->
                <div class="col-lg-8 col-md-12 mb-50">
                    <div class="section-title">
                        <h2 class="title">Tin tức</h2>
                        <div class="title-bdr">
                            <div class="left-bdr"></div>
                            <div class="right-bdr"></div>
                        </div>

                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
            <!-- row -->
            <div class="row">
                <div class="news-carousel testimonial-item-wrap-1">
                    @if(!empty($newLatest))
                        @foreach($newLatest as $k => $v)
                            @include('endUser.components.item',['data' => $v,'isBlog' => true ,'id' => $v->id ])
                        @endforeach
                    @endif
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /Container-->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="map-site ml-15">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.749413971558!2d106.70001091474937!3d10.83047889228485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175288afa9a39e3%3A0x21dd2d5512f4dbd!2zMTY1IMSQLiDEkOG6t25nIFRodeG7syBUcsOibSwgUGjGsOG7nW5nIDEzLCBCw6xuaCBUaOG6oW5oLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1645606624162!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
    <!-- /Blog -->
    <div class="download-area">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row align-items-center justify-content-between">
                <!-- col -->
                <div class="col-xl-7 col-lg-6 col-md-6">
                    <div class="download-1-content mt-50">
                        <h2 class=" wow fadeInUp animated">Tải & cài đặt ứng dụng về máy của bạn</h2>
                        <ul>
                            <li class="wow fadeInUp animated" data-wow-delay="0.2s"><i class="la la-check"></i>
                                Shop xe trùm góp chuyên phân phối xe máy tốt nhất hiện nay. </li>
                            <li class="wow fadeInUp animated" data-wow-delay="0.4s"><i class="la la-check"></i>
                                Nhiều mẫu xe mới chất lượng. </li>
                            <li class="wow fadeInUp animated" data-wow-delay="0.6s"><i class="la la-check"></i>
                                Phù hợp với túi tiền mọi người. </li>
                            <li class="wow fadeInUp animated" data-wow-delay="0.6s"><i class="la la-check"></i>
                                Hỗ trợ trả góp tay đôi. </li>
                        </ul>
                        <div class="mt-4 wow fadeInUp animated d-flex" data-wow-delay="0.6s">
                            <a href="https://play.google.com/store/apps/details?id=com.devk.project_bike_car&hl=vi&gl=US" target="_blank" class="btn theme-btn-1">
                                <img src="{{asset('enduser/images/svg/android.svg')}}" alt="">
                            </a>
                            <a href="https://apps.apple.com/vn/app/tr%C3%B9m-g%C3%B3p/id1567793112?l=vi" target="_blank" class="btn theme-btn-1">
                                <img src="{{asset('enduser/images/svg/apple.svg')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /col -->
                <!-- col -->
                <div class="col-xl-5 col-lg-6 col-md-6">
                    <div class="download-1-img">
                        <img class=" img-fluid" src="{{asset('enduser/images/download.png')}}" alt="">
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /Container -->
    </div>
@endsection
