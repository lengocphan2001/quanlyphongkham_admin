@extends('admin.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Vị trí công việc</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tổ chức</a></li>
                        <li class="breadcrumb-item active">Vị trí công việc</li>
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
                                                <th>Mã vị trí</th>
                                                <th>Tên vị trí</th>
                                                <th>Phòng ban</th>
                                                <th>Quản lý trực tiếp</th>
                                                <th>Chức danh</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($positions as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->identity }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->department }}</td>
                                                    <td>{{ $item->manager }}</td>
                                                    <td>{{ $item->title }}</td>

                                                    <td>
                                                        <a href="{{ route('organization.positions.edit', ['position' => $item ])}}" class="btn btn-primary mr-3"
                                                            style="margin-right: 10px;"><i class="bx bx-pencil"></i></a>
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
                    <form action="{{ route('organization.positions.destroy') }}" method="POST">
                        @csrf
                        <input type="text" name="id" value="" id="id" hidden>
                        <div class="modal-header">
                            <h5 class="modal-title">Xóa vị trí công việc</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Bạn có muốn xóa vị trí này <span id="modal-category_name"></span>?
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
                        <h5 class="modal-title" id="exampleModalLabel">Thêm mới vị trí công việc</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('organization.positions.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <h4>Thông tin chung</h4>
                            <div class="form-group">
                                <label for="email1">Tên vị trí công việc</label>
                                <input type="text" class="form-control" id="email1" aria-describedby="emailHelp"
                                    name="name" placeholder="Tên vị trí">
                                @if ($errors->has('name'))
                                    <div class='text-danger'>
                                        * {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email1">Mã vị trí công việc</label>
                                <input type="text" class="form-control" id="email1" aria-describedby="emailHelp"
                                    name="identity" placeholder="Mã vị trí">
                                @if ($errors->has('identity'))
                                    <div class='text-danger'>
                                        * {{ $errors->first('identity') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Quản lý</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="manager">
                                    <option value="Chưa có">Chưa có</option>
                                    @foreach ($managers as $item)
                                        <option value="{{ $item->fullname }}">{{ $item->fullname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Chức danh</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="title">
                                    <option value="Chưa có">Chưa có</option>
                                    @foreach ($titles as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Phòng ban</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="department">
                                    <option value="Chưa có">Chưa có</option>
                                    @foreach ($departments as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            jQuery.noConflict();
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

            $('.deleteConfirm').click(function(e) {
                e.preventDefault();
                var id = $(this).val();
                $('#id').val(id);
                $('#deleteDepartment').modal('show');
            });
        });
    </script>
@endsection
