@extends('admin.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ca làm việc</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tổ chức</a></li>
                        <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
                        <li class="breadcrumb-item active">Ca làm việc</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-success" data-toggle="modal" data-target="#form" type="button"><i
                                        class="fa fa-plus mr-1"></i> Thêm mới </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table id="myTable" class="stripe cell-border hover">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Mã ca</th>
                                                <th>Tên ca</th>
                                                <th>Giờ đến</th>
                                                <th>Giờ về</th>
                                                <th>Số phút làm việc tiêu chuẩn</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($titles as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->identity }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->start }}</td>
                                                    <td>{{ $item->end }}</td>
                                                    <td>{{ $item->minutes }}</td>
                                                    <td>
                                                        <button class="btn btn-primary mr-3 update_modal"
                                                            data-toggle="modal" data-id="{{ $item }}"
                                                            data-target="#modal-lg" style="margin-right: 10px;"><i
                                                                class="bx bx-pencil"></i></button>
                                                        <button class="btn btn-danger deleteConfirm"
                                                            value="{{ $item->id }}" type="button">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade" id="deleteDepartment" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="deleteCategory" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form action="{{ route('organization.categories.calamviec.xoa') }}" method="POST">
                        @csrf
                        <input type="text" name="id" value="" id="id" hidden>
                        <div class="modal-header">
                            <h5 class="modal-title">Xóa ca làm việc</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Bạn có muốn xóa ca làm việc này <span id="modal-category_name"></span>?
                            <input type="hidden" id="category" name="category_id">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-white" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-danger" id="modal-confirm_delete">Xóa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0 bg-light">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm mới phòng ban</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('organization.categories.calamviec.themmoi') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <h4>Thông tin chung</h4>
                            <div class="form-group">
                                <label for="email1">Tên ca</label>
                                <input type="text" class="form-control" id="email1" aria-describedby="emailHelp"
                                    name="name" placeholder="Tên ca">
                                @if ($errors->has('name'))
                                    <div class='text-danger'>
                                        * {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email1">Mã ca</label>
                                <input type="text" class="form-control" id="email1" aria-describedby="emailHelp"
                                    name="identity" placeholder="Mã ca">
                                @if ($errors->has('identity'))
                                    <div class='text-danger'>
                                        * {{ $errors->first('identity') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email1">Số phút làm việc tiêu chuẩn</label>
                                <input type="number" class="form-control" id="email1" aria-describedby="emailHelp"
                                    name="minutes" placeholder="Số phút làm việc" max="480">
                                @if ($errors->has('minutes'))
                                    <div class='text-danger'>
                                        * {{ $errors->first('minutes') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email1">Giờ đến</label>
                                <input id="timepicker_start" class="form-control" name="start" />
                            </div>
                            <div class="form-group">
                                <label for="email1">Giờ về</label>
                                <input id="timepicker_end" class="form-control" name="end" />
                            </div>
                        </div>
                        <div class="modal-footer border-top-0 d-flex bg-light justify-content-end">
                            <div>
                                <button class="btn btn-danger" type="button" data-dismiss="modal"><i
                                        class="fa fa-close mr-1"></i> Đóng </button>
                                <button class="btn btn-success" type="submit"><i class="fa fa-check mr-1"></i> Lưu thông
                                    tin </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal_update" id="modal-lg" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa ca làm việc</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="updateModal"
                        action="{{ route('organization.categories.calamviec.chinhsua') }}">
                        @csrf
                        <div class="modal-body">
                            <h4>Thông tin chung</h4>
                            <div class="form-group">
                                <input type="text" hidden id="old_identity" name="old_identity">
                                <label for="email1">Tên ca</label>
                                <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                                    name="name" placeholder="Tên ca">

                            </div>
                            <div class="form-group">
                                <label for="email1">Mã ca</label>
                                <input type="text" class="form-control" id="identity" aria-describedby="emailHelp"
                                    name="identity" placeholder="Mã ca">

                            </div>
                            <div class="form-group">
                                <label for="email1">Số phút làm việc tiêu chuẩn</label>
                                <input type="number" class="form-control" id="minutes" aria-describedby="emailHelp"
                                    name="minutes" placeholder="Số phút làm việc" max="480">

                            </div>
                            <div class="form-group">
                                <label for="email1">Giờ đến</label>
                                <input id="timepicker_start_update" class="form-control" name="start" id="start"/>
                            </div>
                            <div class="form-group">
                                <label for="email1">Giờ về</label>
                                <input id="timepicker_end_update" class="form-control" name="end" id="end" />
                            </div>
                        </div>
                        <div class="modal-footer border-top-0 d-flex bg-light justify-content-end">
                            <div>
                                <button class="btn btn-danger" type="button" data-dismiss="modal"><i
                                        class="fa fa-close mr-1"></i> Đóng </button>
                                <button class="btn btn-success" type="submit"><i class="fa fa-check mr-1"></i> Lưu thông
                                    tin </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "language": {
                    "lengthMenu": "Hiện _MENU_ bản ghi trên trang",
                    "zeroRecords": "Không có bản ghi nào",
                    "info": "Hiện trang _PAGE_ trong tổng số _PAGES_ trang",
                    "infoEmpty": "Không có bản ghi nào",
                    "infoFiltered": "(lọc từ _MAX_ bản ghi)"
                }
            });
            $(document).ready(function() {
                $('#form').modal({
                    'show': {{ count($errors) > 0 ? 'true' : 'false' }}
                });
            });
            $('#timepicker_start').timepicker({
                timeFormat: 'HH:mm',
                showMeridian: false,
                zindex: 9999999
            });
            $('#timepicker_end').timepicker({
                timeFormat: 'HH:mm',
                showMeridian: false,
                zindex: 9999999
            });
            $('#timepicker_start_update').timepicker({
                timeFormat: 'HH:mm',
                showMeridian: false,
                zindex: 9999999
            });
            $('#timepicker_end_update').timepicker({
                timeFormat: 'HH:mm',
                showMeridian: false,
                zindex: 9999999
            });
            $('.deleteConfirm').click(function(e) {
                e.preventDefault();
                var id = $(this).val();
                $('#id').val(id);
                $('#deleteDepartment').modal('show');
            });
            $('.update_modal').click(function(e) {
                e.preventDefault();

                var item = $(this).data('id');
                $('#old_identity').val(item.identity)
                $('#name').val(item.name);
                $('#identity').val(item.identity)
                $('#minutes').val(item.minutes)
                $('#start').val(item.start)
                $('#end').val(item.end)
            });
        });
    </script>
@endsection
