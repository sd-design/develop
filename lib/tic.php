<?php



?>

<DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="utf-8">
<title>ТИЦ Яндекс проверка</title>
        <head>
            <style type="text/css">
body{margin:25px;}
.inside{margin:0 auto;display: block;width:777px;}

            </style>
            <body>
                <div class="inside">

<?php

function send_form(){

echo "<h3>Введите адрес сайта</h3>";
    echo "<form action='tic.php' method='post'>

<input type ='hidden' value='checkin' name='action' />
<input type='text' size='35' name='url' />
<input type='submit' value='проверить' />
    </form>";
}


function yandex_tic($url){
        $file=file_get_contents("http://search.yaca.yandex.ru/yca/cy/ch/$url/");
if(preg_match("!&#151;\s+([0-9]{0,8})<\/b>!is",$file,$ok)){
 
            $str=$ok[1];
        }
        else if(preg_match("!<td class=\"current\" valign=\"middle\">(.*?)</td>\n</tr>!si", $file, $ok)){
                if(preg_match("!<td align=\"right\">(.*?)</td>\n</tr>!si", $ok[0], $str)){
            
                    $str=$str[1];
                } else {
                    $str=0;
                }
        }
        else {
            $str=0;
        }

return trim($str);
}


if ($_POST['action']=== "checkin"){

$site = $_POST['url'];

echo yandex_tic($site);

}

else {

send_form();

}


?>
</div>
</body>
</html>
