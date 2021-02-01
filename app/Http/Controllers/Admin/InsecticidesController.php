<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Imports\InsecticidesImport;
use App\Models\Insecticide;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class InsecticidesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insecticides = Insecticide::all();
        $this->setPageTitle('Index insecticides','Index insecticides');
        return view('admin.insecticides.index',compact('insecticides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function import()
    {
        $import = Excel::import(new InsecticidesImport, request()->file('file'));

        if (!$import) {
            return $this->responseRedirectBack('Error occurred while import insecticide data.', 'error', true, true);
        }
        return $this->responseRedirect('admin.insecticides.index', 'Import insecticide data successfully', 'success', false, false);
    }
}
