@extends('layouts.layouts')

@section('content')
    <style>
        .pagination{
            flex-wrap: wrap;
        }
    </style>
    <div class="container pt-100">
        <div class="row">
            @if(!empty($products))
                @foreach($products as $k => $v)
                    <div class="col-6 col-lg-4 col-sm-6">
                        @include('endUser.components.item',['data' => $v,'isBlog' => false,'id'=>$v->id])
                    </div>
                @endforeach
            @endif
        </div>
        <div class="row mb-50">
            <div class="col-12">
                {{$products->links()}}
            </div>
        </div>
    </div>
@endsection
