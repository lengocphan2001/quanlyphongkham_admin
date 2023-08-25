@php
    use App\Models\Department;
    use App\Models\Employee;
@endphp
@extends('admin.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Phòng ban</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tổ chức</a></li>
                        <li class="breadcrumb-item active">Phòng ban</li>
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
                                        class="fa fa-plus mr-1"></i> Thêm mới phòng ban </button>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="defaultInline1">
                                    <label class="custom-control-label" for="defaultInline1">Hiển thị danh sách phòng ban đã
                                        xóa/giải thể</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <table id="myTable" class="stripe cell-border hover">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Mã phòng ban</th>
                                                <th>Tên phòng ban</th>
                                                <th>Cấp phòng ban</th>
                                                <th>Quản lý</th>
                                                <th>Trạng thái</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($departments as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>PB{{ $item->id }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->parent_id == 0 ? 'Phòng ban cha' : Department::where('id', $item->parent_id)->first()->name }}
                                                    </td>
                                                    <td>{{ Employee::where('id', $item->manager_id)->first()->fullname ?? 'Chưa có' }}</td>
                                                    <td>
                                                        @if ($item->status == 0)
                                                            <span class="badge badge-pill badge-danger">Đã xóa/giải
                                                                thể</span>
                                                        @else
                                                            <span class="badge badge-pill badge-success">Hoạt động</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('organization.departments.edit', ['department' => $item]) }}"
                                                            class="btn btn-primary mr-3" style="margin-right: 10px;"><i
                                                                class="bx bx-pencil"></i></a>
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
                    <form action="{{ route('organization.departments.destroy') }}" method="POST">
                        @csrf
                        <input type="text" name="id" value="" id="id" hidden>
                        <div class="modal-header">
                            <h5 class="modal-title">Xóa phòng ban</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Bạn có muốn xóa phòng ban này <span id="modal-category_name"></span>?
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
                    <form action="{{ route('organization.departments.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="password1">Tên phòng ban</label>
                                <input type="text" class="form-control" id="password1" placeholder="Tên phòng ban"
                                    name="name">
                                @if ($errors->has('name'))
                                    <div class='text-danger'>
                                        * {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password1">Mã phòng ban</label>
                                <input type="text" class="form-control" id="password1" placeholder="Mã phòng ban"
                                    name="identity">
                                @if ($errors->has('identity'))
                                    <div class='text-danger'>
                                        * {{ $errors->first('identity') }}
                                    </div>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="email1">Phòng ban cha</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="parent_id">
                                    <option value="0">Phòng ban cha</option>
                                    @foreach ($departments as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="password1">Quản lý</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="manager_id">
                                    @foreach ($managers as $item)
                                        <option value="{{ $item->id }}">{{ $item->fullname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer border-top-0 d-flex bg-light justify-content-between">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="defaultInline2" name="isDelete">
                                <label class="custom-control-label" for="defaultInline2">Đã
                                    xóa/giải thể</label>
                            </div>
                            <div>
                                <button class="btn btn-danger" data-dismiss="modal" type="button"><i
                                        class="fa fa-close mr-1"></i> Đóng </button>
                                <button class="btn btn-success delete" type="submit"><i class="fa fa-check mr-1"></i>
                                    Lưu thông
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
