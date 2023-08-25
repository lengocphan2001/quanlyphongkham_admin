<?php

namespace App\Imports;

use App\Models\Labour;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportLabour implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }
    public function model(array $row)
    {
       
        return new Labour([
            'employee_id' => $row[0],
            'date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(intval($row[1]))->format('Y/m/d'),
            'start' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[2])->format('H:i:s'),
            'end' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[3])->format('H:i:s'),
        ]);
    }
}
