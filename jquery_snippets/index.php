<?php session_start();



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>JQuery snippets</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/justified-nav.css" rel="stylesheet">

</head>
<body>
<div class="container">
	<div class="masthead">
        <h3 class="text-muted">JQuery snippets</h3>
        <nav>
          <ul class="nav nav-justified" id="menu">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#" class="openvideo">Videos</a></li>
            <li><a href="#" class="openposts">Posts</a></li>
              <li><a href="#" class="about">About</a></li>
            <li><a href="#" class="contacts">Contact</a></li>
          </ul>
        </nav>
      </div>
<div class="jumbotron" id="clean"><div class="place_value">
  <h1 class="my_value">JQuery snippets</h1>
  </div>
  <p>Пример использования JQuery & HTML5.</p>
  <p><a class="upload btn btn-info" href="#" role="button">экшн 1</a>&nbsp;<a class="get btn btn-warning" href="#" role="button">Посмотреть пример</a></p>
</div>
		<div class="">
		<div id="form" class="form-signin">
		<form id="form1">
	<input type="text" id="inputname" name="namevalue" class="form-control" placeholder="Name of Value" autofocus>
		<input type="text" id="inputvalue" name="value" class="form-control" placeholder="Value of variable" />
	        
<br /></form>
		<button class="subm btn btn-lg btn-primary btn-block">Отправить</button>

	</div>
	 <p><a class="btn btn-default" href="#" role="button" id="show_jumbo">показать Jumbotron</a>&nbsp;<a class="get btn btn-warning" href="#" role="button" id="show_storage">Взять объект</a>&nbsp;<a class="get btn btn-info" href="#" role="button" id="return_storage">Вернуть объект</a>&nbsp;<a class="get btn btn-danger" href="#" role="button" id="reload">Обновить страницу</a></p>
			<div class="well storage">
	

			</div>
		</div>
</div>

	<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/my_jquery.js"></script>
</body>
</html>