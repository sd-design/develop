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
		<div class="">
			<div class="well gallery">
	

			</div>
		</div>
</div>

	<script src="js/jquery-1.11.2.min.js"></script>
	<script src="js/videogallery.js"></script>

</body>
</html>