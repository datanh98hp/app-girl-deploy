@extends('layouts.layouts')

@section('content')
    <!-- Blog -->
    <div class="blog-area pt-120 pb-100">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-xl-8 col-lg-8 me-auto ms-auto">
                    <div class="blog-details white-bg">
                        <div class="blog-img">
                            <a href="#"><img src="{{Storage::url($post->image)}}" alt=""></a>
                        </div>
                        <div class="blog-wrapper mb-30">
                            <div class="blog-text">
                                <h4><a href="#">{{$post->name}}</a></h4>
                                <!-- <a href="blog-single.html">Read More <i class="las la-arrow-right"></i></a> -->
                                <div class="blog-meta mb-30">
                                    <span> <i class="las la-user"></i> Post By Admin</span>
                                    <!-- <span> <i class="lar la-heart"></i> Comments (03)</span> -->
                                </div>
                                {!! $post->content !!}
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /Container -->
    </div>
    <!-- /Blog -->

@endsection
