<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Session;

class PostController extends Controller
{
    //
    public function create() {
      $group_id = $_GET['group_id'];
      return view('posts.create', compact('group_id'));
    }
    public function store(Request $request) {
      $inputs = \Request::all();
      // dd(\Request::input('group_id'));

      $post  = new Post();
      $post->text = $request->text;
      $post->post_date = Carbon::today();
      $post->user_id = Auth::user()->id;
      $post->group_id = \Request::input('group_id');
      $post->save();
      // $posts = Post::where('group_id', $post->group_id);
      $posts = Post::where('group_id', $post->group_id)->get();

      // return redirect('posts');
      // dd($post->group_id);
      // return redirect()->route('posts/', [$post->group_id]);
      // return redirect('posts', compact('posts'));
      // return redirect()->action('PostController@index', ['group_id'=>$post->$group_id]);
      // return redirect('posts');
      // return redirect(ro ute('posts', ['posts'=>$posts]));

      // Session::put('group_id', $post->group_id);
      return view('posts.index', compact('posts'));

    }
    public function index(Request $request) {
      // if (Session::has('group_id')) {
        // $group_id = session()->get('group_id');
        // dd(session('group_id'));
      // }
      // dd($group_id);
      // dd('ja');
      $posts = Post::where('group_id', $group_id);
      // return view('posts.index', compact('posts'));
      return view('posts.index', compact('posts'));
    }
    public function show($id) {
      $post = Post::findOrFail($id);
      return view('posts.show', compact('post'));
    }
    public function destroy($id) {
      $post = Post::findOrFail($id);
      $post->delete();
      return redirect('posts');
    }
}
