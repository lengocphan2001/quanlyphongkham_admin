<?php

namespace App\Http\Controllers;

use App\Imports\ImportLabour;
use App\Models\Employee;
use App\Models\Labour;
use App\Models\Leave;
use App\Models\SalaryProcess;
use App\Models\SalaryTable;
use App\Models\TimeKeeping;
use App\Models\TotalLabour;
use App\Models\TotalLeave;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class LabourSalaryController extends Controller
{
    public function labour()
    {
        $year = date('Y');

        $employee = Employee::all();
        foreach ($employee as $item) {
            $identity = $item->identity;
            for ($i = 1; $i <= 12; $i++) {
                $count = DB::table('labours')->where('employee_id', '=', $identity)->whereMonth('date', '=', $i)->whereYear('date', '=', $year)->count();
                $labour = TotalLabour::where([['month', '=', $i], ['employee_id', '=', $identity], ['year', '=', $year]])->first();
                $leaves = Leave::where('employee_id', $identity)->whereMonth('start', '=', $i)->whereYear('start', '=', $year)->sum('total');
                $ots = TimeKeeping::where('employee_id', $identity)->whereMonth('date', '=', $i)->whereYear('date', '=', $year)->sum('total');
                if (!$labour) {
                    TotalLabour::create([
                        'employee_id' => $identity,
                        'month' => $i,
                        'year' => $year,
                        'real_labour' => $count,
                        'leave_labour' => $leaves,
                        'ot_labour' => $ots,
                        'total_labour' => $count + $leaves
                    ]);
                } else {
                    $labour->update([
                        'employee_id' => $identity,
                        'month' => $i,
                        'year' => $year,
                        'real_labour' => $count,
                        'leave_labour' => $leaves,
                        'ot_labour' => $ots,
                        'total_labour' => $count + $leaves
                    ]);
                }
            }
        }

        $labours = TotalLabour::all();
        return view('admin.labour-salary.labour')->with(['total_labours' => $labours]);
    }

    public function postExcel(Request $request)
    {
        Excel::import(
            new ImportLabour,
            $request->file('excel')->store('file')
        );
        return redirect()->back();
    }

    public function salary()
    {
        return view('admin.labour-salary.salary');
    }

    public function viewSalary(Request $request)
    {
        $month = $request->get('month');
        $year = $request->get('year');


        $employee = Employee::all();

        foreach ($employee as $key => $item) {
            $total_labour = TotalLabour::where([['employee_id', '=', $item->identity], ['month', '=', $month], ['year', '=', $year]])->first();

            $salary_process = SalaryProcess::where('employee_id', $item->identity)->get()->last();

            $salary_table = SalaryTable::where([['employee_id', '=', $item->identity], ['month', '=', $month], ['year', '=', $year]])->first();
            if (!$salary_table) {
                SalaryTable::create([
                    'employee_id' => $item->identity,
                    'fullname' => $item->fullname,
                    'department' => '0',
                    'month' => $month,
                    'year' => $year,
                    'total_labour' => $total_labour->total_labour,
                    'ot_labour' => $total_labour->ot_labour,
                    'salary' => $salary_process->salary,
                    'salary_by_work' => $salary_process->salary * $total_labour->total_labour / 24,
                    'salary_ot' => $salary_process->salary * $total_labour->ot_labour / 8 / 24 * 1.5,
                    'recieved_salary' => ($salary_process->salary * $total_labour->total_labour / 24) + ($salary_process->salary * $total_labour->ot_labour / 8 / 24 * 1.5)
                ]);
            } else {
                $salary_table->update([
                    'employee_id' => $item->identity,
                    'fullname' => $item->fullname,
                    'deparment' => $item->department,
                    'month' => $month,
                    'year' => $year,
                    'total_labour' => $total_labour->total_labour,
                    'ot_labour' => $total_labour->ot_labour,
                    'salary' => $salary_process->salary,
                    'salary_by_work' => $salary_process->salary * $total_labour->total_labour / 24,
                    'salary_ot' => $salary_process->salary * $total_labour->ot_labour / 8 / 24 * 1.5,
                    'recieved_salary' => ($salary_process->salary * $total_labour->total_labour / 24) + ($salary_process->salary * $total_labour->ot_labour / 8 / 24 * 1.5)
                ]);
            }
        }

        $salary_tables = SalaryTable::where([['month', '=', $month], ['year', '=', $year]])->get();

        return view('admin.labour-salary.salary')->with(['salary_table' => $salary_tables]);
    }




    public function totalOnLeave()
    {
        $total_leaves = TotalLeave::all();
        return view('admin.labour-salary.tonghopphep')->with(['total_leaves' => $total_leaves]);
    }

    public function refreshToTalOnLeave()
    {
        $total_leaves = TotalLeave::all();
        foreach ($total_leaves as $item) {
            $employee = Employee::where('identity', $item->employee_id)->first();
            $this_month = Carbon::parse(now());
            $start_month = Carbon::parse($employee->start_working_date);
            $diff = $start_month->diffInMonths($this_month);
            $item->update([
                'remaining' => $diff,
            ]);
            $item->save();
        }

        toastr()->success('Cập nhật thành công', 'Thành công');

        return redirect(route('labour-salary.total-on-leave'));
    }

    public function onLeave()
    {
        $leaves = Leave::all();
        return view('admin.labour-salary.nghiphep')->with(['leaves' => $leaves]);
    }

    public function timeKeeping()
    {
        $ots = TimeKeeping::all();
        return view('admin.labour-salary.ot')->with(['ots' => $ots]);
    }
}
