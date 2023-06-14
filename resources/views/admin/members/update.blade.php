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
        <h1 class="page-title">Chỉnh sửa khách hàng</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.member.index')}}">Khách hàng</a></li>
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
                <form action="{{route('admin.member.update',$member->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="card-header">
                        <div class="text-right col-md-12">
                            <button class="btn btn-primary" type="submit">Lưu</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label class="form-label">Tên khách hàng</label>
                                        <input type="text" class="form-control" name="name" value="{{$member->name}}"
                                               placeholder="Nhập tên khách hàng">
                                        @error('name')
                                        <div class="alert alert-warning" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Tên tài khoản</label>
                                        <input type="text" class="form-control" name="user_name" value="{{$member->user_name}}"
                                               placeholder="Nhập Tên tài khoản" required>
                                        @error('user_name')
                                        <div class="alert alert-warning" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email" value="{{$member->email}}"
                                               placeholder="Nhập email ">
                                        @error('email')
                                        <div class="alert alert-warning" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Số điện thoại</label>
                                        <input type="text" class="form-control" name="phone" value="{{$member->phone}}"
                                               placeholder="Nhập Số điện thoại">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Mô tả ngắn</label>
                                        <input type="text" class="form-control" name="description" value="{{$member->description}}"
                                               placeholder="Nhập mô tả ngắn">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Mật khẩu</label>
                                        <input type="text" class="form-control" name="address" value="{{$member->address}}"
                                               placeholder="Nhập địa chỉ">
                                        @error('password')
                                        <div class="alert alert-warning" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Trạng thái</label>
                                        <select class="form-control select2" name="status">
                                            <option value=1 {{$member->status==1?'selected':''}}>Hoạt động</option>
                                            <option value=0 {{$member->status==0?'selected':''}}>Tạm dừng</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Ảnh đại diện</label>
                                        <input type="file" name="avatar" data-default-file="{{$member->avatar}}"
                                               class="dropify"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Ảnh bìa</label>
                                        <input type="file" name="cover_image" data-default-file="{{$member->cover_image}}"
                                               class="dropify_cover_image"/>
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
    <script>
        $(document).ready(function() {
            $('.dropify_cover_image').dropify();
        });
    </script>
@endsection
