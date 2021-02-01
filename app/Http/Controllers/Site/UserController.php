<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete',['only' => ['index','store']]);
        $this->middleware('permission:user-create',['only' => ['create','store']]);
        $this->middleware('permission:user-show',['only' => ['show']]);
        $this->middleware('permission:user-edit',['only' => ['edit','update']]);
        $this->middleware('permission:user-delete',['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $data = User::orderBy('id', 'DESC')->paginate(5);
        return view('admin.users.index', compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        // dinh kem vai tro cho nguoi dung nay
        $user->assignRole($request->input['roles']);

        return redirect()->route('users.index')->with('success','Create new user with role successfully!');
    }
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('admin.users.edit',compact('user','roles','userRole'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        // neu co password moi thi tien hanh Hash password again
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }
        $user = User::find($id);
        $user->update();
        // Xoa role cua nguoi dung nay, sau do tien hanh them quyền mới lại
        // params model_id == user_id
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        // assign role again for user
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')->with('success','Update user info with role successfully!');
    }

    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')->with('success','Delete user successfully!');
    }
}
