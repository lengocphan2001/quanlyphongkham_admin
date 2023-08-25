<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\Notification;
use App\Models\SalaryTable;
use App\Models\TimeKeeping;
use App\Models\TotalLabour;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortalController extends Controller
{
    public function profile(){
        return view('user.profile.infomation');
    }

    public function ot(){
        $time_keepings = TimeKeeping::where('employee_id', Auth::guard('web')->user()->identity)->get();
        return view('user.profile.ot')->with(['time_keepings' => $time_keepings]);
    }

    public function nghi(){
        $leaves = Leave::where('employee_id', Auth::guard('web')->user()->identity)->get();
        return view('user.profile.nghi')->with(['leaves' => $leaves]);
    }

    public function postRegisterLeave(Request $request){
        Leave::create([
            'employee_id' => Auth::guard('web')->user()->identity,
            'start' => $request->get('start'),
            'end' => $request->get('end'),
            'total' => $request->get('total'),
            'status' => 0
        ]);

        $department = Department::where('name', Auth::guard('web')->user()->department)->first();
        if($department){
            $manager = User::where('id', $department->manager_id)->first();

            if ($manager){
                Notification::create([
                    'manager_id' => $manager->id,
                    'message' => 'Bạn có đơn xin nghỉ phép từ ' . Auth::guard('web')->user()->fullname
                ]);
            }
        }

        toastr()->success('Thêm phép nghỉ thành công', 'Thành công');

        return back();
    }

    public function postRegisterOT(Request $request){
        TimeKeeping::create([
            'employee_id' => Auth::guard('web')->user()->identity,
            'date' => $request->get('date'),
            'start' => $request->get('start'),
            'end' => $request->get('end'),
            'total' => $request->get('total'),
            'status' => 0
        ]);

        $department = Department::where('name', Auth::guard('web')->user()->department)->first();
        if($department){
            $manager = User::where('id', $department->manager_id)->first();

            if ($manager){
                Notification::create([
                    'manager_id' => $manager->id,
                    'message' => 'Bạn có đơn xin OT từ ' . Auth::guard('web')->user()->fullname
                ]);
            }
        }

        toastr()->success('Thêm đơn OT thành công', 'Thành công');

        return back();
    }

    public function monthLabour(){
        return view('user.profile.labour');
    }

    public function monthLabourPost(Request $request){
        
        $month = $request->get('month');
        $year = date('Y');

        $total_labours = TotalLabour::where([['month', '=', $month], ['year', '=', $year],['employee_id', '=', Auth::guard('web')->user()->identity]])->get();
        // dd($total_labours);
        return view('user.profile.labour')->with(['total_labours' => $total_labours]);
    }

    public function salary(){
        $month = date('n');
        $year = date('Y');

        $salary_table = SalaryTable::where([['employee_id', '=', Auth::guard('web')->user()->identity], ['month', '=', $month], ['year', '=', $year]])->first();

        return view('user.profile.salary')->with(['salary_table' => $salary_table]);
    }


    
}
