<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>投稿ページ</title>
</head>
<body>

  <!-- {!! Form::open(['route'=>'posts.store']) !!} -->
  <form action="http://127.0.0.1:8000/posts" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" name="image">
  @csrf
  <div>
  <label for="image">画像ファイル（複数可）:</label>
    <input type="file" class="form-control" name="files[][image]" multiple>
    <!-- <input type="file" name="image"> -->


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

  </form>
  <a class="" href="/">ユーザーページ</a>

</body>
</html>