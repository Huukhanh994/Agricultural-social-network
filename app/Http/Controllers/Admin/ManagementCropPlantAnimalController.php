<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\CropPlantAnimal;
use App\Models\Product;
use Illuminate\Http\Request;

class ManagementCropPlantAnimalController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CropPlantAnimal::all();
        $product_type = Product::all();

        $this->setPageTitle('Index Crop Plant Animals', 'Index Crop Plant Animals');
        return view('admin.management_crop_plant_animals.index',compact('data','product_type'));
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
        $cpa = new CropPlantAnimal();
        $cpa->crop_plant_animal_code = $request->get('crop_plant_animal_code');
        $cpa->crop_plant_animal_name = $request->get('crop_plant_animal_name');
        $cpa->crop_plant_animal_growth_time	 = $request->get('crop_plant_animal_growth_time');
        $cpa->crop_plant_animal_color = $request->get('crop_plant_animal_color');
        $cpa->crop_plant_animal_weight = $request->get('crop_plant_animal_weight');
        $cpa->crop_plant_animal_height = $request->get('crop_plant_animal_height');
        $cpa->product_id = $request->get('product_id');
        $cpa->save();
        if (!$cpa) {
            return $this->responseRedirectBack('Error occurred while create crop plant animal.', 'error', true, true);
        }
        return $this->responseRedirect('admin.manager_crop_plant_animals.index', 'Crop plant animal creating successfully', 'success', false, false);
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
        $cpa = CropPlantAnimal::with('product')->findOrFail($id);
        $product_type = Product::all();
        $this->setPageTitle('Edit Crop Plant Animals', 'Edit Crop Plant Animals');
        return view('admin.management_crop_plant_animals.edit',compact('cpa','product_type'));
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
        $cpa = CropPlantAnimal::find($id);
        $cpa->crop_plant_animal_code = $request->get('crop_plant_animal_code');
        $cpa->crop_plant_animal_name = $request->get('crop_plant_animal_name');
        $cpa->crop_plant_animal_growth_time     = $request->get('crop_plant_animal_growth_time');
        $cpa->crop_plant_animal_color = $request->get('crop_plant_animal_color');
        $cpa->crop_plant_animal_weight = $request->get('crop_plant_animal_weight');
        $cpa->crop_plant_animal_height = $request->get('crop_plant_animal_height');
        $cpa->product_id = $request->get('product_id');
        $cpa->update();
        if (!$cpa) {
            return $this->responseRedirectBack('Error occurred while update crop plant animal.', 'error', true, true);
        }
        return $this->responseRedirect('admin.manager_crop_plant_animals.index', 'Crop plant animal updating successfully', 'success', false, false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cpa = CropPlantAnimal::find($id);
        $cpa->delete();
        if (!$cpa) {
            return $this->responseRedirectBack('Error occurred while delete crop plant animal.', 'error', true, true);
        }
        return $this->responseRedirect('admin.manager_crop_plant_animals.index', 'Crop plant animal delete successfully', 'success', false, false);
    }
}
