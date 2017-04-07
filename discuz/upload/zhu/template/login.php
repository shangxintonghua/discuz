<?php
    include_once 'zhu_modidata.php';
    include_once './config.inc.php';
    include_once './uc_client/client.php';
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
<div class="header_wrapper">
<div class="fixed_wrap">

    <a href="http://www.modiauto.com.cn/" title="无敌汽车网" class="logo_img">
        <img src="http://bbs.modiauto.com.cn/template/win8_3_ikan/src/logo.png" alt="">
    </a>
    
</div>
<div style="display:none;">
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

	
	//setcookie('zhu_auth', '*.modiauto.com.cn', 86400);
	if($uid > 0) {
			
		//用户登陆成功，设置 Cookie，加密直接用 uc_authcode 函数，用户使用自己的函数
		//setcookie('Example_auth', uc_authcode($uid."\t".$username, 'ENCODE'));
		//生成同步登录的代码
		$ucsynlogin = @uc_user_synlogin($uid);
		//echo '登录成功'.$ucsynlogin.'<br><a href="'.$_SERVER['PHP_SELF'].'">继续</a>';
		//通过接口判断登录帐号的正确性，返回值为数组
		//用户登陆成功，设置 Cookie，加密直接用 uc_authcode 函数，用户使用自己的函数
		//setcookie('zhu_auth','ok','86400', '/', '.modiauto.com.cn', '1');
		
		@$sqllogin_discuz="SELECT * FROM `pre_common_member` where `uid`='$uid' ";
		$login_discuz=@mysql_query($sqllogin_discuz,$connmodibbs);
		$rowlogin_discuz=@mysql_fetch_array($login_discuz);
		
		
		//生成同步登录的代码
		$ucsynlogin = uc_user_synlogin($uid);
		$sqllogin_modi="SELECT * FROM `cms_modiuser` where `discuz_id`='$uid'";
		$login_modi=@mysql_query($sqllogin_modi,$connmodicms);
		$rowlogin_modi=@mysql_fetch_array($login_modi);
		
		//调试显示modi_id		echo $rowlogin_modi[modi_id];
		
		setcookie("modi_user", $uid,						time()+3600, "/", ".modiauto.com.cn");
		setcookie("modi_pass", $rowlogin_discuz[password],	time()+3600, "/", ".modiauto.com.cn");
		setcookie('Example_auth', uc_authcode($uid."\t".$cokmodiuser, 'ENCODE'));
		
		
		if($rowlogin_modi[modi_id]){ 
				//登陆成功,已经是无敌会员。
				//echo '<script>alert("登录成功")</script>';
                echo "<meta http-equiv=refresh content='0; url=index.php'>"; 
                exit();
				
			}else{

$ins_modiuser="INSERT INTO `cms_modiuser` (`discuz_id`, `cars_brand_id`, `cars_model_id`, `add_time`) VALUES ('$uid', '0', '0', NOW());";
				$resultv=mysql_query($ins_modiuser,$connmodicms);
                if($resultv=='true'){
					
					//登陆成功，激活无敌会员。
					//echo '<script>alert("登录成功")</script>';
                    echo "<meta http-equiv=refresh content='0; url=index.php'>"; 
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

</div>
<div class="main_wrapper">
    <div class="main">
        <div class="ad_left">
		    <a href="">
		        <img src="http://static.modiauto.com.cn/png/201612/052994e9-912d-49bd-91e6-4ff0fe0af03e.png" alt="">
		    </a>
	    </div>
	    <div class="form_wrap">
	        <h3>无敌通行证</h3>
	        <form action="" method="post">
		        <dl class="dl_area">
		            <dd class="accont">
		                <i></i>
		                <input type="text" name="modiuser" class="input" id="username" value="" placeholder="手机号/用户名">
		                <div class="spa spa1"></div>
		            </dd>
		            <dd class="password">
		                <i></i>
		                <input type="password" name="modipass" class="input" id="password" placeholder="密码">
                        <div class="spa spa2"></div>
		            </dd>
		            <dd class="authcode">
		                <input type="text" class="input" id="code" style="width:200px;text-indent:10px;" placeholder="输入验证码">
		                <b>
		                    <img src="http://captcha.pconline.com.cn/captcha/v.jpg?1464770060651" class="code_pic">
		                </b>
		                <a href="##" >换一张</a>
		                <div class="spa spa3"></div>
		            </dd>
		            <dd class="remember">
		                <input type="checkbox">记住密码
		                <a href="">忘记密码？</a>
		            </dd>
		            <dd class="login_btn">
		               <input type="submit" id="sub" class="button" name="modilogin" value="登录">
		            </dd>
		        </dl>
	        </form>
	        <div class="other_login">
	            <p>其他账号登录</p>
	            <ul class="at_ul">
	                <a href="">
                        <li class="list qq">
                            <i></i>
                            QQ登录
                        </li>
	                </a>
	                <a href="">
		                <li class="list blog">
		                    <i></i>
		                    微博登录
		                </li>
	                </a>
	                <a href="">
		                <li class="list wechat">
		                     <i></i>
		                     微信登录
		                </li>
	                </a>
	             </ul>
	        </div>
	    </div>
    </div>
</div>




<br><br><br><br>
<?php include 'include_user_end.php';?>
<script type="text/javascript" src="http://common.modiauto.com.cn/js/jquery-1.11.3.min.js"></script>


</body>
</html>
