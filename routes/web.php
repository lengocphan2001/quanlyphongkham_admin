<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LabourSalaryController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\SalaryProcessController;
use App\Http\Controllers\WorkingProcessController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('admin/dashboard', function(){

});

Route::get('admin/login', function () {
    return view('admin.auth.login');
})->name('admin.login');
Route::post('admin/login', [AuthController::class, 'postLogin'])->name('admin.postLogin');

Route::get('portal/login', function () {
    return view('user.auth.login');
})->name('user.login');
Route::post('portal/login', [AuthController::class, 'postUserLogin'])->name('user.postLogin');

Route::middleware(['checkUserLogin'])->group(function () {
    Route::get('portal/information', [PortalController::class, 'profile'])->name('portal.infomation');
    Route::get('portal/ot', [PortalController::class, 'ot'])->name('portal.ot');
    Route::get('portal/nghi', [PortalController::class, 'nghi'])->name('portal.nghi');
    Route::get('portal/logout', [AuthController::class, 'userLogout'])->name('portal.logout');
    Route::get('portal/month-labours', [PortalController::class, 'monthLabour'])->name('portal.labour');
    Route::get('portal/salary', [PortalController::class, 'salary'])->name('portal.salary');
    Route::post('portal/month-labours', [PortalController::class, 'monthLabourPost'])->name('portal.month-labour-post');
    Route::post('portal/nghi/register', [PortalController::class, 'postRegisterLeave'])->name('leave.register');
    Route::post('portal/ot/register', [PortalController::class, 'postRegisterOt'])->name('ot.register');
});

Route::post('admin/login', [AuthController::class, 'postLogin'])->name('admin.postLogin');
Route::middleware(['checkAdminLogin'])->group(function () {
    Route::get('/', function(){
        return view('admin.index');
    }); 
    Route::get('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('admin/dashboard', [DepartmentController::class, 'index'])->name('dashboard');
    Route::prefix('organization')->name('organization.')->group(function () {
        Route::resource('departments', DepartmentController::class)->except('destroy');
        Route::resource('positions', PositionController::class)->except('destroy');
        Route::post('departments/delete', [DepartmentController::class, 'destroy'])->name('departments.destroy');
        Route::post('positions/delete', [PositionController::class, 'destroy'])->name('positions.destroy');
        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('chucdanh', [CategoryController::class, 'chucdanh'])->name('chucdanh');
            Route::post('chucdanh/them', [CategoryController::class, 'themChucDanh'])->name('chucdanh.themmoi');
            Route::post('chucdanh/xoa', [CategoryController::class, 'destroy'])->name('chucdanh.xoa');
            Route::post('chucdanh/chinhsua', [CategoryController::class, 'updateTitle'])->name('chucdanh.chinhsua');
            Route::get('calamviec', [CategoryController::class, 'calamviec'])->name('calamviec');
            Route::post('calamviec/them', [CategoryController::class, 'themCaLamViec'])->name('calamviec.themmoi');
            Route::post('calamviec/xoa', [CategoryController::class, 'destroyCLV'])->name('calamviec.xoa');
            Route::post('calamviec/chinhsua', [CategoryController::class, 'updateCLV'])->name('calamviec.chinhsua');
            Route::get('loaihopdong', [CategoryController::class, 'loaihopdong'])->name('loaihopdong');
            Route::post('loaihopdong/them', [CategoryController::class, 'themLoaiHopDong'])->name('loaihopdong.themmoi');
            Route::post('loaihopdong/xoa', [CategoryController::class, 'destroyLHD'])->name('loaihopdong.xoa');
            Route::post('loaihopdong/chinhsua', [CategoryController::class, 'updateLHD'])->name('loaihopdong.chinhsua');
            Route::get('loaichamcong', [CategoryController::class, 'loaichamcong'])->name('loaichamcong');
            Route::post('loaichamcong/them', [CategoryController::class, 'themLoaiChamCong'])->name('loaichamcong.themmoi');
            Route::post('loaichamcong/xoa', [CategoryController::class, 'destroyLCC'])->name('loaichamcong.xoa');
            Route::post('loaichamcong/chinhsua', [CategoryController::class, 'updateLCC'])->name('loaichamcong.chinhsua');
        });
    });
    Route::prefix('labour-salary')->name('labour-salary.')->group(function () {
        Route::get('labours', [LabourSalaryController::class, 'labour'])->name('labour');
        Route::get('on-leave', [LabourSalaryController::class, 'onLeave'])->name('on-leave');
        Route::get('ot', [LabourSalaryController::class, 'timeKeeping'])->name('time-keeping');
        Route::get('total-on-leave', [LabourSalaryController::class, 'totalOnLeave'])->name('total-on-leave');
        Route::get('salarys', [LabourSalaryController::class, 'salary'])->name('salary');
        Route::post('labours', [LabourSalaryController::class, 'postExcel'])->name('import-labour');
        Route::post('view-salary', [LabourSalaryController::class, 'viewSalary'])->name('view-salary');
        Route::get('total-on-leave/refresh', [LabourSalaryController::class, 'refreshToTalOnLeave'])->name('total-on-leave-refresh');
    });
    Route::resource('employees', EmployeeController::class);
    Route::get('employee/detail/{employee}', [EmployeeController::class, 'detail'])->name('employees.information');
    // Route::resource('employees/contracts', ContractController::class)
    Route::get('employees/contracts/{employee}', [EmployeeController::class, 'contract'])->name('employees.contract');
    Route::get('employees/profile/edit/{employee}', [EmployeeController::class, 'updateProfile'])->name('employees.profile.edit');
    Route::put('employees/profile/update/{employee}', [EmployeeController::class, 'update'])->name('employees.profile.update');
    
    Route::post('employees/contracts/create/{employee}', [ContractController::class, 'store'])->name('employees.contract.create');
    Route::get('employees/contracts/edit/{contract}', [ContractController::class, 'edit'])->name('employees.contract.edit');
    Route::put('employees/contracts/update/{contract}', [ContractController::class, 'update'])->name('employees.contract.update');
    Route::post('employees/working-process/create/{employee}', [WorkingProcessController::class, 'store'])->name('employees.working-process.create');
    Route::post('employees/salary-process/create/{employee}', [SalaryProcessController::class, 'store'])->name('employees.salary-process.create');
    Route::get('employees/working-process/{employee}', [EmployeeController::class, 'working_process'])->name('employees.working-process');
    Route::get('employees/salary-process/{employee}', [EmployeeController::class, 'salary_process'])->name('employees.salary-process');
    Route::get('process/accept-process', [ProcessController::class, 'index'])->name('process.accept-process');
    Route::get('process/accept-process/leave/accept/{leave}', [ProcessController::class, 'acceptLeave'])->name('leaves.accept');
    Route::get('process/accept-process/time-keeping/accept/{ot}', [ProcessController::class, 'acceptOt'])->name('ots.accept');
});
