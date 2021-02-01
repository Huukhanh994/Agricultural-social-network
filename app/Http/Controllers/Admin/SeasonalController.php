<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Seasonal;
use App\Models\Year;
use Illuminate\Http\Request;
use App\Date\Common;
class SeasonalController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seasonals = Seasonal::withCount('days')->with(['days','year', 'weathers'])->get();
        $years = Year::all();
        $this->setPageTitle('Seasonal Index','Seasonal Index');
        return view('admin.seasonals.index',compact('seasonals','years'));
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
        $array_day = Common::setValueFromStart2EndTime($request->get('schedule_time'), $request->get('schedule_time'));
        $season = new Seasonal();
        $season->season_code = $request->get('season_code');
        $season->season_name = $request->get('season_name');
        $season->season_note = $request->get('season_note');
        $season->season_start_date = $array_day[0];
        $season->season_end_date = $array_day[1];
        $season->year_id = $request->get('year_id');
        $season->save();
        if (!$season) {
            return $this->responseRedirectBack('Error occurred while creating season.', 'error', true, true);
        }
        return $this->responseRedirect('admin.seasonals.index', 'Season added successfully', 'success', false, false);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $season = Seasonal::withCount('days')->with(['days', 'year', 'weathers'])->findOrFail($id);
        $years = Year::all();
        $this->setPageTitle('Seasonal Show','Seasonal Show');
        return view('admin.seasonals.show', compact('season','years'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $season = Seasonal::withCount('days')->with(['days', 'year', 'weathers'])->findOrFail($id);
        $years = Year::all();
        $schedule_time = Common::getValueFromStart2EndTime($season->season_start_date,$season->season_end_date);
        $this->setPageTitle('Seasonal Edit', 'Seasonal Edit');
        return view('admin.seasonals.edit',compact('season', 'years', 'schedule_time'));
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
        $array_day = Common::setValueFromStart2EndTime($request->get('schedule_time'), $request->get('schedule_time'));
        $season = Seasonal::findOrFail($id);   
        $season->season_code = $request->get('season_code');
        $season->season_name = $request->get('season_name');
        $season->year_id = $request->get('year_id');
        $season->season_note = $request->get('season_note');
        $season->season_start_date = $array_day[0];
        $season->season_end_date = $array_day[1];
        $season->update();
        if (!$season) {
            return $this->responseRedirectBack('Error occurred while updating season.', 'error', true, true);
        }
        return $this->responseRedirect('admin.seasonals.index', 'Season updating successfully', 'success', false, false);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $season = Seasonal::find($id);
        $season->delete();
        if (!$season) {
            return $this->responseRedirectBack('Error occurred while delete season.', 'error', true, true);
        }
        return $this->responseRedirect('admin.seasonals.index', 'Season delete successfully', 'success', false, false);
    }
}
