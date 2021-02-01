<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CitiesImport;
class CityController extends BaseController
{
    public function index()
    {
        $cities = City::all();
        return view('admin.cities.index',compact('cities'));
    }

    public function import(Request $request)
    {
        Excel::import(new CitiesImport, $request->file('file'));
        return $this->responseRedirect('admin.cities.index', 'City import successfully', 'success', false, false);
    }
}
