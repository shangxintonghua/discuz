<?php
	include 'zhu_modidata.php';
	include './config.inc.php';
	include './uc_client/client.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>登录 | 无敌汽车网</title>
   <link rel="stylesheet" type="text/css" href="./css/ucer.css">
   <link rel="stylesheet" type="text/css" href="./css/common.css"/>
   <link rel="shortcut icon" href="http://www.modiauto.com.cn/favicon.ico"/>
</head>
<body>

<div style="display:;">
<?php

$U="http%3A//www.modiauto.com.cn/html/guide/1311/34775.html";

echo str_replace("http%3A//","http://",$U);


if($_COOKIE[modi_user]){
	//echo "<meta http-equiv=refresh content='0; url=http://id.modiauto.com.cn'>"; 
	//exit();
}else{
	
	//echo "<meta http-equiv=refresh content='0; url=http://bbs.modiauto.com.cn/member.php?mod=logging&action=login'>"; 
	//exit();
}

?>
</div>

</body>
</html>
