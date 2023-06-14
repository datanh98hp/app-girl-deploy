@extends('admin.layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/plugins/date-picker/spectrum.css')}}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/plugins/multipleselect/multiple-select.css')}}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/plugins/time-picker/jquery.timepicker.css')}}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/plugins/fancy-file-uploader/fancy_fileupload.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
    <!-- PAGE-HEADER -->
    <div>
        <h1 class="page-title">Chỉnh sửa sim</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.locate.index')}}">sim</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa</li>
        </ol>
    </div>
    <!-- PAGE-HEADER END -->
@endsection
@section('content')
    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <form action="{{route('admin.locate.update',$locate->id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
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
                                        <input type="text" class="form-control" name="name" value="{{$locate->name}}"
                                               placeholder="Nhập tiêu đề">
                                        @error('name')
                                        <div class="alert alert-warning" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                ×
                                            </button>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Mã</label>
                                        <input type="text" class="form-control" name="code" value="{{$locate->code}}"
                                               placeholder="Mã">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Năm sản xuất</label>
                                        <input type="text" class="form-control" name="year" value="{{$locate->year}}"
                                               placeholder="Năm sản xuất">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Giá cũ</label>
                                        <input type="text" class="form-control" name="price_old"
                                               value="{{$locate->price_old}}"
                                               placeholder="Giá cũ">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Giá bán</label>
                                        <input type="text" class="form-control" name="price" value="{{$locate->price}}"
                                               placeholder="Giá bán">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Mô tả</label>
                                        <textarea class="form-control" name="description" rows="3"
                                                  placeholder="Mô tả ngắn">{{$locate->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nội dung</label>
                                        <textarea class="form-control" id="content" name="content"
                                                  rows="10">{{$locate->content}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Trạng thái</label>
                                        <select class="form-control select2" name="status">
                                            <option value=1 {{$locate->status==1?'selected':''}}>Publish</option>
                                            <option value=0 {{$locate->status==0?'selected':''}}>Disable</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Ảnh đại diện</label>
                                        <input type="file" name="image" class="dropify"
                                               data-default-file="{{$locate->image}}"/>
                                    </div>

                                    @if(isset($categories))
                                        <div class="form-group form-elements m-0">
                                            <label class="form-label">Chuyên mục</label>
                                            <div class="custom-controls-stacked">
                                                @foreach($categories as $category)
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                               {{in_array($category->id,$categories_id)?'checked':''}}
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

    <script src="{{ URL::asset('assets/plugins/input-mask/jquery.maskedinput.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/multipleselect/multiple-select.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/multipleselect/multi-select.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/time-picker/jquery.timepicker.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/time-picker/toggles.min.js') }}"></script>

    <script src="{{ URL::asset('assets/plugins/fancy-file-uploader/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancy-file-uploader/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancy-file-uploader/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js') }}"></script>




    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('content', {
            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
        });
    </script>
    @include('ckfinder::setup')
@endsection
