<?php

namespace App\Http\Controllers;

use App\Http\Requests\PosistionRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Title;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::all();
        $titles = Title::all();
        $departments = Department::all();
        $managers = Employee::all();
        return view('admin.positions.index')->with(['positions' => $positions, 'departments' => $departments, 'managers' => $managers, 'titles' => $titles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PosistionRequest $request)
    {
        $data = $request->except(['_token']);
        Position::create($data);
        toastr()->success('Thêm vị trí công việc thành công', 'Thành công');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        $positions = Position::all();
        $titles = Title::all();
        $departments = Department::all();
        $managers = Employee::all();
        return view('admin.positions.edit')->with(['positions' => $positions, 'departments' => $departments, 'managers' => $managers, 'titles' => $titles, 'position' => $position]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position)
    {
        $data = $request->except(['_token']);

        $position->update($data);
        toastr()->success('Sửa vị trí công việc thành công', 'Thành công');

        return redirect()->route('organization.positions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $position = Position::where('id', $request->get('id'))->first();
        $position->delete();
        toastr()->success('Xóa vị trí công việc thành công', 'Thành công');

        return redirect()->route('organization.positions.index');
    }
}
