<!DOCTYPE html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- /Required meta tags -->
    <meta content="Trùm góp" property="og:site_name"/>
    <meta property="og:url" content="https://trumgop.com/"/>
    <meta property="og:image" content="https://trumgop.com/enduser/images/logo_reapla.png"/>
    <meta content="Trùm góp -  0888898000" property="og:title"/>
    <meta content="Giá bán GÓP trên App Trùm Góp--> Trả trước 50%, còn 50% GÓP + LÃI.
➖ Góp tay đôi với shop không thông qua ngân hàng, chấp nợ xấu vẫn góp được.
➖ Chỉ bán cho AE đúng hộ khẩu, và gia đình biết mua góp. Cần CMND và HỘ KHẨU
➖ HCM và các tỉnh lận cận, giao xe tận noi, làm hồ sơ góp online.
Liên hệ thắc mắc: 0888898000 - 0878888850.
ĐẶT BIỆT: Góp với FE không cần trả trước, nợ xấu vẫn ok, sang tên chính chủ.
ĐỊA CHỈ: 163 - 165 Đặng Thùy Trâm, Phường 13, Quận Bình Thạnh, TPHCM." property="og:description"/>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('enduser/images/logo_reapla.png')}}" type="image/x-icon">
    <!-- /Favicon -->

    <!-- All CSS -->

    <!-- Vendor Css -->
    <link rel="stylesheet" href="{{asset('enduser/css/vendors.css')}}">
    <!-- /Vendor Css -->

    <!-- Plugin Css -->
    <link rel="stylesheet" href="{{asset('enduser/css/plugins.css')}}">
    <!-- Plugin Css -->

    <!-- Icons Css -->
    <link rel="stylesheet" href="{{asset('enduser/css/icons.css')}}">
    <!-- /Icons Css -->

    <!-- Style Css -->
    <link rel="stylesheet" href="{{asset('enduser/css/style.css')}}">
    <!-- /Style Css -->

    <!-- /All CSS -->

</head>
<body class="h-100">
<style>
    @media (max-width: 767px) {
        .image-mobile{
            height:100px!important;
        }
        .custom-padding{
            padding: 0 8px 0px 9px;
        }
        .custom-padding h4{
            margin-bottom: 0px;
            position: relative;
            padding-top: 0px;
        }
        .custom-padding h4 > a{
            height: 24px;
            -webkit-line-clamp: 1;
            font-size: 16px;
        }
    }
</style>
<!-- PreLoader -->
{{--<div id="preloader">--}}
{{--    <div id="status">--}}
{{--        <div class="spinner"></div>--}}
{{--    </div>--}}
{{--</div>--}}
<!--Preloader-->
@include('endUser.partials.header')
@yield('content')
@if(\Request::route()->getName() != 'product.detail' ))
@include('endUser.partials.footer')
@endif
<!-- Go top -->
{{--<div class="go-top-area">--}}
{{--    <div class="go-top-wrap">--}}
{{--        <div class="go-top-btn-wrap">--}}
{{--            <div class="go-top go-top-btn">--}}
{{--                <i class="las la-angle-double-up"></i>--}}
{{--                <i class="las la-angle-double-up"></i>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- /Go top -->
<!-- Vendor Js -->


<script src="{{asset('enduser/js/vendors.js')}}"></script>
<!-- /Vendor js -->

<!-- Plugins Js -->
<script src="{{asset('enduser/js/plugins.js')}}"></script>
<!-- /Plugins Js -->

<!-- Main JS -->
<script src="{{asset('enduser/js/main.js')}}"></script>
<!-- /Main JS -->
<script>
    $(".toggle-menu-responsive").slideUp();
    $(".button-toggle").click(function(){
        $(".toggle-menu-responsive").slideToggle();
    });
</script>
<!-- /JS -->
</body>
</html>
