<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">
  <title>Title</title>
  <style>
    #magazine{
	width: 800px;
	height: 400px;
}
#magazine .turn-page{
	background-color:#ccc;
}
  </style>

    <script
    src="https://code.jquery.com/jquery-3.4.1.slim.js"
    integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI="
    crossorigin="anonymous"></script>

  <script src="/js/turn.js"></script>
  <script
  integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI="
  crossorigin="anonymous"></script>
<script src="/js/my_script.js"></script>
</head>
<body>
  <main>
			<div id="image_turn"">


      @foreach($AlbumImages as $AlbumImage)


				<div>
          <img style="width:90%; height: 200px;" src="{{ $AlbumImage[0]->name }}" alt="album">
				</div>

      @endforeach







			<ul>
				<li>
					<span id="prevpage">前のページ</span>
				</li>
				<li>
					<span id="nextpage">次のページ</span>
				</li>
			</ul>
  </main>



</body>
</html>