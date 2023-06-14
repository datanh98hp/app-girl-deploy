@extends('layouts.layouts')

@section('content')
    <!-- Contact Info -->
    <div class="contact-info-area pt-100 pb-70">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-box">
                        <div class="back-icon">
                            <i class="ri-map-2-line"></i>
                        </div>
                        <div class="icon">
                            <i class="ri-map-2-line"></i>
                        </div>
                        <h3>Địa chỉ</h3>
                        <p>163-165 Đặng Thùy Trâm ,P13 Quận Bình Thạnh (Trục 30m cũ)</p>
                    </div>
                </div>
                <!-- /col -->
                <!-- col -->
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-box">
                        <div class="back-icon">
                            <i class="ri-phone-line"></i>
                        </div>
                        <div class="icon">
                            <i class="ri-phone-line"></i>
                        </div>
                        <h3>Liên Hệ</h3>
                        <p><a href="tel:+0888898000">(+84) 08888.98000 - 087.88888.50</a></p>
                    </div>
                </div>
                <!-- /col -->
                <!-- col -->
                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                    <div class="contact-info-box">
                        <div class="back-icon">
                            <i class="ri-time-line"></i>
                        </div>
                        <div class="icon">
                            <i class="ri-time-line"></i>
                        </div>
                        <h3>Website</h3>
                        <p><a href="https://trumgop.xyz/">http://trumgop.com</a></p>
                        <p><a href="http://trumgop.xyz/">http://shopxecuongk.com</a></p>
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /Container -->
    </div>
    <!-- /Contact Info -->
    <!-- Contact -->
    <div class="contact-section">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row clearfix">
                <!-- col -->
                <div class="col-lg-6">
                    <div class="map-site ml-15">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.749413971558!2d106.70001091474937!3d10.83047889228485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175288afa9a39e3%3A0x21dd2d5512f4dbd!2zMTY1IMSQLiDEkOG6t25nIFRodeG7syBUcsOibSwgUGjGsOG7nW5nIDEzLCBCw6xuaCBUaOG6oW5oLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1645606624162!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <!-- /col -->
                <!-- col -->

                <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                    @if(Session::get('success'))
                        <div class="alert alert-success">
                            {{session::get('success')}}
                        </div>
                    @endif
                    <div class="form-inner">
                        <h3>Để lại thông tin của bạn</h3>
                        <form method="post" action="{{route('contact.save')}}" id="contact-form" class="default-form" >
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-icon contacts-name">
                                    <input value="{{ old('name', '') }}" type="text" class="@error('name') is-invalid @enderror" name="name"  placeholder="Tên..">
                                    @error('first_name')
                                    <div class="alert alert-danger  mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-icon contacts-email">
                                    <input value="{{ old('email', '') }}" type="email" class="@error('email') is-invalid @enderror" name="email" placeholder="Email...">
                                    @error('email')
                                    <div class="alert alert-danger  mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-icon contacts-phone">
                                    <input value="{{ old('phone', '') }}" type="text" class="@error('phone') is-invalid @enderror" name="phone" placeholder="Số điện thoại...">
                                    @error('phone')
                                    <div class="alert alert-danger  mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-icon ">
                                    <input value="{{ old('address', '') }}" type="text" class="@error('address') is-invalid @enderror" name="address" placeholder="Địa chỉ..." >
                                    @error('address')
                                    <div class="alert alert-danger  mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-icon contacts-message">
                                    <textarea name="content" placeholder="Nội dung..."></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                    <button class="btn theme-btn-1" type="submit" name="submit-form">Gửi cho chúng tôi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- col -->
            </div>
            <!-- /row -->
        </div>
        <!-- Container -->
    </div>
    <!-- /Contact -->
@endsection
