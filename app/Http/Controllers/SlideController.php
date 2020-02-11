<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Post;
use Illuminate\Support\Facades\DB;

class SlideController extends Controller
{
    //
    // public function index() {
    //   return view
    // }
    public function index(Request $request) {

      // dd($request->group_id);
      $group_id = $request->group_id;



      if(!empty($group_id)) {
        $posts = Post::where('group_id', $group_id)->get();
        foreach($posts as $post) {
          $post_id[] = $post->id;
        }
        $count = DB::table('posts')->where('group_id', $group_id)->count();
      }
      for($i=0; $i<$count; $i++) {
        $ImageSlides[] = Image::where('post_id', $post_id[$i])->get();
      }

      // foreach($ImageSlides as $ImageSlide) {
        // dd($ImageSlide[0]->id);
        // dd($ImageSlide[0]->name);
      // }


      return view('slide.index', compact('ImageSlides'));


    }
}
