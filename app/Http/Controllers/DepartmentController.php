<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        $managers = Employee::all();
        return view('admin.departments.index')->with(['departments' => $departments, 'managers' => $managers]);
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
    public function store(DepartmentRequest $request)
    {
        $data = $request->all();
        
        Department::create([
            'name' => $data['name'],
            'identity' => $data['identity'],
            'parent_id' => $data['parent_id'],
            'manager_id' => $request->has('manager_id') ? $data['manager_id'] : null,
            'status' => $request->has('isDelete') ? 0 : 1
        ]);
        toastr()->success('Thành công', 'Thêm phòng ban thành công');
    
        return redirect()->route('organization.departments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        $departments = Department::all();
        $managers = Employee::all();

        return view('admin.departments.edit')->with(['department' => $department, 'departments' => $departments, "managers" => $managers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $data = $request->all();
        $department->update([
            'name' => $data['name'],
            'identity' => $data['identity'],
            'parent_id' => $data['parent_id'],
            'manager_id' => $request->has('manager_id') ? $data['manager_id'] : null,
            'status' => $request->has('isDelete') ? 0 : 1
        ]);
        toastr()->success('Thành công', 'Sửa thông tin phòng ban thành công');

        return redirect()->route('organization.departments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {   
        $department = Department::where('id', $request->get('id'))->first();
        $department->delete();
        toastr()->success('Xóa phòng ban thành công', 'Thành công');

        return redirect()->route('organization.departments.index');

    }
}
