@php
    use App\Models\Department;
    use App\Models\Title;
    use App\Models\Position;
    use App\Models\ContractType;
@endphp
@extends('admin.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Danh sách nhân viên</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Nhân viên</a></li>
                        <li class="breadcrumb-item active">Danh sách</li>
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
                                <a class="btn btn-success" href="{{ route('employees.create') }}"><i
                                        class="fa fa-plus mr-1"></i>Thêm mới</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table id="myTable" class="stripe cell-border hover">
                                        <thead>
                                            <tr>
                                                <th>Mã nhân viên</th>
                                                <th>Họ và tên</th>
                                                <th>Địa chỉ thường trú</th>
                                                <th>Số điện thoại</th>
                                                <th>Phòng ban</th>
                                                <th>Trạng thái</th>
                                                <th>Chức danh</th>
                                                <th>Vị trí làm việc</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($employees as $item)
                                                <tr>
                                                    <td>{{ $item->identity }}</td>
                                                    <td>{{ $item->fullname }}</td>
                                                    <td>{{ $item->current_address }}</td>
                                                    <td>{{ $item->phone }}</td>
                                                    <td>{{ Department::where('identity', $item->department)->first()->name ?? 'Chưa có' }}</td>
                                                    <td>{{ $item->working_status }}</td>
                                                    <td>{{ Title::where('identity', $item->title)->first()->name ?? 'Chưa có' }}</td>
                                                    <td>{{ Position::where('identity', $item->positio)->first()->name ?? 'Chưa có' }}</td>

                                                    <td>
                                                        <a href="{{ route('employees.show', ['employee' => $item]) }}"
                                                            class="btn btn-primary mr-3" style="margin-right: 10px;"><i
                                                                class="bx bx-pencil"></i></a>
                                                        <a href="javascript:void(0)" class="btn btn-danger delete">
                                                            <i class="bx bx-trash"></i>
                                                        </a>
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
                    <form>

                        <div class="modal-body">
                            <h4>Thông tin chung</h4>
                            <div class="form-group">
                                <label for="email1">Tên ca</label>
                                <input type="email" class="form-control" id="email1" aria-describedby="emailHelp"
                                    placeholder="Tên ca">
                            </div>
                            <div class="form-group">
                                <label for="email1">Mã ca</label>
                                <input type="email" class="form-control" id="email1" aria-describedby="emailHelp"
                                    placeholder="Mã ca">
                            </div>
                            <div class="form-group">
                                <label for="email1">Số phút làm việc tiêu chuẩn</label>
                                <input type="email" class="form-control" id="email1" aria-describedby="emailHelp"
                                    placeholder="Số phút làm việc">
                            </div>
                            <div class="form-group">
                                <label for="email1">Giờ đến</label>
                                <input id="timepicker_start" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="email1">Giờ về</label>
                                <input id="timepicker_end" class="form-control" />
                            </div>
                        </div>
                        <div class="modal-footer border-top-0 d-flex bg-light justify-content-end">
                            <div>
                                <button class="btn btn-danger"><i class="fa fa-close mr-1"></i> Đóng </button>
                                <button class="btn btn-success"><i class="fa fa-check mr-1"></i> Lưu thông tin </button>
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
                language: {
                    "lengthMenu": "Hiện _MENU_ bản ghi trên trang",
                    "zeroRecords": "Không có bản ghi nào",
                    "info": "Hiện trang _PAGE_ trong tổng số _PAGES_ trang",
                    "infoEmpty": "Không có bản ghi nào",
                    "infoFiltered": "(lọc từ _MAX_ bản ghi)",

                },
                responsive: {
                    details: {
                        type: 'column',
                        target: -1
                    }
                }
            });
            $('#timepicker_start').timepicker({
                zindex: 9999999
            });
            $('#timepicker_end').timepicker({
                zindex: 9999999
            });
        });
    </script>
@endsection
