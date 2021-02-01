<?php

namespace App\Imports;

use App\Models\District;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class DistrictsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new District([
            "district_code" => $row['district_code'],
            "district_name" => $row['district_name'],
            "city_id" => $row['city_id'],
        ]);
    }
}
