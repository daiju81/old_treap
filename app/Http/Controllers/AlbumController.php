<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Post;
use Illuminate\Support\Facades\DB;


class AlbumController extends Controller
{
    //
    public function index(Request $request) {




      $group_id = $request->group_id;



      if(!empty($group_id)) {
        $posts = Post::where('group_id', $group_id)->get();
        foreach($posts as $post) {
          $post_id[] = $post->id;
        }
        $count = DB::table('posts')->where('group_id', $group_id)->count();
      }
      for($i=0; $i<$count; $i++) {
        $AlbumImages[] = Image::where('post_id', $post_id[$i])->get();
      }



      return view('album.index', compact('AlbumImages'));



    }
}
