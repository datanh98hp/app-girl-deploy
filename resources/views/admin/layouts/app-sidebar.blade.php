<!--APP-SIDEBAR-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        {{-- <a class="header-brand1" href="{{ url('/') }}">
            <img src="{{asset('assets/images/logo.jpg')}}" class="header-brand-img light-logo1" alt="logo" width="100px">
        </a><!-- LOGO --> --}}
        <a aria-label="Hide Sidebar" class="app-sidebar__toggle ml-auto" data-toggle="sidebar" href="#"></a>
        <!-- sidebar-toggle-->
    </div>
    <ul class="side-menu">
        <li><h3>Tin tức</h3></li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-book"></i><span
                    class="side-menu__label">Bài viết</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a class="slide-item" href="{{ Route('admin.post.index') }}"><span>Bài viết</span></a></li>
<!--                <li><a class="slide-item" href="{{ Route('admin.category.index') }}"><span>Chuyên mục</span></a></li>-->
                <li><a class="slide-item" href="{{ Route('admin.page.index') }}"><span>Trang</span></a></li>
            </ul>
        </li>
        <li><h3>Sản phẩm</h3></li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-book"></i><span
                    class="side-menu__label">QL Sản phẩm</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a class="slide-item" href="{{ Route('admin.product.index') }}"><span>Sản phẩm</span></a></li>
                <li><a class="slide-item" href="{{ Route('admin.category.index') }}"><span>Chuyên mục</span></a></li>
                <li><a class="slide-item" href="{{ Route('admin.brand.index') }}"><span>Thương hiệu</span></a></li>
{{--                <li><a class="slide-item" href="{{ Route('admin.sim.index') }}"><span>Sim</span></a></li>--}}
{{--                <li><a class="slide-item" href="{{ Route('admin.smartphone.index') }}"><span>Điện thoại</span></a></li>--}}
{{--                <li><a class="slide-item" href="{{ Route('admin.locate.index') }}"><span>Thiết bị định vị</span></a></li>--}}
            </ul>
        </li>
        <li class="slide"><a class="side-menu__item" href="{{ Route('admin.bank.index') }}"><i
                    class="side-menu__icon ti-lock"></i><span>Ngân hàng</span></a></li>
        <li class="slide"><a class="side-menu__item" href="{{ Route('admin.contact.index') }}"><i
                    class="side-menu__icon ti-id-badge"></i><span>Liên hệ</span></a></li>
        <li class="slide"><a class="side-menu__item" href="{{ Route('admin.banner.index') }}"><i
                    class="side-menu__icon ti-id-badge"></i><span>Banner</span></a></li>
        {{-- <li class="slide"><a class="side-menu__item" href="{{ Route('admin.widget.index') }}"><i
                    class="side-menu__icon ti-id-badge"></i><span>Widget</span></a></li> --}}
{{--        <li class="slide"><a class="side-menu__item" href="{{ Route('admin.bill.index') }}"><i--}}
{{--                    class="side-menu__icon ti-shopping-cart"></i><span>Đơn hàng</span></a></li>--}}
{{--        <li class="slide"><a class="side-menu__item" href="{{ Route('admin.member.index') }}"><i--}}
{{--                    class="side-menu__icon ti-user"></i><span>Khách hàng</span></a></li>--}}
        <li class="slide"><a class="side-menu__item" href="{{ Route('admin.user.index') }}"><i
                    class="side-menu__icon ti-user"></i><span>QL Admin</span></a></li>
    </ul>
</aside>
<!--/APP-SIDEBAR-->
