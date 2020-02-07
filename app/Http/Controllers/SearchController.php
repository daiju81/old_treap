<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class SearchController extends Controller
{
    //
    public function index(Request $request){
      // $query = User::query();

// $request->input()で検索時に入力した項目を取得します。
      $identification_id = $request->input('identification_id');
      $data = User::where('identification_id', $identification_id)->get();
      // dd($group_id);
              // ユーザ名入力フォームで入力した文字列を含むカラムを取得します
      // if ($request->has('identification_id') && $search != '') {
          // $query->where('identification_id', '='.$search.'')->get();
      // }

      // $data = $query-
      // $group_id = $request->input('group_id');
      // $group_id = $this->route('group_id');
      $group_id = $_GET['group_id'];
        return view('groups.search', compact('data', 'group_id'));
    }
}
