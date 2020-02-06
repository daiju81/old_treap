<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

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
      return view('groups.show', compact('group'));
    }
    public function destroy($id) {
      $post = Post::findOrFail($id);
      $post->delete();
      return redirect('posts');
    }
}
