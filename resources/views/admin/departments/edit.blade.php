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
                    <h1 class="m-0">Chỉnh sửa thông tin phòng ban</h1>
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form
                                        action="{{ route('organization.departments.update', ['department' => $department]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="password1">Tên phòng ban</label>
                                                <input type="text" class="form-control" id="password1"
                                                    placeholder="Tên phòng ban" name="name"
                                                    value="{{ $department->name }}">
                                                @if ($errors->has('name'))
                                                    <div class='text-danger'>
                                                        * {{ $errors->first('name') }}
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="password1">Mã phòng ban</label>
                                                <input type="text" class="form-control" id="password1"
                                                    placeholder="Tên phòng ban" name="identity"
                                                    value="{{ $department->identity }}">
                                                @if ($errors->has('identity'))
                                                    <div class='text-danger'>
                                                        * {{ $errors->first('identity') }}
                                                    </div>
                                                @endif
                                            </div>


                                            <div class="form-group">
                                                <label for="email1">Phòng ban cha</label>
                                                <select class="form-control" id="exampleFormControlSelect1"
                                                    name="parent_id">
                                                    <option value="0">Phòng ban cha</option>
                                                    @foreach ($departments as $item)
                                                        @if ($item->id != $department->id)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="password1">Quản lý</label>
                                                <select class="form-control" id="exampleFormControlSelect1"
                                                    name="manager_id">
                                                    @foreach ($managers as $item)
                                                        <option value="{{ $item->id }}">{{ $item->fullname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-top-0 d-flex bg-light justify-content-between">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" id="defaultInline2"
                                                    name="isDelete">
                                                <label class="custom-control-label" for="defaultInline2">Đã
                                                    xóa/giải thể</label>
                                            </div>
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
