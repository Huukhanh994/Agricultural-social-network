<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Date\Common;
class LoginController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLogin()
    {
        $this->setPageTitle('Login','Login');
        return view('site.auth.login');
    }

    public function showRegister()
    {
        $this->setPageTitle('Register', 'Register');
        return view('site.auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return redirect()->intended(route('site.pages.home'));
        }
        return back()->withInput($request->only('email', 'remember'));
        
    }

    public function storeRegister(Request $request)
    {
        $user = new User();
        $user->name   = $request->get('name');
        $user->last_name    = $request->get('last_name');
        $user->birth        = Common::convertStr2Date($request->get('datetimepicker'));
        $user->gender       = $request->get('gender');
        $user->email        = $request->get('email');
        $user->password     = Hash::make($request->get('password'));
        
        $user->save();
        if (!$user) {
            return $this->responseRedirectBack('Error occurred while register user.', 'error', true, true);
        }
        return $this->responseRedirect('site.login.showLogin', 'Register user successfully', 'success', false, false);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }


}
