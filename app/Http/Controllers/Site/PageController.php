<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends BaseController
{
    public function index()
    {
        $this->setPageTitle("Page Index","Page Index");
        return view('site.page.index');
    }
}
