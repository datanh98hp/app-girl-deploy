@extends('admin.layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/plugins/date-picker/spectrum.css')}}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/plugins/multipleselect/multiple-select.css')}}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/plugins/time-picker/jquery.timepicker.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
    <!-- PAGE-HEADER -->
    <div>
        <h1 class="page-title">Thêm mới widget</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.widget.index')}}">Widget</a></li>
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
                <form action="{{route('admin.widget.store')}}" method="post" enctype="multipart/form-data">
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
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Link</label>
                                        <input type="text" class="form-control" name="link"
                                               placeholder="Link...">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Mô tả</label>
                                        <textarea class="form-control" name="description" rows="3"
                                                  placeholder="Mô tả ngắn"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nội dung</label>
                                        <textarea class="form-control" id="content" name="content" rows="10"
                                                  placeholder="Nội dung..."></textarea>
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
                                        <label class="form-label">Vị trí hiển thị</label>
                                        <select class="form-control select2" name="location">
                                            <option value='footer_1'>Footer 1</option>
                                            <option value='footer_2'>Footer 2</option>
                                            <option value='footer_3'>Footer 3</option>
                                            <option value='footer_4'>Footer 4</option>
                                            <option value='contact_1'>Khối contact 1</option>
                                            <option value='contact_2'>Khối contact 2</option>
                                            <option value='contact_3'>Khối contact 3</option>
                                        </select>
                                    </div>
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
