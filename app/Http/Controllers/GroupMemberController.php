<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GroupUser;
use App\Group;
use App\User;


class GroupMemberController extends Controller
{
    //
    public function add() {

      // $group  = GroupUser::findOrFail($id);
      // $group  = new GroupUser();
      // dd(Auth::id());
      // dd($request);



      $groupuser = new GroupUser();
      $groupuser->group_id = $_GET['group_id'];
      $groupuser->user_id = $_GET['user_id'];
      $groupuser->save();
      $group = Group::findorFail($groupuser->group_id);


      $group_member = GroupUser::where('group_id', $group->id)->get();
      //  dd($group->id);
      //  dd($group_member);
       foreach($group_member as $key => $group_member) {
        $users_name[$key] = User::findOrFail($group_member->user_id);
       }
      //  if(isset($group_member)) {
      //    return view('groups.show', compact('group',));
      //  } else {
      //    return view('groups.show', compact('group', 'users_name'));
      //  }

         return view('groups.show', compact('group', 'users_name'));


      // return view('groups.show', compact('group'));
    }

    public function store($group_id) {
      $group = Group::findorFail($group_id);
      return view('groups.show', compact('group'));

    }
}
