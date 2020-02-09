<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  {{$i = 0}}

  @foreach($posts as $post)
      <article>
      <!-- <img src="" alt=""> -->
          <h2>
              <a href="{{ url('posts', $post->id) }}">
                  {{ $post->text }}
              </a>
          </h2>
      </article>
  {{ $group_id = $post->group_id }}
  {{ $group_id = $post->group_id }}
  @if ($searchpost[$i][0]->name)
  <img src="{{$searchpost[$i][0]->name}}" alt="">
  {{ $searchpost[$i][0]->name }}
  @endif
{{ $i++ }}

  @endforeach


  <a href="" onclick="document.form4.submit();return false;">POST</a>
  <form name="form4" method="get" action="/posts/create">
    <input type=hidden name="group_id" value="{{ $group_id }}">
  </form>

</head>
<body>
</body>
</html>