<?php

namespace App\Imports;

use App\Models\Ward;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class WardsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Ward([
            'district_id' => $row['district_id'],
            'ward_name' => $row['ward_name'],
            "ward_code" => $row['ward_code'],
            'ward_type' => $row['ward_type'],
        ]);
    }
}
