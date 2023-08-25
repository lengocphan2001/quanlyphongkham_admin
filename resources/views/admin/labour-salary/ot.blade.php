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
                    <h1 class="m-0">Danh sách nghỉ phép</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Công - Lương</a></li>
                        <li class="breadcrumb-item active">Danh sách nghỉ phép</li>
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
                            <div class="d-flex" style="gap: 20xp">
                                <input type="date" class="mr-2">
                                <input type="date" class="mr-2">
                                <select class="mr-2 w-25" id="exampleFormControlSelect1">
                                    <option value="0">Trạng thái : Đã duyệt</option>
                                    <option value="1">Trạng thái : Chưa duyệt</option>
                                </select>
                                <select class="mr-2 w-25" id="exampleFormControlSelect1">
                                    <option value="0">Chọn nhân viên</option>
                                    <option value="1">CEO Office</option>
                                </select>
                                <button class="btn btn-success mr-2" type="button"><i class="fa fa-search"></i> Tìm kiếm
                                </button>
                                <button class="btn btn-success" data-toggle="modal" data-target="#form" type="button"><i
                                        class="fa fa-plus"></i></button>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table id="myTable" class="stripe cell-border hover">
                                        <thead>
                                            <tr>
                                                <th>Họ và tên</th>
                                                <th>Trạng thái</th>
                                                <th>Phòng ban</th>
                                                <th>Ngày lập</th>
                                                <th>Ngày đăng ký</th>
                                                <th>Giờ bắt đầu</th>
                                                <th>Giờ kết thúc</th>
                                                <th>Tổng số giờ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ots as $item)
                                                @php
                                                    $employee = Employee::where('identity', $item->employee_id)->first();
                                                @endphp
                                                <tr>
                                                    <td>{{ $employee->fullname ?? 'Chưa có' }}</td>
                                                    <td>
                                                        @if ($item->status == 1)
                                                            <span class="badge badge-success">Đã duyệt</span>
                                                        @else
                                                            <span class="badge badge-danger">Chưa duyệt</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $employee->department ? Department::where('identity', $employee->department)->first()->name ?? 'Chưa có' : 'Chưa có' }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>{{ $item->date }}</td>
                                                    <td>{{ $item->start }}</td>
                                                    <td>{{ $item->end }}</td>
                                                    <td>{{ $item->total }}</td>
                                                </tr>
                                            @endforeach
                                            {{-- @foreach ($departments as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>PB{{ $item->id }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->parent_id == 0 ? 'Phòng ban cha' : Department::where('id', $item->parent_id)->first()->name }}
                                                    </td>
                                                    <td>{{ $item->manager_id }}</td>
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
                                            @endforeach --}}

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0 bg-light">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm mới phép nghỉ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('organization.departments.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="password1">Mã nhân viên</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="manager_id">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="email1">Phòng ban</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="parent_id">
                                    <option value="0">Phòng ban cha</option>
                                    {{-- @foreach ($departments as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="password1">Hình thức nghỉ</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="manager_id">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="password1">Ngày bắt đầu</label>
                                <input type="datetime-local" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password1">Ngày kết thúc</label>
                                <input type="datetime-local" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer border-top-0 d-flex bg-light justify-content-end">
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
