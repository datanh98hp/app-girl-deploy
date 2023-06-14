<?php
if ($isBlog){
    $links = route('post.detail',['id' => $id]);
}
else{
    $links = route('product.detail',['id' => $id]);
}
?>

<div class="blog-wrapper mb-30">
    <div class="blog-img">
        <a href="{{ $links }}"><img  class="image-mobile" style="    height: 559px;
    object-fit: cover;border-radius: 5px;" width="100%" src="{{Storage::url($data->image)}}" alt=""></a>
    </div>
    <div class="blog-text custom-padding">
        <h4><a href="{{ $links }}">{{$data->name}}
            </a>
        </h4>
        @if($isBlog)
        <p class="mb-0 description" >
                {{$data->description}}
        </p>
        @else
            <p class="mb-0 " @if(!$isBlog) style="color: #198754;" @endif>
                <b>{{number_format($data->price)}} đ</b>
            </p>
        @endif
        <div class="blog-metas">
            @if($isBlog)
                <span> <i class="las la-calendar"></i> 05 Feb 2022</span>
            @else
                <span> {{$data->views}} lượt xem</span>
            @endif
        </div>
    </div>
</div>
