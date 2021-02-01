<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\City;
use App\Models\District;
use App\Models\User;
use App\Models\Ward;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ManagementUsersController extends BaseController
{
    use UploadAble;

    public function index()
    {
        $users = User::latest()->get();
        $this->setPageTitle('Management Users', 'Management Users');
        return view('admin.management_users.index', compact('users'));
    }

    public function edit($id)
    {
        $this->setPageTitle('Edit User', 'Edit User');
        $user = User::with(['wards'])->withAndWhereHas('wards', function ($query) {             // withAndWhereHas from Room Model function
            $query->with('district')->withAndWhereHas('district', function ($query) {             // withAndWhereHas from Room Model function
                $query->with('city');
            });
        })
        ->findOrFail($id);
        $wards = Ward::all();
        $districts = District::all();
        $cities = City::all();
        return view('admin.management_users.edit', compact('user','wards','districts','cities'));
    }

    
    public function store(Request $request)
    {
        $this->setPageTitle('Store User','Store User');
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->gender = $request->get('gender');
        $user->status = $request->get('status');
        $user->birth = $request->get('birth');
        $user->password = Hash::make('password');
        if ($request->hasFile('user_avatar')) {
            $image = $request->file('user_avatar');
            // $filename = time() . '.' . $image->getClientOriginalExtension();
            // $request->user_avatar->storeAs('/public/users/', $filename);
            $image->move(public_path() . '/storage/users-avatar/', $image->getClientOriginalName());
            $user->avatar = $filename;
        };
        $user->save();
        if (!$user) {
            return $this->responseRedirectBack('Error occurred while creating user.', 'error', true, true);
        }
        return $this->responseRedirect('admin.manager_users.index', 'User added successfully', 'success', false, false);
        
    }

    public function update(Request $request, $id)
    {
        $this->setPageTitle('Store User', 'Store User');
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->gender = $request->get('gender');
        $user->status = $request->get('status');
        $user->birth = $request->get('birth');
        $user->ward_id = $request->get('ward_id');
        if ($request->hasFile('user_avatar')) {
            $image = $request->file('user_avatar');
            // $filename = time() . '.' . $image->getClientOriginalExtension();
            // $request->user_avatar->storeAs('/public/users/', $filename);
            $image->move(public_path() . '/storage/users-avatar/', $image->getClientOriginalName());
            $user->avatar = $filename;
        };
        $user->update();
        if (!$user) {
            return $this->responseRedirectBack('Error occurred while updating user.', 'error', true, true);
        }
        return $this->responseRedirect('admin.manager_users.index', 'User updating successfully', 'success', false, false);
        
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        if (!$user) {
            return $this->responseRedirectBack('Error occurred while delete user.', 'error', true, true);
        }
        return $this->responseRedirect('admin.manager_users.index', 'User delete successfully', 'success', false, false);
    }

    public function import(Request $request)
    {
        Excel::import(new UsersImport, $request->file('file'));
        return $this->responseRedirect('admin.manager_users.index', 'User updating successfully', 'success', false, false);
    }
}
