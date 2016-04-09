<!DOCTYPE html>
<html lang="ru">
<head>
<title>PHP coder</title>
</head>
<body>
<?php
if (isset($_POST['huk']) && $_POST['huk']==="gohomeyanki")
		{
			$action=$_POST['action'];
			$number=$_POST['number'];
			$message=$_POST['message'];
			
					if ($action==="sms")  {
					$file = "text.txt";
					$stek = "\n".$message."\n".$action;
					file_put_contents($file, $stek, FILE_APPEND | LOCK_EX);
					
					     
echo $message;
echo $action;							}
							

		}
else {
echo "no stream";
					}

?>

</body>
</html>