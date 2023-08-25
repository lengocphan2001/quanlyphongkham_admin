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
                    <h1 class="m-0">Chỉnh sửa thông tin hợp đồng</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Nhân viên</a></li>
                        <li class="breadcrumb-item active">Hợp đồng</li>
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form
                                        action="{{ route('employees.contract.update', ['contract' => $contract]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="email1">Loại hợp đồng</label>
                                                <select class="form-control" id="exampleFormControlSelect1"
                                                    name="contract_type">
                                                    <option value="0">Chưa có</option>
                                                    @foreach ($contract_types as $item)
                                                        <option value="{{ $item->identity }}">{{ $item->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Số hợp đồng</label>
                                                <input type="text" class="form-control" name="contract_number" value="{{ $contract->contract_number}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Ngày ký kết</label>
                                                <input type="date" class="form-control" name="contract_start" value="{{ $contract->contract_start}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Ngày hết hạn</label>
                                                <input type="date" name="contract_end" class="form-control" value="{{ $contract->contract_end}}">
                                            </div>
                                        </div>
                                        <div class="modal-footer border-top-0 d-flex bg-light justify-content-between">

                                            <div>
                                                <a class="btn btn-danger" type="button" href="{{ url()->previous() }}"><i
                                                        class="fa fa-close mr-1"></i> Quay lại </a>
                                                <button class="btn btn-success" type="submit"><i
                                                        class="fa fa-check mr-1"></i> Lưu thông
                                                    tin </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
