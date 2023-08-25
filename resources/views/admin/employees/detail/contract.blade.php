@php
    use App\Models\ContractType;
@endphp
@extends('admin.employees.detail.includes.layout')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Hợp đồng</h1>
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
                        <div class="card-header border-0">
                            <div class="d-flex">
                                <button class="btn btn-success mr-2" data-toggle="modal" data-target="#form"
                                    type="button"><i class="fa fa-plus mr-2"></i> Thêm mới </button>
                                <button class="btn btn-danger deleteConfirm" type="button"><i class="fa fa-close mr-1"></i>
                                    Xóa quá trình </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table id="myTable" class="stripe cell-border hover">
                                        <thead>
                                            <tr>
                                                <th>Số hợp đồng</th>
                                                <th>Loại hợp đồng</th>
                                                <th>Ngày bắt đầu</th>
                                                <th>Ngày kết thúc</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contracts as $item)
                                                <tr>
                                                    <td>{{ $item->contract_number }}</td>
                                                    <td>{{ ContractType::where('identity', $item->contract_number)->first()->name ?? 'Chưa có' }}
                                                    </td>
                                                    <td>{{ $item->contract_start }}</td>
                                                    <td>{{ $item->contract_end }}</td>
                                                    <td>
                                                        <a href="{{ route('employees.contract.edit', ['contract' => $item]) }}"
                                                            class="btn btn-primary mr-3" style="margin-right: 10px;"><i
                                                                class="bx bx-pencil"></i></a>
                                                        <button class="btn btn-danger deleteConfirm"
                                                            value="{{ $item->id }}" type="button">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </td>
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
        <div class="modal fade" id="deleteDepartment" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="deleteCategory" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form action="{{ route('organization.departments.destroy') }}" method="POST">
                        @csrf
                        <input type="text" name="id" value="" id="id" hidden>
                        <div class="modal-header">
                            <h5 class="modal-title">Xóa quá trình hợp đồng</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Bạn có muốn xóa quá trình này <span id="modal-category_name"></span>?
                            <input type="hidden" id="category" name="category_id">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-white" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-danger" id="modal-confirm_delete">Xóa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0 bg-light">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm mới hợp đồng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('employees.contract.create', ['employee' => $employee]) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <h4>Thông tin chung</h4>
                            <div class="form-group">
                                <label for="email1">Loại hợp đồng</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="contract_type">
                                    <option value="0">Chưa có</option>
                                    @foreach ($contract_types as $item)
                                        <option value="{{ $item->identity }}">{{ $item->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Số hợp đồng</label>
                                <input type="text" class="form-control" name="contract_number">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Ngày ký kết</label>
                                <input type="date" class="form-control" name="contract_start">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Ngày hết hạn</label>
                                <input type="date" name="contract_end" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer border-top-0 d-flex bg-light justify-content-end">
                            <div>
                                <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close mr-1"></i> Đóng
                                </button>
                                <button class="btn btn-success" type="submit"><i class="fa fa-check mr-1"></i> Thêm mới
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // jQuery.noConflict();
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

            $('.deleteConfirm').click(function(e) {
                e.preventDefault();
                var id = $(this).val();
                $('#id').val(id);
                $('#deleteDepartment').modal('show');
            });
        });
    </script>
@endsection
