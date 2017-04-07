<?php
    include_once 'zhu_modidata.php';
    include_once './config.inc.php';
    include_once './uc_client/client.php';
    include_once './common/func.php';
?>

<?php
/**
 * 使用到的接口函数：
 * uc_user_login()	必须，判断登录用户的有效性
 * uc_authcode()	可选，借用用户中心的函数加解密激活字串和 Cookie
 * uc_user_synlogin()	可选，生成同步登录的代码
 */

if(!empty($_POST['modilogin'])) {

    //通过接口判断登录帐号的正确性，返回值为数组
    $modiuser	=	iconv('UTF-8', 'GB2312', $_POST['modiuser']);
    $modipass	=	iconv('UTF-8', 'GB2312', $_POST['modipass']);
    list($uid, $username, $password, $email) = uc_user_login($modiuser, $modipass);
    $cokmodiuser	=	iconv('UTF-8', 'GB2312', $username);
    if($uid > 0) {

        $sqllogin_discuz="SELECT * FROM `test_common_member` where `uid`='$uid' ";
        $login_discuz=mysqli_query($connmodibbs,$sqllogin_discuz);
        $rowlogin_discuz=mysqli_fetch_array($login_discuz);

        setcookie('MODICERTIFICATE', uc_authcode($uid."\t".$cokmodiuser, 'ENCODE'));

        $ucsynlogin = uc_user_synlogin($uid);

        echo $ucsynlogin;
        //跳转到首页
        javascriptSkip("index.php");



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
<script type="text/javascript" src="./js/login.js"></script>


</body>
</html>
