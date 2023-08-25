<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\TimeKeeping;
use App\Models\TotalLeave;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function index(){
        $leaves = Leave::where('status', 0)->get();
        $ots = TimeKeeping::where('status', 0)->get();
        return view('admin.administrator.process')->with(['leaves' => $leaves, 'ots' => $ots]);
    }

    public function acceptLeave(Leave $leave){
        $total_leave = TotalLeave::where('employee_id', $leave->employee_id)->first();

        $total_leave->update([
            'remaining' => $total_leave->remaining - $leave->total,
            'used' => $total_leave->used + $leave->total
        ]);

        $leave->update([
            'status' => 1
        ]);

        toastr()->success('Duyệt thành công','Thành công');
        return back();
    }
    public function acceptOt(TimeKeeping $ot){
        $ot->update([
            'status' => 1
        ]);

        toastr()->success('Duyệt thành công','Thành công');
        return back();
    }
}
