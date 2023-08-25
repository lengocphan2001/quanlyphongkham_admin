<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Contract;
use App\Models\ContractType;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\SalaryProcess;
use App\Models\Title;
use App\Models\TotalLeave;
use App\Models\WorkingProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('admin.employees.index')->with(['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $postions = Position::all();
        $titles = Title::all();
        $contract_types = ContractType::all();
        return view('admin.employees.create')->with(['departments' => $departments, 'positions' => $postions, 'titles' => $titles, 'contract_types' => $contract_types]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        switch ($request->input('action')) {
            case 'save':
                $data = $request->except(['_token', 'action']);
                $employee = Employee::create($data);
                $this_month = Carbon::parse(now());
                $start_month = Carbon::parse($employee->start_working_date);
                $diff = $start_month->diffInMonths($this_month);
                TotalLeave::create([
                    'employee_id' => $employee->identity,
                    'remaining' => $diff,
                    'used' => 0
                ]);

                Contract::create([
                    'employee_id' => $employee->identity,
                    'contract_type' => $employee->contract_type,
                    'contract_number' => $employee->contract_number,
                    'contract_start' => $employee->contract_start,
                    'contract_end' => $employee->contract_end
                ]);
                toastr()->success('Thêm nhân viên thành công', 'Thành công');
                return redirect(route('employees.index'));
            case 'save-add':
                break;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('admin.employees.detail.includes.layout')->with(['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $data = $request->all();
        // dd($data);
        $employee->update($data);

        toastr()->success('Chỉnh sửa thành công', 'Thành công');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }

    public function detail(Employee $employee){
        return view('admin.employees.detail.profile')->with(['employee' => $employee]);
    }

    public function contract(Employee $employee){
        $contract_types = ContractType::all();
        $contracts = Contract::where('employee_id', $employee->identity)->get();
        return view('admin.employees.detail.contract')->with(['contracts' => $contracts, 'employee' => $employee, 'contract_types' => $contract_types]);
    }

    public function working_process(Employee $employee){
        $departments = Department::all();
        $titles = Title::all();
        $positions = Position::all();

        $working_process = WorkingProcess::where('employee_id', $employee->identity)->get();
        return view('admin.employees.detail.working_process')->with(['working_process' => $working_process, 'employee' => $employee, 'departments' => $departments, 'positions' => $positions, 'titles' => $titles]);
    }

    public function salary_process(Employee $employee){
        $salary_process = SalaryProcess::where('employee_id', $employee->identity)->get();
        $departments = Department::all();
        $titles = Title::all();
        $positions = Position::all();
        return view('admin.employees.detail.salary_process')->with(['salary_process' => $salary_process, 'employee' => $employee, 'departments' => $departments, 'positions' => $positions, 'titles' => $titles]);
    }

    public function updateProfile(Employee $employee){
        $departments = Department::all();
        $titles = Title::all();
        $positions = Position::all();
        $contract_types = ContractType::all();
        return view('admin.employees.detail.edit_profile')->with(['employee' => $employee, 'departments' => $departments, 'positions' => $positions, 'titles' => $titles, 'contract_types' => $contract_types]);
    }
}
