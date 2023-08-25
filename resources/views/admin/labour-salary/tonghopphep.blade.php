@php
    use App\Models\Employee;
@endphp
@extends('admin.index')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tổng hợp phép</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Công - Lương</a></li>
                        <li class="breadcrumb-item active">Tổng hợp phép của nhân viên</li>
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
                                <a class="btn btn-success" href="{{ route('labour-salary.total-on-leave-refresh') }}"><i
                                        class="fa fa-refresh mr-1"></i>Tổng hợp lại</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table id="myTable" class="stripe cell-border hover">
                                        <thead>
                                            <tr>
                                                <th>Mã nhân viên</th>
                                                <th>Tên nhân viên</th>
                                                <th>Tổng số phép còn lại</th>
                                                <th>Số phép đã sử dụng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($total_leaves as $item)
                                                <tr>
                                                    <td>{{ $item->employee_id }}</td>
                                                    <td>{{ Employee::where('identity', $item->employee_id)->first()->fullname }}</td>
                                                    <td>{{ $item->remaining }}</td>
                                                    <td>{{ $item->used }}</td>
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
