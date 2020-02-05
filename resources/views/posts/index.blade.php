<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  @foreach($posts as $post)
        <article>
            <h2>
                <a href="{{ url('posts', $post->id) }}">
                    {{ $post->text }}
                </a>
            </h2>
        </article>
  @endforeach

</head>
<body>
</body>
</html>