<?php

namespace App\Http\Controllers\Site;

use App\Date\Common;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Order;
use App\Models\Ward;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends BaseController
{

    public function index()
    {
        $infoAdress = Ward::with(['district','users'])->withAndWhereHas('district', function ($query) {             // withAndWhereHas from Room Model function
            $query->with('city');
        })->withAndWhereHas('users', function($q) {
            $q->where('id','=', Auth::user()->id);
        })
        ->get();
        
        $districts = District::all();
        $cities = City::all();
        $wards = Ward::with('district')->withAndWhereHas('district', function($q1) {
            $q1->with('city');
        })->get();

        $this->setPageTitle('Account Settings','Account Settings');
        return view('site.accounts.index',compact('infoAdress', 'districts', 'cities','wards'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->birth = Common::convertStr2Date($request->get('datetimepicker'));
        $user->gender = $request->get('gender');
        $user->ward_id = $request->get('ward');

        $user->update();

        if (!$user) {
            return $this->responseRedirectBack('Error occurred while update user.', 'error', true, true);
        }
        return $this->responseRedirect('site.accounts.index', 'Update user successfully', 'success', false, false);
    }

    public function getOrders()
    {
        $orders = auth()->user()->orders;

        return view('site.accounts.orders', compact('orders'));
    }

    public function showOrder($orderNumber)
    {
        $order = Order::where('order_number',$orderNumber)->first();
        $this->setPageTitle("Show my order","Show my order");
        return view('site.accounts.showOrder',compact('order'));
    }
}
