<?php

	include_once 'zhu_modidata.php';
    include_once './config.inc.php';
	include_once './uc_client/client.php';

	if(!empty($_COOKIE['MODICERTIFICATE'])) {
        list($Modi_uid, $Modi_username) = explode("\t", uc_authcode($_COOKIE['MODICERTIFICATE'], 'DECODE'));

       } else {
        //返回登陆或者其他操作
        header("location:./login.php");

	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>用户中心 | 无敌汽车网</title>
   <link rel="stylesheet" type="text/css" href="./css/ucer.css">
   <link rel="stylesheet" type="text/css" href="./css/common.css"/>
   <link rel="shortcut icon" href="http://www.modiauto.com.cn/favicon.ico"/>
</head>
<body>
<?php if (!$_SESSION[pop_money]):?>
    <div class="pop" style="display: none; width: 600px; margin-top: 10%; margin-left: 35%;	margin-right: auto;	margin-bottom: 30%;		 background-color: #CC3300; display: block; text-align: center; vertical-align: middle; position: absolute; z-index: 9000; background-position:initial; background-repeat: initialfilter:alpha(opacity=50); /*IE滤镜，透明度50%*/-moz-opacity:0.5; /*Firefox私有，透明度50%*/opacity:0.5;/*其他，透明度50%*/ initial; top: 16px;color: #FFFFFF;	padding-top: 50px;	padding-bottom: 50px;">每天登陆获取无敌币1枚</div>
<?php endif;?>

<?php include 'include_user_top.php';?>

<div class="main_wrapper" style="margin-top:20px;">

	<?php include 'include_user_banner.php';?>

	<?php include 'include_user_left.php';?>
		
	<div class="rightmain_wrap">

<?php
	switch($_GET['a']) {
		
		case '':
			//UCenter 首页代码
			include 'code/center_index.php';
		break;
		
		case 'parts':
			//UCenter 改件仓库-收藏代码
			include 'code/parts.php';
		break;
		case 'my_article':
			//UCenter 文章-收藏代码
			include 'code/my_article.php';
		break;
		case 'logout':
			//UCenter 用户退出的代码
			include 'code/logout.php';
		break;
		case 'footmark':
			//UCenter 用户文章足迹代码
			include 'code/footmark.php';
		break;
		case 'register':
			//UCenter 用户注册的代码
			include 'code/register_db.php';
		break;
		case 'pmlist':
			//UCenter 未读短消息列表的代码
			include 'code/pmlist.php';
		break;
		case 'pmwin':
			//UCenter 短消息中心的代码
			include 'code/pmwin.php';
		break;
		case 'friend':
			//UCenter 好友的代码
			include 'code/friend.php';
		break;
		case 'avatar':
			//UCenter 设置头像的代码
			include 'code/avatar.php';
		break;
		case 'mycar':
			//UCenter 我的爱车代码
			include 'code/mycar.php';
		break;
		case 'friends':
			//UCenter 我的好友代码
			include 'code/friends.php';
		break;
	}
?>

	</div>
</div>

<div class="clear_f"></div>
<?php 

if($_SESSION[pop_money]){}else{$_SESSION[pop_money]='1';}

include 'include_user_end.php';

?>
</body>


<script type="text/javascript" charset="utf-8" src="http://common.modiauto.com.cn/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" charset="utf-8" src="http://common.modiauto.com.cn/js/chained.js"></script>
<script type="text/javascript" src="http://common.modiauto.com.cn/js/selectlist.js"></script>
<script type="text/javascript" src="./js/user_center.js"></script>
<script type="text/javascript">
	$(function () {
		$("#brand").chained("#area");
		$("#series").chained("#brand");
		
		$("#model").chained("#mark");
		$("#algebra").chained("#model");
	});
</script>
<script type="text/javascript">
    $ (function ()
    {
        $ ('div.pop').show ().delay (3000).fadeOut (); 
    });
</script>
<script>

  autosize(document.querySelectorAll('textarea'));

</script>
</html>