@php
    use Carbon\Carbon;
@endphp
@extends('admin.employees.detail.includes.layout', ['employee' => $employee])

@section('content')
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
                <div class="col-lg-6">
                    <div class="card">
                        <h4 class="card-header d-flex justify-content-between">
                            <span class="badge badge-success text-center" style="font-size: 100%">THÔNG TIN CÁ NHÂN</span>
                            <a type="button" class="btn btn-outline-secondary btn-rounded" href="{{ route('employees.profile.edit', ['employee' => $employee])}}"
                                data-mdb-ripple-color="dark">Chỉnh sửa</a>
                        </h4>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p>Mã nhân viên</p>
                                    <p>Họ và tên</p>
                                    <p>Ngày sinh</p>
                                    <p>CCCD</p>
                                </div>
                                <div class="col-lg-6">
                                    <p>{{ $employee->identity ?? 'Chưa có' }}</p>
                                    <p>{{ $employee->fullname ?? 'Chưa có' }}</p>
                                    <p>{{ $employee->date_of_birth ?? 'Chưa có' }}</p>
                                    <p>{{ $employee->identity_card ?? 'Chưa có' }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="text-primary">Thông tin liên lạc</h3>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <p>Điện thoại</p>
                                    <p>Email</p>
                                    <p>Địa chỉ</p>
                                    <p>Nơi sinh</p>
                                </div>
                                <div class="col-lg-6">
                                    <p>{{ $employee->phone ?? 'Chưa có' }}</p>
                                    <p>{{ $employee->email ?? 'Chưa có' }}</p>
                                    <p>{{ $employee->current_address ?? 'Chưa có' }}</p>
                                    <p>{{ $employee->place_of_birth ?? 'Chưa có' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <h4 class="card-header d-flex justify-content-between">
                            <span class="badge badge-success text-center" style="font-size: 100%">THÔNG TIN CÔNG VIỆC/HỢP
                                ĐỒNG</span>
                        </h4>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p>Trạng thái</p>
                                    <p>Công ty</p>
                                    <p>Phòng ban</p>
                                    <p>Vị trí công việc</p>
                                    <p>Chức danh</p>
                                    <p>Thời gian giữ vị trí công việc</p>
                                </div>
                                <div class="col-lg-6">
                                    <p><span class="badge badge-success text-medium">{{ $employee->working_status ?? 'Chưa rõ' }}</span></p>
                                    <p>Cốc cốc</p>
                                    <p>{{ $employee->department ?? 'Chưa có' }}</p>
                                    <p>{{ $employee->postition ?? 'Chưa có' }}</p>
                                    <p>{{ $employee->title ?? 'Chưa có' }}</p>
                                    <p>{{ Carbon::parse(now())->diffInDays(Carbon::parse($employee->start_working_date)) ?? '0'}} ngày</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="text-primary">Thông tin hợp đồng</h3>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p>Ngày ký hợp đồng</p>
                                    <p>Loại hợp đồng</p>
                                    <p>Ngày vào làm</p>
                                </div>
                                <div class="col-lg-6">
                                    <p>{{ $employee->contract_start ?? '' }}</p>
                                    <p>{{ $employee->contract_type ?? '' }}</p>
                                    <p>{{ $employee->contract_end ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
