<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>投稿ページ</title>
</head>
<body>

  {!! Form::open(['route'=>'posts.store']) !!}

  <div>
  投稿画像
  {!! Form::image('image',null) !!}

 投稿メッセージ
  {!! Form::text('text',null) !!}
  </div>
  <input type=hidden name="group_id" value="{{ $group_id }}">

  <!-- <div>
  画像:
  {!! Form::image('image') !!}
  </div> -->

  {!! Form::submit('送信') !!}
  {!! Form::close() !!}

</body>
</html>