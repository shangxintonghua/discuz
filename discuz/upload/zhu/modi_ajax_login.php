<?php


	include 'zhu_modidata.php';
	include './config.inc.php';
	include './uc_client/client.php';

/**
 * UCenter 应用程序开发 Example
 *
 * 应用程序有自己的用户表，用户登录的 Example 代码
 * 使用到的接口函数：
 * uc_user_login()	必须，判断登录用户的有效性
 * uc_authcode()	可选，借用用户中心的函数加解密激活字串和 Cookie
 * uc_user_synlogin()	可选，生成同步登录的代码
 */

	//通过接口判断登录帐号的正确性，返回值为数组
	

	
	$username = stripslashes(trim(@$_POST['user'])); 
	$password = stripslashes(trim(@$_POST['password'])); 

	
	$cokmodiuser	=	iconv('UTF-8', 'GB2312', $username);


	list($uid, $username, $password, $email) = uc_user_login($cokmodiuser, $password);
	
	
	
	
	
	
	setcookie('Example_auth', '*.modiauto.com.cn', 86400);
	
	
	
	if($uid > 0) {
			
	
		//生成同步登录的代码
		$ucsynlogin = @uc_user_synlogin($uid);
		//用户登陆成功，设置 Cookie，加密直接用 uc_authcode 函数，用户使用自己的函数
		setcookie('Example_auth', uc_authcode($uid."\t".$cokmodiuser, 'ENCODE'));
		//生成同步登录的代码
		$ucsynlogin = uc_user_synlogin($uid);

		
		$sqllogin_modi="SELECT * FROM `cms_modiuser` where `discuz_id`='$uid'";
		$login_modi=@mysql_query($sqllogin_modi,$connmodicms);
		$rowlogin_modi=@mysql_fetch_array($login_modi);
		
		//调试显示modi_id		echo $rowlogin_modi[modi_id];
		
		if($rowlogin_modi[modi_id]){ 
				//登陆成功,已经是无敌会员。
                $res['code'] = '1' ;
               	$res['modi_username'] = $cokmodiuser;
              	$res['modi_uid'] = $uid;
               
				
			}else{

$ins_modiuser="INSERT INTO `cms_modiuser` (`discuz_id`, `cars_brand_id`, `cars_model_id`, `add_time`) VALUES ('$uid', '0', '0', NOW());";
				$resultv=mysql_query($ins_modiuser,$connmodicms);
                if($resultv=='true'){
					
					//登陆成功，激活无敌会员。
                    $res['code'] = '1'; 
                    }else{
                    	$res['code'] = 0; 
						//echo "error1";
                      
                    } 
		}		
		echo uc_user_synlogin($uid);	
	}elseif($uid == -1) {		
        $res['code'] = 0; 	
			
	} elseif($uid == -2) {
		$res['code'] = 0; 	
	} else {
	}
    //输出
    echo json_encode($res); 


?>
