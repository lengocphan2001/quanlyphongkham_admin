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
                    <h1 class="m-0">Tổng hợp công</h1>
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
                                <button class="btn btn-success" data-toggle="modal" data-target="#form" type="button"><i
                                        class="fa fa-file-excel-o"></i></button>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table id="myTable" class="stripe cell-border hover">
                                        <thead>
                                            <tr>
                                                <th>Mã nhân viên</th>
                                                <th>Tháng</th>
                                                <th>Công thực tế</th>
                                                <th>Công phép</th>
                                                <th>Tổng giờ OT</th>
                                                <th>Tổng công</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($total_labours as $item)
                                                <tr>
                                                    <td>{{ $item->employee_id }}</td>
                                                    <td>{{ $item->month }}</td>
                                                    <td>{{ $item->real_labour }}</td>
                                                    <td>{{ $item->leave_labour }}</td>
                                                    <td>{{ $item->ot_labour }}</td>
                                                    <td>{{ $item->total_labour }}</td>
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
