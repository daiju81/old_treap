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
<!-- 　　　　　　　　　　　　　　//検索条件に一致したユーザを表示します -->
                        @foreach($data as $item)
                                <div class="row py-2 border-bottom text-center">
                                    <div class="col-sm-4">
                                        <a href="">{{ $item->name }}</a>
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                    </div>
                                </div>
                        @endforeach
                    </div>
                    <a href="groups/create">グループに追加</a>
                @endif
</body>
</html>