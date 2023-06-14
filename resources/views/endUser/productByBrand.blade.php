@extends('layouts.layouts')

@section('content')
    <div class="container pt-100">
        <div class="row">
            @if(!empty($products))
                @foreach($products as $k => $v)
                    <div class="col-6 col-lg-4 col-sm-6">
                        @include('endUser.components.item',['data' => $v,'isBlog' => false,'id'=>$v->id])
                    </div>
                @endforeach
                @else
               {{"Hiện tại chưa có sản phẩm nào !! "}}
            @endif
        </div>

    </div>
@endsection
