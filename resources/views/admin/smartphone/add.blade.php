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
        <h1 class="page-title">Thêm mới Điện thoại</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.smartphone.index')}}">Điện thoại</a></li>
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
                <form action="{{route('admin.smartphone.store')}}" method="post" enctype="multipart/form-data">
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
                                        <input type="text" class="form-control" name="name"
                                               placeholder="Nhập tiêu đề">
                                        @error('name')
                                        <div class="alert alert-warning" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Mã</label>
                                        <input type="text" class="form-control" name="code"
                                               placeholder="Mã">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Năm sản xuất</label>
                                        <input type="text" class="form-control" name="year"
                                               placeholder="Năm sản xuất">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Giá cũ</label>
                                        <input type="text" class="form-control" name="price_old" value="0"
                                               placeholder="Giá cũ">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Giá bán</label>
                                        <input type="text" class="form-control" name="price" value="0"
                                               placeholder="Giá bán">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Mô tả</label>
                                    <textarea class="form-control" name="description" rows="3"
                                              placeholder="Mô tả ngắn"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nội dung</label>
                                    <textarea class="form-control" id="content" name="content" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Trạng thái</label>
                                        <select class="form-control select2" name="status">
                                            <option value=1>Publish</option>
                                            <option value=0>Disable</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Ảnh đại diện</label>
                                        <input type="file" name="image" class="dropify"/>
                                    </div>
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
    </script>
    @include('ckfinder::setup')
@endsection
