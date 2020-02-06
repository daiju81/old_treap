<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\GroupUser;
use App\Group;


class WelcomeController extends Controller
{
    //
    public function index() {
      $user_id = Auth::id();
      $groupuser = GroupUser::where('user_id', $user_id)->get();
      foreach($groupuser as $key => $item) {
        $group_id[$key] = $item->group_id;
        $groupdetails[$key] = Group::findorFail($group_id[$key]);
      }
      // dd($groups);
      // dd($groupdetails[0]);
      return view('top', compact('groupdetails'));
    }
}
