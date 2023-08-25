@php
    use Carbon\Carbon;
    use App\Models\Department;
    use App\Models\Title;
    use App\Models\Position;
    use App\Models\ContractType;
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
            <form action="{{ route('employees.profile.update', ['employee' => $employee]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-lg-6">
                        <div class="card">
                            <h4 class="card-header d-flex justify-content-between">
                                <span class="badge badge-success text-center" style="font-size: 100%">THÔNG TIN CÁ
                                    NHÂN</span>
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
                                        <input type="text" name="identity" id=""
                                            value="{{ $employee->identity ?? 'Chưa có' }}" readonly class="mb-2">
                                        <input type="text" name="fullname" value="{{ $employee->fullname ?? 'Chưa có' }}"
                                            class="mb-2">
                                        <input type="date" name="date_of_birth" id=""
                                            value="{{ $employee->date_of_birth }} " class="mb-2">
                                        <input type="text" name="identity_card" id=""
                                            value="{{ $employee->identity_card ?? 'Chưa có' }}" class="mb-2">
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
                                        <input type="text" name="phone" id=""
                                            value="{{ $employee->phone ?? 'Chưa có' }}" class="mb-2">
                                        <input type="text" name="email" value="{{ $employee->email ?? 'Chưa có' }}"
                                            class="mb-2">
                                        <input type="date" name="current_address" id=""
                                            value="{{ $employee->current_address ?? 'Chưa có' }}" class="mb-2">
                                        <input type="text" name="place_of_birth" id=""
                                            value="{{ $employee->place_of_birth ?? 'Chưa có' }}" class="mb-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <h4 class="card-header d-flex justify-content-between">
                                <span class="badge badge-success text-center" style="font-size: 100%">THÔNG TIN CÔNG
                                    VIỆC/HỢP
                                    ĐỒNG</span>
                            </h4>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <p>Trạng thái</p>
                                        <p>Phòng ban</p>
                                        <p>Vị trí công việc</p>
                                        <p>Chức danh</p>
                                        <p>Thời gian giữ vị trí công việc</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p><span
                                                class="badge badge-success text-medium">{{ $employee->working_status ?? 'Chưa rõ' }}</span>
                                        </p>
                                        <select name="department" id="" class="w-100 mb-3">
                                            <option value="0">Chưa có</option>
                                            @foreach ($departments as $item)
                                                <option value="{{ $item->identity }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <select name="position" id="" class="w-100 mb-3">
                                            <option value="0">Chưa có</option>
                                            @foreach ($positions as $item)
                                                <option value="{{ $item->identity }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <select name="title" id="" class="w-100 mb-3">
                                            <option value="0">Chưa có</option>
                                            @foreach ($titles as $item)
                                                <option value="{{ $item->identity }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <p>{{ Carbon::parse(now())->diffInDays(Carbon::parse($employee->start_working_date)) ?? '0' }}
                                            ngày</p>
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
                                        <input type="date" name="contract_start" id=""
                                            value="{{ $employee->contract_start ?? 'Chưa có' }}" class="mb-2">
                                        <select name="contract_type" id="" class="w-100 mb-2">
                                            <option value="0">Chưa có</option>
                                            @foreach ($contract_types as $item)
                                                <option value="{{ $item->identity }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="date" name="date_of_birth" id=""
                                            value="{{ $employee->start_working_date ?? 'Chưa có' }}" class="mb-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <button class="btn btn-danger ml-1 mb-1" type="submit"><i class="fa fa-close mr-1"></i>Chỉnh sửa
                        thông
                        tin</button>
                </div>
            </form>
        </div>

    </div>
@endsection
