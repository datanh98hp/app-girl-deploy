@extends('layouts.layouts')

@section('content')
    <div class="container pt-100">
        <div class="row">
            @if(!empty($posts))
                @foreach($posts as $k => $v)
                    <div class="col-6 col-lg-3 col-sm-6">
                        @include('endUser.components.item',['data' => $v,'isBlog' => true,'id'=>$v->id])
                    </div>
                @endforeach
            @endif
        </div>
        <div class="row mb-50">
            <div class="col-12">
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection
