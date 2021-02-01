<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WeatherController extends BaseController
{
    public function index()
    {
        $this->setPageTitle("Weather Index","Weather Index");
        return view('site.weathers.index');
    }
}
