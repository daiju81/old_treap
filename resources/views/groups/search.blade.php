<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ユーザー検索　-グループ作成-</title>
</head>
<body>
<h1>検索</h1>
{!! Form::open(['route' => 'search', 'method' => 'get']) !!}
  <div class="form-group">
      {!! Form::label('text', '識別ID:') !!}
      {!! Form::text('identification_id' ,'', ['placeholder' => '識別ID'] ) !!}
      <!-- {!! Form::hidden('group_id' ,'', ['value' => $_GET['group_id']] ) !!} -->
      <input type="hidden" name="group_id" value="{{ $_GET['group_id'] }}">
  </div>
{!! Form::submit('検索') !!}
{!! Form::close() !!}


@if(!empty($data))
                    <div class="my-2 p-0">
                        <div class="row  border-bottom text-center">
                            <div class="col-sm-4">
                                <p>ユーザ名</p>
                            </div>
                        </div>
<!-- //検索条件に一致したユーザを表示します -->
<?php  $user_id = 0 ?>
                        @foreach($data as $item)
                                <div class="row py-2 border-bottom text-center">
                                    <div class="col-sm-4">
                                        <p>{{ $item->name }}</p>
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <?php $user_id = $item->id ?>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                    <!-- <a href="groupmembers/add", >グループに追加</a> -->
                    <!-- <a href="{{ url('groupmembers/add')}}">グループに追加</a> -->

                    <a href="" onclick="document.form2.submit();return false;">グループ追加</a>
                    <form name="form2" method="get" action="/groupmembers/add">
                      <input type=hidden name="group_id" value="{{ $group_id }}">
                      <input type=hidden name="user_id" value="{{ $user_id }}">
                    </form>



                @endif
</body>
</html>