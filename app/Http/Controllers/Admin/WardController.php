<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Imports\WardsImport;
use App\Models\Ward;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class WardController extends BaseController
{
    public function index()
    {
        $wards = Ward::with('district')->get();
        return view('admin.wards.index',compact('wards'));
    }

    public function import(Request $request)
    {
        Excel::import(new WardsImport, $request->file('file'));
        return $this->responseRedirect('admin.wards.index', 'Ward import successfully', 'success', false, false);
    }
}
