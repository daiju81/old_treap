<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <!-- <div class="top-right links"> -->
                    @auth
                      <div class="top-right links">
                        <a href="{{ url('/home') }}">Home</a>


                        <!-- <a href="" onclick="document.form5.submit();return false;">投稿一覧</a> -->
                        <form name="form5" method="get" action="/posts">
                          <input type=hidden name="group_id" value="{{ $group->id }}">
                          <input type="submit" value="投稿一覧">
                        </from>

                        <!-- <a href="" onclick="document.form3.submit();return false;">投稿</a>
                        <form name="form3" method="get" action="/posts/create">
                          <input type=hidden name="group_id" value="{{ $group->id }}">
                        </from> -->

                      </div>

                      <p>グループ</p>

                      <h1>グループ名</h1>
                      <p>{{ $group->name }}</p>
                      <?php $group_id = $group->id ?>
                      <!-- <a href="/Search">招待</a> -->


                      <!-- <a href="" onclick="document.form1.submit();return false;">招待</a>
                      <form name="form1" method="get" action="/Search">
                      <input type=hidden name="group_id" value="{{$group_id }}">
                      </form> -->
                      <a href="/Search/{{$group_id}}">招待</a>


                      <!-- <a href="" onclick="document.form1.submit(); return false;">招待</a>
                      <form name="form1" method="get" action="/Search">
                        <input type="hidden" name="group_id" value="{{ $group_id }}">
                      </from> -->



                      <p>メンバー</p>

                      @if(!empty($users_name))
                        @foreach($users_name as $user)
                          <div class="row py-2 border-bottom text-center">
                              <div class="col-sm-4">

                                <a href="{{ url('groups', $group->id)}}">{{ $user->name }}</a>
                              </div>
                          </div>
                        @endforeach
                      @endif


                        <!-- <a href="{{ url('/groups/search') }}">Group</a> -->

                    @else
                      <div class="top-right links">
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                          <a href="{{ route('register') }}">Register</a>
                        @endif
                      </div>
                    @endauth
                <!-- </div>  -->

            @endif

            <a href="/">グループ一覧に戻る</a>


        </div>
    </body>
</html>
