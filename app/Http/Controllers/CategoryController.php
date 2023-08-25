<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContractTypeRequest;
use App\Http\Requests\ShiftRequest;
use App\Http\Requests\TimeKeepingRequest;
use App\Http\Requests\TitleRequest;
use App\Models\BaseShift;
use App\Models\BaseTimeKeeping;
use App\Models\ContractType;
use App\Models\Shift;
use App\Models\TimeKeeping;
use App\Models\Title;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat\BaseFormatter;
use Ramsey\Uuid\Type\Time;

class CategoryController extends Controller
{
    public function chucdanh(){
        $titles = Title::all();
        return view('admin.categories.chucdanh.index')->with(['titles' => $titles]);
    }

    public function themChucDanh(TitleRequest $titleRequest){
        $data = $titleRequest->all();

        Title::create([
            'name' => $data['name'],
            'identity' => $data['identity'],
            'english_name' => $data['english_name']
        ]);

        toastr()->success('Thêm chức danh thành công', 'Thành công');
        return back();
    }
    public function updateTitle(Request $request){
        $data = $request->all();

        $title = Title::where('identity', $data['old_identity'])->first();

        $title->update([
            'name' => $data['name'],
            'identity' => $data['identity'],
            'english_name' => $data['english_name']
        ]);
        toastr()->success('Cập nhật thành công', 'Thành công');

        return back();
    }


    public function destroy(Request $request){
        $title = Title::where('id', $request->get('id'))->first();
        $title->delete();
        toastr()->success('Xóa chức danh thành công', 'Thành công');
        return back();
    }



    public function calamviec(){
        $titles = BaseShift::all();
        return view('admin.categories.calamviec.index')->with(['titles' => $titles]);
    }

    public function themCaLamViec(ShiftRequest $shiftRequest){
        $data = $shiftRequest->except(['_token']);
        BaseShift::create($data);

        toastr()->success('Thêm ca làm việc thành công', 'Thành công');
        return back();
    }

    public function updateCLV(Request $request){
        $data = $request->all();

        $title = BaseShift::where('identity', $data['old_identity'])->first();

        $title->update($data);
        toastr()->success('Cập nhật thành công', 'Thành công');

        return back();
    }



    public function destroyCLV(Request $request){
        $title = BaseShift::where('id', $request->get('id'))->first();
        $title->delete();
        toastr()->success('Xóa ca làm việc thành công', 'Thành công');
        return back();
    }

    public function loaichamcong(){
        $titles = BaseTimeKeeping::all();
        return view('admin.categories.loaichamcong.index')->with(['titles' => $titles]);
    }
    public function themLoaiChamCong(TimeKeepingRequest $shiftRequest){
        $data = $shiftRequest->except(['_token']);
        BaseTimeKeeping::create($data);

        toastr()->success('Thêm loại chấm công thành công', 'Thành công');
        return back();
    }

    public function updateLCC(Request $request){
        $data = $request->all();

        $base_tk = BaseTimeKeeping::where('identity', $data['old_identity'])->first();

        $base_tk->update([
            'name' => $data['name'],
            'identity' => $data['identity']
        ]);
        toastr()->success('Cập nhật thành công', 'Thành công');

        return back();
    }

    public function destroyLCC(Request $request){
        $title = BaseTimeKeeping::where('id', $request->get('id'))->first();
        $title->delete();
        toastr()->success('Xóa loại chấm công thành công', 'Thành công');
        return back();
    }

    public function loaihopdong(){
        $contract_types = ContractType::all();
        return view('admin.categories.loaihopdong.index')->with(['contract_types' => $contract_types]);
    }

    public function themLoaiHopDong(ContractTypeRequest $contractTypeRequest){
        $data = $contractTypeRequest->all();

        ContractType::create([
            'name' => $data['name'],
            'identity' => $data['identity'],
            'english_name' => $data['english_name']
        ]);

        toastr()->success('Thêm loại hợp đồng thành công', 'Thành công');
        return back();
    }

    public function updateLHD(Request $request){
        $data = $request->all();

        $title = ContractType::where('identity', $data['old_identity'])->first();

        $title->update([
            'name' => $data['name'],
            'identity' => $data['identity'],
            'english_name' => $data['english_name']
        ]);
        toastr()->success('Cập nhật thành công', 'Thành công');

        return back();
    }

    public function destroyLHD(Request $request){
        $title = ContractType::where('id', $request->get('id'))->first();
        $title->delete();
        toastr()->success('Xóa loại hợp đồng thành công', 'Thành công');
        return back();
    }
}
