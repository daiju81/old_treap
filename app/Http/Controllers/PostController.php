<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function create() {
      return view('posts.create');
    }
    public function store(Request $request) {
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
}
