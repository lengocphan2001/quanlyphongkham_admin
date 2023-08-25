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
                            <h2 class="text-primary">Tổng công tháng</h2>
                        </div>
                        <div>
                            <form action="{{ route('portal.month-labour-post') }}" class="form-inline" method="POST">
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
                                <div>
                                    <button class="btn btn-success" type="submit"><i class="fa fa-search"></i>Xem
                                        công tháng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <hr class="bg-primary">
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="myTable" class="stripe cell-border hover">
                                <thead>
                                    <tr>
                                        <th>Tháng</th>
                                        <th>Công thực nhận</th>
                                        <th>Công phép</th>
                                        <th>Tổng giờ OT</th>
                                        <th>Tổng công</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($total_labours))
                                        @foreach ($total_labours as $item)
                                            <tr>
                                                <td>{{ $item->month }}</td>
                                                <td>{{ $item->real_labour }}</td>
                                                <td>{{ $item->leave_labour }}</td>
                                                <td>{{ $item->ot_labour }}</td>
                                                <td>{{ $item->total_labour }}</td>
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
    <div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm phép nghỉ</h5>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true" class="text-secondary"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    @php
                        $leave = TotalLeave::where('employee_id', Auth::guard('web')->user()->identity)->first();
                    @endphp
                    @if ($leave->used >= $leave->remaining)
                        <div class="alert alert-warning alert-dismissible text-white" role="alert">
                            <span class="text-sm">Bạn đã hết phép của năm, hãy cân nhắc!</span>
                            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif

                    <form action="{{ route('leave.register') }}" method="POST">
                        @csrf
                        <label for="email" class="font-weight-bold">Ngày bắt đầu</label>
                        <div class="input-group input-group-outline my-1">
                            <input type="date" class="form-control" id="email" name="start">
                        </div>
                        <label for="email" class="font-weight-bold">Ngày kết thúc</label>
                        <div class="input-group input-group-outline my-1">
                            <input type="date" class="form-control" id="email" name="end">
                        </div>

                        <label for="email" class="font-weight-bold">Tổng ngày nghỉ</label>
                        <div class="input-group input-group-outline my-1">
                            <input type="number" class="form-control" id="email" name="total">
                        </div>

                        <div class="modal-footer mt-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                style="text-transform: none">Đóng</button>
                            <button type="submit" class="btn btn-primary" style="text-transform: none">Tạo mới</button>
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
            $(document).ready(function() {
                $('#form').modal({
                    'show': {{ count($errors) > 0 ? 'true' : 'false' }}
                });
            });


        });
    </script>
@endsection
