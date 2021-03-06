<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Image;

use JD\Cloudder\Facades\Cloudder;



class PostController extends Controller
{
    //
    public function create() {
      $group_id = $_GET['group_id'];
      return view('posts.create', compact('group_id'));
    }
    public function store(Request $request) {
      // $image = Image::create(['name' => "imageName", 'post_id'=>"100"]);
// dd($_POST['group_id']);
// dd($request->image); null


$group_id = $_POST['group_id'];


      $inputs = \Request::all();
      // dd(\Request::input('group_id'));

      $post  = new Post();
      $post->text = $request->text;
      $post->post_date = Carbon::today();
      $post->user_id = Auth::user()->id;
      $post->group_id = \Request::input('group_id');
      $post->save();
      $posts = Post::where('group_id', $post->group_id)->get();





// dd($image);
    //   $image_name = $imagefile->getRealPath();
    //   $image_file = $imagefile->getClientOriginalName();
    //   // Cloudinaryへアップロード
    //   // dd($image_name);
    //   Cloudder::upload($image_name, $image_file);

    //   list($width, $height) = getimagesize($image_name);
    //   // 直前にアップロードした画像のユニークIDを取得します。
    //   $publicId = Cloudder::getPublicId();

    //   $logoUrl = Cloudder::show($publicId, [
    //     'width'     => $width,
    //     'height'    => $height
    // ]);

    // $image->name = $logoUrl;
    // $image->save();




    $i = 0;
    $file_sub = 0;
      $post_id2 = $post->id;

      $test = 0;
      foreach($request->file()['files'] as $key => $value) {
        $test++;
      }
      // dd( count($request->file()['files'] ));

for($c=0;$c<$test;$c++) {
  foreach($request->file() as $key => $value) {

    // dd($value[$i]);
    $image = new Image();
    $image->post_id = $post_id2;

    if($i==0) {
      for($a=0;$a<count($value);$a++) {

        for($b=0; $b<$test; $b++) {
          $image_name[] = $value[$b]['image']->getRealPath();
          $image_file[] = $value[$b]['image']->getClientOriginalName();
        }

      }
    }
    // dd($image_name);複数枚画像name取得完了
      Cloudder::upload($image_name[$i], $image_file[$i]);
      $publicId[$i] = Cloudder::getPublicId();
      $logoUrl = Cloudder::show($publicId[$i], [
        'width'     => 120,
        'height'    => 120
        ]);

        $image->name = $logoUrl;

        $image->save();
        $i++;
  }
}




    // dd($logoUrl);
    // dd($request);

      // foreach ($request->file('files') as $index=> $e) {
      //   $ext = $e['image']->guessExtension();
      //   $filename = "{$image->post_id}_{$index}.{$ext}";
      //   $path = $e['image']->storeAs('images', $filename);
      //   // photosメソッドにより、商品に紐付けられた画像を保存する
      //   $image->images()->create(['path'=> $path]);
      // }


      foreach($posts as $post) {
        $searchpost[] = Image::where('post_id', $post->id)->get();
      }

      return view('posts.store.index', compact('posts', 'searchpost'));


      // return view('posts.store.index', compact('posts'));

    }
    public function index(Request $request) {


      // if (Session::has('group_id')) {
        // $group_id = session()->get('group_id');
        // dd(session('group_id'));
      // }
      // dd($group_id);
      // dd('ja');


      // dd($ImageAll);
      $ImageAll = Image::All();

      if(!empty($group_id)) {
        $posts = Post::where('group_id', $group_id)->get();
        $post_id = $posts[0]->id;
        $count = DB::table('posts')->where('group_id', $group_id)->count();
      } else {
        $group_id = $_GET['group_id'];
        $posts = Post::where('group_id', $group_id)->get();

        if(!isset($posts)) {

          $post_id = $posts[0]->id;
        }
        $count = DB::table('posts')->where('group_id', $group_id)->count();
      }
      $posts = Post::where('group_id', $group_id)->get();

      if(!isset($posts)) {
        foreach($posts as $post) {
          $searchpost[] = Image::where('post_id', $post->id)->get();
        }

      }
      // dd($searchpost[0]);
      // foreach($searchpost as $post) {
        // dd($post[0]->id);
      // }
      if(isset($searchpost)) {
        return view('posts.index', compact('count'));

      } else if($count==0) {


        return view('posts.index', compact('count'));

      }else {
        foreach($posts as $post) {
          $searchpost[] = Image::where('post_id', $post->id)->get();
        }
        return view('posts.index', compact('posts', 'searchpost'));
      }


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
