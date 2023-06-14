@extends('layouts.layouts')

@section('content')
    <div class="container pt-100">
        <div class="row">
            @if(!empty($products))
                @foreach($products as $k => $v)
                    <div class="col-xl-3 col-6 col-lg-4">
                        @include('endUser.components.item',['data' => $v,'isBlog' => false,'id'=>$v->id])
                    </div>
                @endforeach
            @else
                <p>Hiện tại chưa có sản phẩm nào !! </p>
            @endif
        </div>
      <div class="row">
          <div class="col-12">

          </div>
      </div>
    </div>
@endsection
