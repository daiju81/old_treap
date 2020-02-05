<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>{{ $post->text }}</h1>
  <div>

  </div>
  <a href="{{ route('posts.index') }}">一覧へ戻る</a>
</body>
</html>