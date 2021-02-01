<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $data = Admin::orderBy('admin_id', 'DESC')->paginate(5);
        return view('admin.admins.index', compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.admins.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $admin = Admin::create($input);
        // dinh kem vai tro cho nguoi dung nay
        $admin->assignRole($request->input['roles']);

        return redirect()->route('admins.index')->with('success', 'Create new user with role successfully!');
    }
    public function edit($id)
    {
        $admin = Admin::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $adminRole = $admin->roles->pluck('name', 'name')->all();

        return view('admin.admins.edit', compact('admin', 'roles', 'adminRole'));
    }

    public function show($id)
    {
        $admin = Admin::find($id);
        return view('admin.admins.show', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        // neu co password moi thi tien hanh Hash password again
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }
        $admin = Admin::find($id);
        $admin->update();
        // Xoa role cua nguoi dung nay, sau do tien hanh them quyền mới lại
        // params model_id == user_id
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        // assign role again for user
        $admin->assignRole($request->input('roles'));
        return redirect()->route('admins.index')->with('success', 'Update admin info with role successfully!');
    }

    public function destroy($id)
    {
        $admin = Admin::find($id)->delete();

        return redirect()->route('admins.index')->with('success', 'Delete admin successfully!');
    }
}
