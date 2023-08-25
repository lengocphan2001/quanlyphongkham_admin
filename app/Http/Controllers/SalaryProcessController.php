<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\SalaryProcess;
use Illuminate\Http\Request;

class SalaryProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Employee $employee)
    {
        // dd($request);
        SalaryProcess::create([
            'employee_id' => $employee->identity,
            'decision_number' => $request->get('decision_number'),
            'decision_date' => $request->get('decision_date'),
            'date_use' => $request->get('date_use'),
            'department' => '0',
            'position' => '0',
            'title' => '0',
            'salary' => $request->get('salary'),
            'total' => $request->get('total'),
        ]);

        toastr()->success('Thêm diễn biến lương thành công', 'Thành công');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        // $salary_process = SalaryProcess::where('employee_id',  $employee->identity)->get();
        // return view('admin.employees.detail.contract')->with(['contracts' => $contracts, 'employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalaryProcess $salaryProcess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SalaryProcess $salaryProcess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalaryProcess $salaryProcess)
    {
        //
    }
}
