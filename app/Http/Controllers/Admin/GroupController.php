<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Category;
use App\Models\Group;
use App\Models\GroupUser;
use GMP;
use Illuminate\Http\Request;
use DB;
class GroupController extends BaseController
{
    public function index()
    {
        $groups = Group::with(['category', 'users'])->withCount('users')->get();
        $categories = Category::all();
        
        $this->setPageTitle('Group index','Group index');

        return view('admin.groups.index',compact('groups','categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'group_code' => 'required',
            'group_name' => 'required',
            'category_id' => 'required',
        ]);

        $group = new Group();
        $group->group_code = $request->get('group_code');
        $group->group_name = $request->get('group_name');
        $group->group_description = $request->get('group_description');
        $group->group_is_private = $request->get('group_is_private');
        $group->category_id = $request->get('category_id');
        if ($request->hasFile('group_avatar')) {
            $image = $request->file('group_avatar');
            $image->storeAs('public/group_avatar/', $image->getClientOriginalName());
        }
        $group->group_avatar = $image->getClientOriginalName();

        $group->save();

        if (!$group) {
            return $this->responseRedirectBack('Error occurred while creating post.', 'error', true, true);
        }
        return $this->responseRedirect('admin.groups.index', 'Group added successfully', 'success', false, false);
    }

    public function edit($id)
    {
        return;
    }

    public function update(Request $request, $id)
    {
        $group = Group::find($id);
        $group->group_code = $request->get('group_code');
        $group->group_name = $request->get('group_name');
        $group->group_description = $request->get('group_description');
        $group->group_is_private = $request->get('group_is_private');
        $group->category_id = $request->get('category_id');
        $group->update();
        if (!$group) {
            return $this->responseRedirectBack('Error occurred while update group.', 'error', true, true);
        }
        return $this->responseRedirectBack('Update group successfully', 'success', false, false);
    }

    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();
        if (!$group) {
            return $this->responseRedirectBack('Error occurred while delete post.', 'error', true, true);
        }
        return $this->responseRedirect('admin.groups.index', 'Group deleted successfully', 'success', false, false);
    }

    public function show($id)
    {
        $categories = Category::all();

        $group = Group::with(['category','posts','users'])
        ->withCount('users')
        // ->withAndWhereHas('posts', function($q){
        //     $q->with(['users','comments'])->withCount('comments');
        // })
        ->find($id);
        // dd($group);
        $this->setPageTitle("Show group","Show group");
        return view('admin.groups.show',compact('group','categories'));
    }

    public function accept($id)
    {
        $group = DB::table('groups')->join('group_users','groups.group_id','=','group_users.group_id')
        ->join('users','group_users.id','=','users.id')
        ->select('group_users.*','users.*')
        ->where([
            ['groups.group_id', $id],
            ['group_users.group_status','=','0']
        ])
        ->get();
        // dd($group);
        $this->setPageTitle("Accept user","Accept user");
        return view('admin.groups.accept',compact('group'));
    }

    public function acceptAjax(Request $request)
    {
        if(request()->ajax()){
            $group = GroupUser::where('group_user_id', $request->get('id'))
            ->update(['group_status' => 1]);

            return response()->json(['success' => 'Accept request join in this group success!']);
        }
    }

}
