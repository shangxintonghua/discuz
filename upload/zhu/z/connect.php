<?php
$host="localhost";
$db_user="root";
$db_pass="";
$db_name="cms";
$timezone="Asia/Shanghai";

$link=mysql_connect($host,$db_user,$db_pass);
mysql_select_db($db_name,$link);
mysql_query("SET names UTF8");
?>