<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\GroupUser;
use App\User;

class GroupController extends Controller
{
    //
    public function create(Request $request) {
      dd($request);
      $data = $request->id;
      return redirect('groups/store', compact('data'));
    }
    public function store(Request $request) {
      dd($request);
      $inputs = \Request::all();
      $post  = new Post();
      $post->text = $request->text;
      $post->post_date = Carbon::today();
      $post->user_id = Auth::user()->id;
      $post->save();
      return redirect('posts');

    }
    public function index() {
      return view('posts.index');
    }
    public function show($id) {
       $group = Group::findOrFail($id);
       $group_member = GroupUser::where('group_id', $group->id)->get();
       foreach($group_member as $key => $group) {
        $user_name[$key] = User::findOrFail($group->user_id);
       }
      return view('groups.show', compact('group', 'user_name'));
    }
    public function destroy($id) {
      $post = Post::findOrFail($id);
      $post->delete();
      return redirect('posts');
    }
}
