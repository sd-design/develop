<?php session_start();



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajax connect</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/justified-nav.css" rel="stylesheet">

</head>
<body>
<div class="container">

<div class="jumbotron" id="clean">
  <h1>Ajax connect with timeout</h1>
  <p>Using of setInterval() by Jquery ajax to random.php BY method GET</p>
  <p><a class="clear btn btn-info" href="#" role="button">Clear all</a></p>
</div>

 <br>
<div class="col-md-2">
 <div class="alert alert-info">Его зовут:&nbsp;<span id="result_registration" ></span></div></div>

	
</div>

	<script src="js/jquery-1.11.2.min.js"></script>
	<script src="js/ajax_connect.js"></script>

</body>
</html>