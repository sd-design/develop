<?php session_start();



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My First Ajax webproject</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/justified-nav.css" rel="stylesheet">

</head>
<body>
<div class="container">
	<div class="masthead">
        <h3 class="text-muted">My First Ajax webproject</h3>
        <nav>
          <ul class="nav nav-justified" id="menu">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#" class="openvideo">Videos</a></li>
            <li><a href="#" class="openposts">Posts</a></li>
            <li><a href="#">Downloads</a></li>
            <li><a href="#" class="about">About</a></li>
            <li><a href="#" class="contacts">Contact</a></li>
          </ul>
        </nav>
      </div>
<div class="jumbotron" id="clean">
  <h1>AJAX Webproject</h1>
  <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <p><a class="clear btn btn-info" href="#" role="button">Clear all</a></p>
</div>
 <form action="send.php" method="post" accept-charset="utf-8" id="fileupload" enctype="multipart/form-data">
<h4>Добавьте описание к фото</h4>
<textarea class="form-control" name="descript_foto" id ="descript_foto" autofocus></textarea>
<h4>Выберите  номинацию</h4>
<select class="form-control" name="category" id="nomination">
 <option value="0">Номинация</option>
    <option value="1">Природа</option>
    <option value="2">Человек</option>
    <option value="3">Животный мир</option>
    <option value="4">Неживое</option>
    <option value="5">Черно-белое</option>
    <option value="6">Спасибо бабушке и деду за нашу великую победу</option>
  </select>
<br>
<button type="button"  class="btn btn-lg btn-info pull-right" style="display: none;" id="go_check">отослать на модерацию</button>
 </form>
 <br>
 <div id="result_registration" class="alert alert-info" style="display:none;"></div>
		<div class="">
			<div class="well gallery">
	

			</div>
		</div>
</div>

	<script src="js/jquery-1.11.2.min.js"></script>
	<script src="js/ajax_form.js"></script>

</body>
</html>