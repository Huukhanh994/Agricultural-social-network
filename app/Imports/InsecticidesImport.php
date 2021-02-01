<?php

namespace App\Imports;

use App\Models\Insecticide;
use Maatwebsite\Excel\Concerns\ToModel;

class InsecticidesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Insecticide([
            //
            'insecticide_code'        => $row[0],
            'insecticide_name'        => $row[1],
            'insecticide_ingredient'        => $row[2],
            'insecticide_dosage'        => $row[3],
            'insecticide_indication'        => $row[4],
            'insecticide_age'        => $row[5],
            'insecticide_amount'        => $row[6],
            'insecticide_producer'        => $row[7],
            'insecticide_produce_date'        => $row[8],
            'insecticide_expiry_date'        => $row[9],
            'insecticide_price'        => $row[10],
            'insecticide_notes'        => $row[11],
            'category_id'        => $row[12]

        ]);
    }
}
