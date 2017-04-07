<?php
	include 'zhu_modidata.php';
	include './config.inc.php';
	include './uc_client/client.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>2222无敌汽车网论坛-无敌汽车网-汽车点滴 尽在无敌-中国汽车文化发源地</title>
<style type="text/css">

.h_login .modiicon {
	height: 55px;
	width: 55px;
	float: left;
	margin-right: 10px;
	border-radius: 50%;
	overflow: hidden;
}
.h_login .nickname a {
	color: #fff;
	text-decoration: none;
}
.h_login .modiuser_login .modiuser {
	padding: 5px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: solid;
	border-left-style: none;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 1px;
	margin-left: 0px;
	width: 92%;
	border-bottom-width: 1px;
	border-bottom-color: #FFFFFF;
	background-color: #FF0006;
}

.h_login .modiuser_login .modilogin {
	height: 53px;
	margin: 0px;
	padding: 5px;
	background-color: #FFF;
	display: block;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	width: 100%;
	letter-spacing: 0em;
	vertical-align: top;
	word-spacing: 0em;
}
.h_login .nickname {
	font-size: 20px;
	margin-top: 0px;
	display: block;
	padding-top: 15px;
}
body {
	margin-left: 0px;
	margin-top: 10px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>
<body>

<div class="h_login" style="display: ;">

                
<?php if(@$_COOKIE['modi_user']){ 

list($Example_uid, $Example_username) 	= explode("\t", uc_authcode($_COOKIE['Example_auth'], 'DECODE'));
list($modi_uid, $modi_email) 			= explode("\t", uc_authcode($_COOKIE['modie_auth'], 'DECODE'));
		
	//echo $modi_email;
			
	$sqllogin_modi="SELECT * FROM `pre_common_member` where `uid`='$Example_uid'";
	$login_modi=@mysql_query($sqllogin_modi,$connmodibbs);
	$rowlogin_modi=@mysql_fetch_array($login_modi);
	
	
?>

                    <img class="modiicon" src="http://bbs.modiauto.com.cn/uc_server/avatar.php?uid=<?php echo $rowlogin_modi[uid];?>&size=big"></i>
                    <span class="nickname"><a href="http://id.modiauto.com.cn" target="_blank"><?php echo $rowlogin_modi[username];?></a></span>
                    

<?php }else{ ?>
                   
<form action="" method="post" class="modiuser_login">

    
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="80%"><input name="modiuser" class="modiuser" type="text" placeholder="无敌通行证" />
  <input name="modipass" class="modiuser" type="password" placeholder="******" /></td>
    <td><input name="modilogin" type="submit" class="modilogin" value="登 录" /> </td>
  </tr>
  </table>
</form>
					       

<?php }?>
 
 
<?php
/**
 * UCenter 应用程序开发 Example
 *
 * 应用程序有自己的用户表，用户登录的 Example 代码
 * 使用到的接口函数：
 * uc_user_login()	必须，判断登录用户的有效性
 * uc_authcode()	可选，借用用户中心的函数加解密激活字串和 Cookie
 * uc_user_synlogin()	可选，生成同步登录的代码
 */

if(empty($_POST['modilogin'])) {

}else {
	//通过接口判断登录帐号的正确性，返回值为数组
	
	$modiuser	=	iconv('UTF-8', 'GB2312', $_POST['modiuser']);
	$modipass	=	iconv('UTF-8', 'GB2312', $_POST['modipass']);
	
	
	list($uid, $username, $password, $email) = uc_user_login($modiuser, $modipass);
	
	
	$cokmodiuser	=	iconv('UTF-8', 'GB2312', $username);

	
	if($uid > 0) {
		
		
		
		//用户登陆成功，设置 Cookie，加密直接用 uc_authcode 函数，用户使用自己的函数
		//setcookie('Example_auth', uc_authcode($uid."\t".$username, 'ENCODE'));
		//生成同步登录的代码
		$ucsynlogin = @uc_user_synlogin($uid);
		//echo '登录成功'.$ucsynlogin.'<br><a href="'.$_SERVER['PHP_SELF'].'">继续</a>';
		//通过接口判断登录帐号的正确性，返回值为数组
		//用户登陆成功，设置 Cookie，加密直接用 uc_authcode 函数，用户使用自己的函数
		
		//生成同步登录的代码
		
		setcookie('Example_auth', uc_authcode($uid."\t".$cokmodiuser, 'ENCODE'));
		setcookie('modi_auth', uc_authcode($uid."\t".$email, 'ENCODE'));
		setcookie("modi_user", $uid,                            time()+3600, "/", ".wd.com");
		setcookie("modi_pass", $rowlogin_discuz[password],      time()+3600, "/", ".wd.com");
		
		$ucsynlogin = uc_user_synlogin($uid);

		
		$sqllogin_modi="SELECT * FROM `cms_modiuser` where `discuz_id`='$uid'";
		$login_modi=@mysql_query($sqllogin_modi,$connmodicms);
		$rowlogin_modi=@mysql_fetch_array($login_modi);
		
		
		
		//调试显示modi_id		echo $rowlogin_modi[modi_id];
		
		if($rowlogin_modi[modi_id]){ 
		
				//登陆成功,已经是无敌会员。
				echo '<script>alert("登录成功")</script>';
                echo "<meta http-equiv=refresh content='0; url=bbs.php'>"; 
                //exit();
				
			}else{

				$ins_modiuser="INSERT INTO `cms_modiuser` (`discuz_id`, `cars_brand_id`, `cars_model_id`, `add_time`) VALUES ('$uid', '0', '0', NOW());";
				$resultv=mysql_query($ins_modiuser,$connmodicms);
                if($resultv=='true'){
					
					//登陆成功，激活无敌会员。
					//echo '<script>alert("登录成功")</script>';
                    echo "<meta http-equiv=refresh content='0; url=bbs.php'>"; 
                    exit();
			
                    }else{
                        //echo 'error';
                        echo '<script>alert("无敌会员激活失败,请联系管理员")</script>';
                        echo "<script>javascript :history.back(-1)</script>";
                    } 
		}
		
		
		echo uc_user_synlogin($uid);
		
		
	}elseif($uid == -1) {
		
		echo '<script>alert("用户不存在,或者被删除")</script>';
		echo "<meta http-equiv=refresh content='0; url=?'>"; 
		exit();
	
	} elseif($uid == -2) {
		
		echo '<script>alert("用户或密码错误,请重试")</script>';
		echo "<meta http-equiv=refresh content='0; url=?'>"; 
		exit();
		
	} else {
		echo '未定义';
	}
}

?>                

</div>

</body>
</html>