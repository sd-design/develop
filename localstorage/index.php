<?php session_start();



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LOCAL Storage</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/justified-nav.css" rel="stylesheet">

</head>
<body>
<div class="container">
	<div class="masthead">
        <h3 class="text-muted">Ajax localStorage</h3>
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
  <h1>LOCAL STORAGE</h1>
  <p>Пример использования локального хранилища HTML5.</p>
  <p><a class="upload btn btn-info" href="#" role="button">Загрузить данные</a>&nbsp;<a class="get btn btn-warning" href="#" role="button">Посмотреть данные</a></p>
</div>
		<div class="">
		<div id="form" class="form-signin">
	<input type="text" id="inputname" name="namevalue" class="form-control" placeholder="Name of Value" autofocus>
		<input type="text" id="inputvalue" name="value" class="form-control" placeholder="Value of variable" />
	        
<br />
		<button class="subm btn btn-lg btn-primary btn-block">Отправить</button>
	</div>
			<div class="well storage">
	

			</div>
		</div>
</div>

	<script src="js/jquery-1.11.2.min.js"></script>
	<script src="js/jquery.html5storage.min.js"></script>
<script src="js/my_storage.js"></script>
</body>
</html>