@extends('admin.index')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="danhmuc-body nhansuThemMoi-body">
                        <div class="app nhansuThemMoi-app">
                            <div class="nhansu nhansuThemMoi">
                                <div class="nhansuThemMoi-header">
                                    <form action="{{ route('employees.store') }}" method="POST" class="nhansuThemMoi-form">
                                        @csrf
                                        <div class="nhansuThemMoi-form-title">
                                            <p class="nhansuThemMoi-form-title-text"><i class="fa-solid fa-user-plus"></i>
                                                Thêm nhân
                                                sự mới
                                            </p>
                                        </div>
                                        <div class="nhansuMoi-khoi">
                                            <div class="nhansuThemMoi-form-left">
                                                <p class="nhansuThemMoi-form-text">Thông tin chung</p>
                                                <p class="nhansuThemMoi-form-left-text">Thông tin cá nhân</p>
                                                <div class="nhansuThemMoi-form-left-box">
                                                    <div class="nhansuThemMoi-form-left-group">
                                                        <label for="">Mã nhân viên: <span>*</span></label>
                                                        <input type="text" name="identity">
                                                        @if ($errors->has('identity'))
                                                            <div class='text-danger'>
                                                                * {{ $errors->first('identity') }}
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="nhansuThemMoi-form-left-group">
                                                        <label for="">Họ và tên: <span>*</span></label>
                                                        <input type="text" name="fullname">
                                                        @if ($errors->has('fullname'))
                                                            <div class='text-danger'>
                                                                * {{ $errors->first('fullname') }}
                                                            </div>
                                                        @endif
                                                    </div>

                                                </div>
                                                <div class="nhansuThemMoi-form-left-box">
                                                    <div class="nhansuThemMoi-form-left-group">
                                                        <label for="">Tên thường gọi:</label>
                                                        <input type="text" name="common_name">
                                                    </div>
                                                    <div class="nhansuThemMoi-form-left-group">
                                                        <label for="">Ngày sinh: <span>*</span></label>
                                                        <input type="date" name="date_of_birth">
                                                    </div>
                                                </div>
                                                <div class="nhansuThemMoi-form-left-box">
                                                    <div class="nhansuThemMoi-form-left-group">
                                                        <label for="">Giới tính:</label>
                                                        <select name="gender" id="">
                                                            <option value="1">Nam</option>
                                                            <option value="0">Nữ</option>
                                                        </select>
                                                    </div>

                                                    <div class="nhansuThemMoi-form-left-group">
                                                        <label for="">CCCD: <span>*</span></label>
                                                        <input type="text" name="identity_card">
                                                        @if ($errors->has('identity_card'))
                                                            <div class='text-danger'>
                                                                * {{ $errors->first('identity_card') }}
                                                            </div>
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="nhansuThemMoi-form-right">
                                                <p class="nhansuThemMoi-form-right-img">
                                                    <img src="../asset/images/user.png" alt="">
                                                </p>
                                                <input type="file">
                                            </div>
                                        </div>


                                        <div class="nhansuThemMoi-form-box">
                                            <div class="nhansuThemMoi-form-box-group">
                                                <label for="">Ngày bắt đầu làm: <span>*</span></label>
                                                <input type="date" name="start_working_date">
                                            </div>
                                            <div class="nhansuThemMoi-form-box-group">
                                                <label for="">Ngày chính thức:</label>
                                                <input type="date" name="offical_start_working_date">
                                            </div>
                                            <div class="nhansuThemMoi-form-box-group">
                                                <label for="">Trạng thái làm việc:</label>
                                                <select name="working_status" id="">
                                                    <option value="Đang làm việc">Đang làm việc</option>
                                                </select>
                                            </div>
                                        </div>
                                        <p class="nhansuThemMoi-form-left-text">Thông tin liên lạc - Nguyên quán - Nơi sinh
                                        </p>
                                        <div class="nhansuThemMoi-form-left-box" style="align-items: flex-end">
                                            <div class="nhansuThemMoi-form-left-group" style="max-width: 30%">
                                                <label for="">Địa chỉ hiện tại:</label>
                                                <input type="text" placeholder="Số nhà/Thôn xóm" name="current_address">
                                            </div>


                                        </div>
                                        <div class="nhansuThemMoi-form-left-box" style="align-items: flex-end">
                                            <div class="nhansuThemMoi-form-left-group" style="max-width: calc(100% / 4)">
                                                <label for="">Địa chỉ thường trú:</label>
                                                <input type="text" placeholder="Số nhà/Thôn xóm"
                                                    name="permanent_address">
                                            </div>

                                            <div class="nhansuThemMoi-form-left-group" style="max-width: calc(100% / 4)">
                                                <label for="">Nguyên quán:</label>
                                                <select name="domicile" id="">
                                                    <option value="Đã kết hôn">Đã kết hôn</option>
                                                </select>
                                            </div>
                                            <div class="nhansuThemMoi-form-left-group" style="max-width: calc(100% / 4)">
                                                <label for="">Nơi sinh:</label>
                                                <select name="place_of_birth" id="">
                                                    <option value="Đã kết hôn">Đã kết hôn</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="nhansuThemMoi-form-left-box" style="align-items: flex-end">
                                            <div class="nhansuThemMoi-form-left-group" style="max-width: calc(100% / 4)">
                                                <label for="">Số điện thoại:</label>
                                                <input type="text" name="phone">
                                                @if ($errors->has('phone'))
                                                    <div class='text-danger'>
                                                        * {{ $errors->first('phone') }}
                                                    </div>
                                                @endif
                                            </div>


                                            <div class="nhansuThemMoi-form-left-group" style="max-width: calc(100% / 4)">
                                                <label for="">Email:</label>
                                                <input type="email" name="email">
                                                @if ($errors->has('email'))
                                                    <div class='text-danger'>
                                                        * {{ $errors->first('email') }}
                                                    </div>
                                                @endif
                                            </div>


                                        </div>
                                        <p class="nhansuThemMoi-form-left-text">Thông tin tiếp nhận nhân sự</p>
                                        <div class="nhansuThemMoi-form-box">
                                            <div class="nhansuThemMoi-form-box-group">
                                                <label for="">Số quyết định: </label>
                                                <input type="text" name="decision_number">
                                            </div>
                                            <div class="nhansuThemMoi-form-box-group">
                                                <label for="">Ngày quyết định:</label>
                                                <input type="date" name="decision_date">
                                            </div>
                                            <div class="nhansuThemMoi-form-box-group">
                                                <label for="">Phòng ban: <span>*</span></label>
                                                <select name="department" id="">
                                                    <option value="Chưa có">Chưa có</option>
                                                    @foreach ($departments as $item)
                                                        <option value="{{ $item->identity }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="nhansuThemMoi-form-box">
                                            <div class="nhansuThemMoi-form-box-group">
                                                <label for="">Vị trí công việc: <span>*</span></label>
                                                <select name="position" id="">
                                                    <option value="Chưa có">Chưa có</option>
                                                    @foreach ($positions as $item)
                                                        <option value="{{ $item->identity }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="nhansuThemMoi-form-box-group">
                                                <label for="">Chức danh:</label>
                                                <select name="title" id="">
                                                    <option value="Chưa có">Chưa có</option>
                                                    @foreach ($titles as $item)
                                                        <option value="{{ $item->identity }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="nhansuThemMoi-form-box-group">
                                            </div>
                                        </div>
                                        <p class="nhansuThemMoi-form-left-text">Thông tin hợp đồng</p>
                                        <div class="nhansuThemMoi-form-box">
                                            <div class="nhansuThemMoi-form-box-group">
                                                <label for="">Số hợp đồng: <span>*</span></label>
                                                <input type="text" name="contract_number">
                                            </div>
                                            <div class="nhansuThemMoi-form-box-group">
                                                <label for="">Loại hợp đồng:</label>
                                                <select name="contract_type" id="">
                                                    <option value="chưa có">Chưa có</option>
                                                    @foreach ($contract_types as $item)
                                                        <option value="{{ $item->identity }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="nhansuThemMoi-form-box-group">
                                            </div>
                                        </div>
                                        <div class="nhansuThemMoi-form-box">
                                            <div class="nhansuThemMoi-form-box-group">
                                                <label for="">Ngày ký kết: <span>*</span></label>
                                                <input type="date" name="contract_start">
                                            </div>
                                            <div class="nhansuThemMoi-form-box-group">
                                                <label for="">Ngày hết hạn:</label>
                                                <input type="date" name="contract_end">
                                            </div>
                                            <div class="nhansuThemMoi-form-box-group">
                                            </div>
                                        </div>
                                        <div class="nhansuThemMoi-form-title-right form-themnhansu-btn">
                                            <button name="action" class="nhansuThemMoi-form-title-btn" value="save"
                                                type="submit">Lưu thông tin</button>
                                            <button value="save-add" name="action" class="nhansuThemMoi-form-title-btn"
                                                type="submit">Lưu & thêm mới</button>
                                            <button value="add-move" name="action"
                                                class="nhansuThemMoi-form-title-btn nhansuThemMoi-form-title-btn__chuyen"
                                                type="submit">Thêm
                                                mới <i class="fa-solid fa-arrow-right"></i> Chuyển hợp đồng</button>
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
