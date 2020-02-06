<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class SearchController extends Controller
{
    //
    public function index(Request $request){
      // $query = User::query();

// 　　　　$request->input()で検索時に入力した項目を取得します。
      $identification_id = $request->input('identification_id');
      $data = User::where('identification_id', $identification_id)->get();

      // dd($data);
              // ユーザ名入力フォームで入力した文字列を含むカラムを取得します
      // if ($request->has('identification_id') && $search != '') {
          // $query->where('identification_id', '='.$search.'')->get();
      // }

      // $data = $query-

              return view('groups.search', compact('data'));
          }
}
