@extends('admin.layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- PAGE-HEADER -->
    <div>
        <h1 class="page-title">Danh sách banner</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách banner</li>
        </ol>
    </div>
    <!-- PAGE-HEADER END -->
@endsection
@section('content')
    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header ">
                    <div class="text-right col-md-12">
                        <a href="{{route('admin.banner.create')}}" class="btn btn-primary">Thêm mới</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="category-table" class="table table-striped table-bordered text-nowrap w-100">
                            <thead>
                            <tr>
                                <th class="wd-15p">ID</th>
                                <th class="wd-15p">Ảnh</th>
                                <th class="wd-15p">Tiêu đề</th>
                                <th class="wd-15p">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
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
    <script src="{{ URL::asset('assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/sweet-alert.js') }}"></script>
    <script src="{{ URL::asset('assets/js/popover.js') }}"></script>
    <script>
        $(function() {
            $('#category-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.banner.data') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'image', name: 'image' },
                    { data: 'action', name: 'action' },
                ]
            });
        });
    </script>
@endsection
