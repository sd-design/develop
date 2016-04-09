<?php session_start();



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>EVERNote by AJAX</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/signin.css" rel="stylesheet">

</head>
<body>
<div class="container">
<div class="knopka">
<div id="cryptakey"><a class="openkey" href="#"><div class="glyphicon glyphicon-plus"></div></a><br/>
</div>
</div>
	<div class="jumbotron">	
	<h2 class="text-center">My personal Evernote</h2>
<div class="crypt container">
	<div class="input-group">
<input class="crypt_val form-control" type="text" name="crypt_key" placeholder="Yout crypt key"><span class="input-group-btn">
                      <button type="submit" class="btn btn-primary" id="installkey">
                        Ключ
                      </button>
                    </span>
		</div>	
	</div>

	<form id="form" class="form-signin">
	<input type="hidden" name="key" value="" />
	<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Login / Email" required autofocus>
		<input type="text" name="theme" class="form-control" placeholder="Тема" required />
		<textarea class="form-control" name="message" rows="4" required placeholder="Заметка"></textarea>
		        
<br />
		<button class="btn btn-lg btn-primary btn-block" type="submit">Отправить</button>
	</form>
	<div class="form-signin">
		<button class="btn btn-lg btn-warning btn-block" id="list">Список заметок</button>
	</div>
	
		<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center">
				<div class="status"></div>
				</div>
		</div>
		<div class="well" id="pano">
			<div class="text-center">
			<ul class="grid" id="events"></ul>
				</div>
					<div class="row text-center" id="note">
						<div class="col-md-12">
							<pre class="eventinfo"></pre>
						</div>
					</div>
		</div>
	</div>
</div>

	<script src="js/jquery-1.11.2.min.js"></script>
	<script src="js/common.js"></script>

</body>
</html>