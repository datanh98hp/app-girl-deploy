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
        <h1 class="page-title">Chỉnh sửa sản phẩm</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Sản phẩm</a></li>
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
                <form action="{{route('admin.product.update',$product->id)}}" method="post"
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
                                        <input type="text" class="form-control" name="name" value="{{$product->name}}"
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
                                        <input type="text" class="form-control" name="code" value="{{$product->code}}"
                                               placeholder="Mã">
                                        @error('code')
                                        <div class="alert alert-warning" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                ×
                                            </button>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Link video</label>
                                        <input type="text" class="form-control" name="link_video"
                                               value="{{$product->link_video}}"
                                               placeholder="Link video">
                                        @error('link_video')
                                        <div class="alert alert-warning" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                ×
                                            </button>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Giá cũ</label>
                                        <input type="text" class="form-control" name="price_old"
                                               value="{{$product->price_old}}"
                                               placeholder="Giá cũ">
                                        @error('price_old')
                                        <div class="alert alert-warning" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                ×
                                            </button>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Giá bán</label>
                                        <input type="text" class="form-control" name="price" value="{{$product->price}}"
                                               placeholder="Giá bán">
                                        @error('price')
                                        <div class="alert alert-warning" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                ×
                                            </button>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <label class="form-label">Số năm sử dụng</label>--}}
                                    {{--                                        <input type="text" class="form-control" name="used" value="{{$product->used}}"--}}
                                    {{--                                               placeholder="Số năm sử dụng">--}}
                                    {{--                                        @error('used')--}}
                                    {{--                                        <div class="alert alert-warning" role="alert">--}}
                                    {{--                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ $message }}--}}
                                    {{--                                        </div>--}}
                                    {{--                                        @enderror--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <label class="form-label">Số KM đã đi</label>--}}
                                    {{--                                        <input type="text" class="form-control" name="kilometer"--}}
                                    {{--                                               value="{{$product->kilometer}}"--}}
                                    {{--                                               placeholder="Số KM đã đi">--}}
                                    {{--                                        @error('kilometer')--}}
                                    {{--                                        <div class="alert alert-warning" role="alert">--}}
                                    {{--                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ $message }}--}}
                                    {{--                                        </div>--}}
                                    {{--                                        @enderror--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <label class="form-label">Kiểu xe</label>--}}
                                    {{--                                        <select class="form-control select2" name="type">--}}
                                    {{--                                            <option value=1 {{$product->type==1?'selected':''}}>Xe ga</option>--}}
                                    {{--                                            <option value=2 {{$product->type==2?'selected':''}}>Xe số</option>--}}
                                    {{--                                            <option value=3 {{$product->type==3?'selected':''}}>Oto</option>--}}
                                    {{--                                        </select>--}}
                                    {{--                                    </div>--}}

                                    <div class="form-group">
                                        <label class="form-label">Mô tả</label>
                                        <textarea class="form-control" name="description" rows="3"
                                                  placeholder="Mô tả ngắn">{{$product->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nội dung</label>
                                        <textarea class="form-control" id="content" name="content"
                                                  rows="10">{{$product->content}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Trạng thái</label>
                                        <select class="form-control select2" name="status">
                                            <option value=1 {{$product->status==1?'selected':''}}>Hoạt động</option>
                                            <option value=0 {{$product->status==0?'selected':''}}>Tạm dừng</option>
                                        </select>
                                    </div>

                                    {{-- <div class="form-group">
                                        <label class="form-label">Tình trạng xe</label>
                                        <select class="form-control select2" name="condition">
                                            <option value=2 {{$product->condition==2?'selected':''}}>Mới</option>
                                            <option value=1 {{$product->condition==1?'selected':''}}>Cũ</option>
                                        </select>
                                    </div> --}}
                                    <div class="form-group">
                                        <label class="form-label">Ảnh đại diện</label>
                                        <input type="file" name="image" class="dropify"
                                               data-default-file="{{\Illuminate\Support\Facades\Storage::url($product->image)}}"/>
                                    </div>


                                    <div class="form-group col-12">
                                        <label for="">Ảnh mô tả</label><br>
                                        <input id="upload_images" type="file" name="images"
                                               multiple>
                                        <button type="button" class="mt-2 btn btn-success"
                                                onclick="$('#upload_images').next().find('.ff_fileupload_actions button.ff_fileupload_start_upload').click(); return false;">
                                            Upload all files
                                        </button>
                                        @if(isset($images) && count($images)>0)
                                            <div class="ff_fileupload_wrap">
                                                <table class="ff_fileupload_uploads">
                                                    <tbody>
                                                    @foreach($images as $img)
                                                        <tr class="item-file-preview">
                                                            <td class="ff_fileupload_preview">
                                                                <button
                                                                    class="ff_fileupload_preview_image ff_fileupload_preview_image_has_preview"
                                                                    type="button"
                                                                    aria-label="Preview"
                                                                    style="background-image: url({{\Storage::url($img)}});">
                                                                                            <span
                                                                                                class="ff_fileupload_preview_text"></span>
                                                                </button>
                                                                <div
                                                                    class="ff_fileupload_actions_mobile">
                                                                    <button
                                                                        class="ff_fileupload_remove_file"
                                                                        type="button"
                                                                        aria-label="Remove from list"></button>
                                                                </div>
                                                            </td>
                                                            {{--                                                            <td class="ff_fileupload_summary">--}}
                                                            {{--                                                                <div--}}
                                                            {{--                                                                    class="ff_fileupload_filename">--}}
                                                            {{--                                                                    {{str_replace('/storage/products/','',$img)}}--}}
                                                            {{--                                                                </div>--}}
                                                            {{--                                                            </td>--}}
                                                            <td class="ff_fileupload_actions ">
                                                                <button
                                                                    class="ff_fileupload_remove_file remove_fileupload_cars"
                                                                    type="button"
                                                                    data-url_image="{{\Illuminate\Support\Facades\Storage::url($img)}}"
                                                                    aria-label="Remove from list"></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif
                                    </div>


                                    @if(isset($brands))
                                        <div class="form-group">
                                            <label class="form-label">Thương hiệu</label>
                                            <select class="form-control select2" name="brand_id">
                                                @foreach($brands as $brand)
                                                    <option
                                                        {{$brand->id==$product->brand_id?'selected':''}} value={{$brand->id}} >{{$brand->name}}</option>
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
    <script>
        $(".remove_fileupload_cars").click(function () {
            let url_image = $(this).data('url_image');
            let item = $(this);
            $.ajax({
                url: "{{route('admin.product.deleteFile')}}",
                method: 'post',
                data: {
                    _token: "{{csrf_token()}}",
                    product_id: {{$product->id??''}},
                    url_image: url_image
                },
                success: function () {
                    item.parents(".item-file-preview").remove();
                }
            })
        });
        $('#upload_images').FancyFileUpload({
            url: "{{route("admin.product.uploadFile")}}",
            params: {
                action: 'fileuploader',
                _token: "{{csrf_token()}}",
                product_id: {{$product->id??''}},
                method: 'post',
            }
        });
    </script>
    @include('ckfinder::setup')
@endsection
