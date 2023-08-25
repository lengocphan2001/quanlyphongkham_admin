@php
    use App\Models\ToTalLeave;
@endphp
@extends('user.index')

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-12 col-12 d-flex justify-content-between">
                            <h2 class="text-primary">Bảng lương tháng</h2>
                        </div>
                    </div>
                    <div class="row">
                        <hr class="bg-primary">
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <p class="text-bold">Tháng</p>
                            <p class="text-bold">Lương cơ bản</p>
                            <p class="text-bold">Lương theo tổng công</p>
                            <p class="text-bold">Lương OT</p>
                            <p class="text-bold">Lương thực nhận</p>
                        </div>
                        <div class="col-lg-6">
                            <p>{{ $salary_table->month }}</p>
                            <p>{{ $salary_table->salary }}</p>
                            <p>{{ $salary_table->salary_by_work }}</p>
                            <p>{{ $salary_table->salary_ot }}</p>
                            <p>{{ $salary_table->recieved_salary }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('script')

@endsection
