<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name' => $row["name"],
            'email' => $row["email"],
            'birth' => $row["birth"],
            'gender' => $row["gender"],
            'tel' => $row["tel"],
            'address' => $row["address"],
            'password' => Hash::make($row["password"]),
        ]);
    }
}
