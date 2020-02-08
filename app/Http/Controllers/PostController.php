<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;



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
      $posts = Post::where('group_id', $post->group_id)->get();


      return view('posts.store.index', compact('posts'));

    }
    public function index(Request $request) {

      // if (Session::has('group_id')) {
        // $group_id = session()->get('group_id');
        // dd(session('group_id'));
      // }
      // dd($group_id);
      // dd('ja');

      if(!empty($group_id)) {
        $posts = Post::where('group_id', $group_id)->get();
        $count = DB::table('posts')->where('group_id', $group_id)->count();
      } else {
        $group_id = $_GET['group_id'];
        $posts = Post::where('group_id', $group_id)->get();
        $count = DB::table('posts')->where('group_id', $group_id)->count();
      }
      $posts = Post::where('group_id', $group_id)->get();

      if($count==0) {
        return view('posts.index', compact('count'));

      }
        return view('posts.index', compact('posts'));


      // return view('posts.index', compact('posts'));
      // return view('posts.index', compact('posts'));
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
