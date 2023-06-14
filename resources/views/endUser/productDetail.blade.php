@extends('layouts.layouts')

@section('content')
    <!-- Blog -->
    <style>
        .product_left .owl-prev{
            position: absolute;
            top: 50%;
            color: white;
            width: 30px;
            height: 30px;
            background: #367b3b;
            text-align: center;
            transform: translateY(-50%);
        }
        .product_left .owl-next{
            position: absolute;
            top: 50%;
            color: white;
            right: 0;
            width: 30px;
            height: 30px;
            background: #367b3b;
            text-align: center;
            transform: translateY(-50%);
        }
    </style>
    <div class="blog-area pt-100">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-xl-5 col-lg-5">
                    <div class="product_left">
                        <div class="product_left-slider">
                            <?php
                            $gallery = json_decode($product->images, true);
                            ?>
                            @if(!empty($gallery))
                                @foreach($gallery as $k => $v)
                                    <div class="slider__item">
                                        <img class="img-fluid"
                                             src="{{Storage::url($v)}}" alt="hero-1">
                                    </div>
                                @endforeach
                            @endif
                        </div>

                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="product_right">
                        <div class="product_left-info">
                            <div class="info_xe ">
                                <h3 class="title mt-5">{{$product->name}}</h3>
                                <span>{{$product->views}} lượt xem</span>
                            </div>
                            <div class="product_left-price">
                                <div class="price_left">
                                    <p style="color: #F67125;font-weight: 700;">{{number_format($product->price_old)}} Đ ( Giá trả góp )</p>
                                    <p>Giá tiền mặt : {{number_format($product->price)}}</p>
                                </div>

                                <p>{{$product->description}}</p>
                            </div>
                            <div class="box-abc d-none d-lg-block">
                                <button type="button" class="btn btn-primary"><a href="tel:+0888898000" style="color: white">Gọi điện </a></button>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalDetail">Đặt cọc</button>
                                <button type="button" class="btn btn-success"><a href="https://zalo.me/g/bdplvu322" style="color: white">Chat Nhóm </a></button>
                                <button type="button" class="btn btn-warning"><a href="https://zalo.me/0888898000" style="color: white">Zalo </a></button>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
            <div class="row  mt-40">
                <div class="col-12">
                    {!! $product->content !!}
                </div>
            </div>
        </div>
        <!-- /Container -->
    </div>
    <!-- /Blog -->
    <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img style="width: 200px;
    display: block;
    margin: auto;
    margin-bottom: 20px;"  src="{{asset('enduser/images/logo_reapla.png')}}" alt="logo">
                    Đặt cọc tối thiểu là 10 % giá trị mặt hàng.
                    Người đặt cung cấp : họ tên và số điện thoại.
                    Khi đặt cọc xong, quý khách gửi biên lai chuyển tiền đến zalo :0888898000 để chúng tôi xác nhận.
                    Quý khách vui lòng chuyển khoản qua 1 trong những ngân hàng dưới đây:
                    <p style="color: #0c4128">+ Vietcombank: 6.9999.66666 Nguyễn Quốc Cường</p>
                    <p style="color: #0c4128">+ Vietcombank: 0371004888888 - Nguyễn Trần Trọng Đạt</p>
                    <p style="color: #0c4128">+ ACB: 88198888888 - Nguyễn Trần Trọng Đạt</p>
                    <p style="color: #0c4128">+ Sacombank: 060195886868 - Nguyễn Trần Trọng Đạt</p>
                    <p style="color: #0c4128">+ Vietinbank: 108803078888 - Nguyễn Trần Trọng Đạt</p>
                    <p style="color: #0c4128">+ Momo: 0888898000 Nguyễn trần trọng đạt</p>

                </div>
            </div>
        </div>
    </div>
    <div class="container d-lg-none">
        <div class="row">
            <div class="col-12">
                <div class="box_bottom" >
                    <div class="box_coc">
                        <a href="tel:+0888898000" style="color: white">
                        <span><i class="las la-phone"></i></span>
                        <p>Gọi điện </p>
                        </a>
                    </div>
                    <div class="box_coc" data-bs-toggle="modal" data-bs-target="#modalDetail">
                        <span><i class="las la-coins"></i></span>
                        <p ><a  href="#" style="color: white">Đặt cọc</a></p>
                    </div>
                    <div class="box_coc">
                        <a href="https://zalo.me/g/bdplvu322" style="color: white;display: block">
                        <span><i class="las la-comment"></i></span>
                        <p>Chat nhóm</p>
                        </a>
                    </div>
                    <div class="box_coc">
                        <a href="https://zalo.me/0888898000" style="color: white;display: block">
                        <span><i class="lab la-facebook-messenger"></i></span>
                        <p>Zalo</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .box_bottom{
            display: flex;
            align-items: center;
            position: fixed;
            bottom: 0;
            z-index: 999;
            background: #367b3b;
            width: 70%;
            left: 50%;
            color: white;
            transform: translateX(-50%);
            padding-top: 16px;
        }
        .box_coc {
            width: 25%;
            text-align: center;
            padding: 0 15px;
        }
        .box_coc i {
            font-size: 35px;
        }
        .box_coc p{
            margin-bottom: 0;
        }

        @media (max-width: 992px) {
.box_bottom{
    width: 100%;
    left: 0%;
    transform: translateX(0%);
    padding-top: 0;
}
            .box_coc i {
                font-size: 25px;
            }
            .box_coc p {
                font-size: 13px;
            }
        }
    </style>
@endsection
