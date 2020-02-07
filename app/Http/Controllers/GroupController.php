<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\GroupUser;
use App\User;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    //
    public function create() {
      return view('groups.create');
      // return redirect('groups/store', compact('data'));
    }
    public function store(Request $request) {
      // dd($request->group_name);
      // $inputs = \Request::all();
      // dd($inputs);
      $group  = new Group();
      $group->name = $request->group_name;
      // dd(Auth::id());
      $group->host_user_id = Auth::id();
      // dd($request);
      $group->save();

      $groupuser = new GroupUser();
      $groupuser->group_id = $group->id;
      $groupuser->user_id = $group->host_user_id;

      $groupuser->save();

      // return redirect('group/{{$group->id}}');
      // dd($group->id);

      return redirect()->route('groups.show', [$group->id]);
    }
    public function index() {
      return view('posts.index');
    }
    public function show($id) {
       $group = Group::findOrFail($id);
       $group_member = GroupUser::where('group_id', $group->id)->get();
      //  dd($group->id);
      //  dd($group_member);
       foreach($group_member as $key => $group_member) {
        $users_name[$key] = User::findOrFail($group_member->user_id);
       }
       if(isset($group_member)) {
         return view('groups.show', compact('group', 'users_name'));
        } else {
          return view('groups.show', compact('group'));
       }
      // return redirect()->route('groups.show', [$group->id]);
    }
    public function destroy($id) {
      $post = Post::findOrFail($id);
      $post->delete();
      return redirect('posts');
    }
}
