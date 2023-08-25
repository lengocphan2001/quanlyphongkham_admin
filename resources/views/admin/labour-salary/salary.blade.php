@php
    use App\Models\Department;
@endphp
@extends('admin.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Bảng lương</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Công - Lương</a></li>
                        <li class="breadcrumb-item active">Dữ liệu chấm công</li>
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
                                <form action="{{ route('labour-salary.view-salary') }}" class="form-inline" method="POST">
                                    @csrf
                                    <div class="form-group mr-4">
                                        <label for="email1" class="mr-1">Tháng</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="month">
                                            <option value="1">Tháng 1</option>
                                            <option value="2">Tháng 2</option>
                                            <option value="3">Tháng 3</option>
                                            <option value="4">Tháng 4</option>
                                            <option value="5">Tháng 5</option>
                                            <option value="6">Tháng 6</option>
                                            <option value="7">Tháng 7</option>
                                            <option value="8">Tháng 8</option>
                                            <option value="9">Tháng 9</option>
                                            <option value="10">Tháng 10</option>
                                            <option value="11">Tháng 11</option>
                                            <option value="12">Tháng 12</option>
                                        </select>
                                    </div>
                                    <div class="form-group mr-2">
                                        <label for="email1" class="mr-1">Năm</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="year">
                                            <option value="2020">Năm 2020</option>
                                            <option value="2021">Năm 2021</option>
                                            <option value="2022">Năm 2022</option>
                                            <option value="2023">Năm 2023</option>
                                            <option value="2024">Năm 2024</option>
                                            <option value="2025">Năm 2025</option>
                                        </select>
                                    </div>

                                    <div>
                                        <button class="btn btn-success" type="submit"><i class="fa fa-search"></i>Tính
                                            lương</button>
                                    </div>
                                </form>

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
                                                <th>Tháng</th>
                                                <th>Năm</th>
                                                <th>Tổng giờ OT</th>
                                                <th>Tổng công</th>
                                                <th>Lương cơ bản</th>
                                                <th>Lương theo tổng công</th>
                                                <th>Lương OT</th>
                                                <th>Lương thực nhận</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($salary_table))
                                                @foreach ($salary_table as $item)
                                                    <tr>
                                                        <td>{{ $item->employee_id }}</td>
                                                        <td>{{ $item->fullname }}</td>
                                                        <td>{{ $item->month }}</td>
                                                        <td>{{ $item->year }}</td>
                                                        <td>{{ $item->ot_labour }}</td>
                                                        <td>{{ $item->total_labour }}</td>
                                                        <td>{{ $item->salary }}đ</td>
                                                        <td>{{ $item->salary_by_work }}đ</td>
                                                        <td>{{ $item->salary_ot }}đ</td>
                                                        <td>{{ $item->recieved_salary }}đ</td>
                                                    </tr>
                                                @endforeach
                                            @endif
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
                        <h5 class="modal-title" id="exampleModalLabel">Nhập file excel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('labour-salary.import-labour') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="password1">File excel</label>
                                <input type="file" class="form-control" id="password1" placeholder="Tên phòng ban"
                                    name="excel">
                            </div>
                            <div class="modal-footer border-top-0 d-flex bg-light justify-content-between">
                                <div>
                                    <button class="btn btn-danger" data-dismiss="modal" type="button"><i
                                            class="fa fa-close mr-1"></i> Đóng </button>
                                    <button class="btn btn-success delete" type="submit"><i class="fa fa-check mr-1"></i>
                                        Đồng ý nhập file </button>
                                </div>
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
        });
    </script>
@endsection
