@extends('admin.layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/plugins/date-picker/spectrum.css')}}" rel="stylesheet"/>



    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet"/>

    <link href="{{ URL::asset('assets/plugins/jquery-fileupload/css/jquery.fileupload.css')}}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/plugins/jquery-fileupload/css/jquery.fileupload-ui.css')}}" rel="stylesheet"/>



    <link href="{{ URL::asset('assets/plugins/multipleselect/multiple-select.css')}}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/plugins/time-picker/jquery.timepicker.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
    <!-- PAGE-HEADER -->
    <div>
        <h1 class="page-title">Thêm mới Sản phẩm</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
        </ol>
    </div>
    <!-- PAGE-HEADER END -->
@endsection
@section('content')
    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header ">
                        <div class="text-right col-md-12">
                            <button class="btn btn-primary" type="submit">Lưu</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label class="form-label">Tiêu đề</label>
                                        <input type="text" class="form-control" name="name" value="{{old("name")}}"
                                               placeholder="Nhập tiêu đề">
                                        @error('name')
                                        <div class="alert alert-warning" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Mã</label>
                                        <input type="text" class="form-control" name="code"  value="{{old("code")}}"
                                               placeholder="Mã">
                                        @error('code')
                                        <div class="alert alert-warning" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Link video</label>
                                        <input type="text" class="form-control" name="link_video" value="{{old("link_video")??""}}"
                                               placeholder="Link video">
                                        @error('link_video')
                                        <div class="alert alert-warning" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Giá cũ</label>
                                        <input type="text" class="form-control" name="price_old" value="{{old("price_old")??0}}"
                                               placeholder="Giá cũ">
                                        @error('price_old')
                                        <div class="alert alert-warning" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Giá bán</label>
                                        <input type="text" class="form-control" name="price" value="{{old("price")??0}}"
                                               placeholder="Giá bán">
                                        @error('price')
                                        <div class="alert alert-warning" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>

{{--                                    <div class="form-group">--}}
{{--                                        <label class="form-label">Số năm sử dụng</label>--}}
{{--                                        <input type="text" class="form-control" name="used" value="{{old("used")??0}}"--}}
{{--                                               placeholder="Số năm sử dụng">--}}
{{--                                        @error('used')--}}
{{--                                        <div class="alert alert-warning" role="alert">--}}
{{--                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ $message }}--}}
{{--                                        </div>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label class="form-label">Số KM đã đi</label>--}}
{{--                                        <input type="text" class="form-control" name="kilometer" value="{{old("kilometer")??0}}"--}}
{{--                                               placeholder="Số KM đã đi">--}}
{{--                                        @error('kilometer')--}}
{{--                                        <div class="alert alert-warning" role="alert">--}}
{{--                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ $message }}--}}
{{--                                        </div>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label class="form-label">Tình trạng xe</label>--}}
{{--                                        <select class="form-control select2" name="condition">--}}
{{--                                            <option value=1>Xe cũ</option>--}}
{{--                                            <option value=2>Xe mới</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}

{{--                                    <div class="form-group">--}}
{{--                                        <label class="form-label">Màu chủ đạo</label>--}}
{{--                                        <input type="text" class="form-control" name="color" value="{{old("color")}}"--}}
{{--                                               placeholder="Màu chủ đạo">--}}
{{--                                    </div>--}}

                                    <div class="form-group">
                                        <label class="form-label">Mô tả</label>
                                    <textarea class="form-control" name="description" rows="3"
                                              placeholder="Mô tả ngắn">{{old("description")}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nội dung</label>
                                    <textarea class="form-control" id="content" name="content" rows="10">{!! old("content") !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Trạng thái</label>
                                        <select class="form-control select2" name="status">
                                            <option value=1>Hoạt động</option>
                                            <option value=0>Tạm dừng</option>
                                        </select>
                                    </div>

                                    {{-- <div class="form-group">
                                        <label class="form-label">Tình trạng xe</label>
                                        <select class="form-control select2" name="condition">
                                            <option value=2>Mới</option>
                                            <option value=1>Cũ</option>
                                        </select>
                                    </div> --}}

                                    <div class="form-group">
                                        <label class="form-label">Ảnh đại diện</label>
                                        <input type="file" name="image" class="dropify"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Ảnh mô tả</label>
                                        <input type="file" name="images[]" class="dropify_images" multiple/>
                                    </div>
                                    @if(isset($brands))
                                        <div class="form-group">
                                            <label class="form-label">Thương hiệu</label>
                                            <select class="form-control select2" name="brand_id">
                                                @foreach($brands as $brand)
                                                    <option value={{$brand->id}}>{{$brand->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    @if(isset($categories))
                                        <div class="form-group form-elements m-0">
                                            <label class="form-label">Chuyên mục</label>
                                            <div class="custom-controls-stacked">
                                                @foreach($categories as $category)
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                               name="categories_id[]" value="{{$category->id}}">
                                                        <span class="custom-control-label">{{$category->name}}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- TABLE WRAPPER -->
            </div>
            <!-- SECTION WRAPPER -->
        </div>
    </div>
    <!-- ROW-1 CLOSED -->

    </div>
    </div>
    <!-- CONTAINER CLOSED -->
    </div>
@endsection
@section('js')
    <script src="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/moment.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/date-picker/spectrum.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/date-picker/jquery-ui.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>

    <script src="{{ URL::asset('assets/plugins/input-mask/jquery.maskedinput.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/multipleselect/multiple-select.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/multipleselect/multi-select.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/time-picker/jquery.timepicker.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/time-picker/toggles.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('content', {
            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
        });
        $(document).ready(function() {
            $('.dropify_images').dropify();
        });
    </script>

    @include('ckfinder::setup')
@endsection
