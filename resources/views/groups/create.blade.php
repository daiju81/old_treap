<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>グループ作成</title>
</head>
<body>


    <form method="POST" action="http://127.0.0.1:8000/groups" accept-charset="UTF-8">
    @csrf



<div class="form-group">
<label for="group">group名:</label>
<input class="form-control" name="group_name" type="text" required>
</div>

<div class="form-group">
<input type="submit">
</div>





</body>
</html>