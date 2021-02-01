<?php

namespace App\Imports;

use App\Models\Food;
use Maatwebsite\Excel\Concerns\ToModel;

class FoodsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Food([
            //
            'food_code'      => $row[0],
            'food_name'      => $row[1],
            'food_description'      => $row[2],
            'food_price'      => $row[3],
            'category_id'      => $row[4]
        ]);
    }
}
