@extends('admin.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Chỉnh sửa thông tin vị trí công việc</h1>
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="{{ route('organization.positions.update', ['position' => $position]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="password1">Tên vị trí công việc</label>
                                                <input type="text" class="form-control" id="password1"
                                                    placeholder="Tên vị trí" name="name" value="{{ $position->name }}">
                                                @if ($errors->has('name'))
                                                    <div class='text-danger'>
                                                        * {{ $errors->first('name') }}
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="password1">Mã vị trí công việc</label>
                                                <input type="text" class="form-control" id="password1"
                                                    placeholder="Mã vị trí" name="identity" value="{{ $position->identity }}">
                                                @if ($errors->has('identity'))
                                                    <div class='text-danger'>
                                                        * {{ $errors->first('identity') }}
                                                    </div>
                                                @endif
                                            </div>


                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Quản lý</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="manager">
                                                    <option value="Chưa có">Chưa có</option>
                                                    @foreach ($managers as $item)
                                                        <option value="{{ $item->fullname }}">{{ $item->fullname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Chức danh</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="title">
                                                    <option value="Chưa có">Chưa có</option>
                                                    @foreach ($titles as $item)
                                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Phòng ban</label>
                                                <select class="form-control" id="exampleFormControlSelect1"
                                                    name="department">
                                                    <option value="Chưa có">Chưa có</option>
                                                    @foreach ($departments as $item)
                                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="modal-footer border-top-0">
                                                <a class="btn btn-danger" type="button" href="{{ url()->previous() }}"><i
                                                        class="fa fa-close mr-1"></i>
                                                    Quay lại </a>
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
