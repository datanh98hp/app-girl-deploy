@extends('layouts.layouts')

@section('content')
    <style>
        .pagination{
            flex-wrap: wrap;
        }
    </style>
    <div class="container pt-100">
        <div class="row">
            @if(!empty($brands))
                @foreach($brands as $j => $brand)
                    <div class="col-lg-4 col-sm-6 col-6 mb-30">
                        <div class="client-logso text-center">
                            <div class="client-logo-img">
                                <a href="{{route('product.brand',['id' => $brand->id])}}">
                                    <img style="height: 80px; object-fit: cover;" src="{{Storage::url($brand->image)}}">
                                </a>
                            </div>
                            <p>{{$brand->name}}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
