@extends('layouts.app')

@section('content')


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}

                        </div>
                    @endif


<img src="" alt="ファーストビュー">


<div class="container">
  <div class="catchcopy text-center">
    <p>Treapは仲間との思い出を</p>
    <p>デジタルフォトアルバムとして</p>
    <p>記憶に残すサービス</p>
@auth

<a class="" href="/">ユーザーページ</a>

@endauth
  </div>


@guest

  <div class="text-center">
    <button type="submit" class="mx-auto submit text-center btn btn-primary">
      {{ __('Login') }}
    </button>
  </div>
</div>
@endguest


@endsection
