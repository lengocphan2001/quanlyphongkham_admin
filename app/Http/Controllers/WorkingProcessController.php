<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\WorkingProcess;
use Illuminate\Http\Request;

class WorkingProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $working_process = WorkingProcess::where('employee_id', $id)->get();
        return view('admin.employees.detail.contract')->with(['working_process' => $working_process]);
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
        WorkingProcess::create([
            'employee_id' => $employee->identity,
            'old_department' => $request->get('old_department'),
            'old_position' => $request->get('old_position'),
            'old_title' => $request->get('old_title'),
            'new_department' => $request->get('new_department'),
            'new_position' => $request->get('new_position'),
            'new_title' => $request->get('new_title'),
        ]);

        toastr()->success('Thêm diễn biến công việc thành công', 'Thành công');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkingProcess $workingProcess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkingProcess $workingProcess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkingProcess $workingProcess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkingProcess $workingProcess)
    {
        //
    }
}
