<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\ContractType;
use App\Models\Employee;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
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
        $data = $request->except(['_token']);

        Contract::create([
            'employee_id' => $employee->identity,
            'contract_type' => $data['contract_type'],
            'contract_number' => $data['contract_number'],
            'contract_start' => $data['contract_start'],
            'contract_end' => $data['contract_end']
        ]);

        toastr()->success('Thêm quá trình hợp đồng thành công', 'Thành công');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contract $contract)
    {
        $contract_types = ContractType::all();
        return view('admin.employees.detail.edit_contract')->with(['contract' => $contract, 'contract_types' => $contract_types]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contract $contract)
    {
        $data = $request->all();
        $contract->update([
            'contract_type' => $data['contract_type'],
            'contract_number' => $data['contract_number'],
            'contract_start' => $data['contract_start'],
            'contract_end' => $data['contract_end']
        ]);

        toastr()->success('Chỉnh sửa quá trình hợp đồng thành công', 'Thành công');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
        //
    }
}
