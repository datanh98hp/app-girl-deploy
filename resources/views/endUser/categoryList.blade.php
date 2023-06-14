@extends('layouts.layouts')

@section('content')
    <style>
        .pagination{
            flex-wrap: wrap;
        }
    </style>
    <div class="container h-100 pt-100">
        <div class="row">
            <div class="col-12">
                <ul class="category-list mt-20 row">
                    @if(!empty($categories))
                        @foreach($categories as $k => $v)
                            @include('endUser.components.modal',['idName' => str_slug($v->name),'name' => $v->name,'brands'=> $v->brands ])
                            <li class="col-4 col-lg-2 col-sm-3 text-center">
                                <div class="item__box" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#{{str_slug($v->name)}}">
                                    <img src="{{Storage::url($v->image)}}" width="48" alt="">
                                </div>
                                <p >{{$v->name}}</p>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
