
<?php
header("Access-Control-Allow-Origin:*" );
header("Access-Control-Allow-Methods:POST,GET" );
header("Access-Control-Max-Age:1000" );


	//modi ajax登录表单接收文件
	// 朱惠明
	

	include 'zhu_modidata.php';
	include './config.inc.php';
	include './uc_client/client.php';


 

	$modiusername = stripslashes(trim(@$_POST['user'])); 
	$modipassword = stripslashes(trim(@$_POST['password'])); 


	$cokmodiuser	=	iconv('UTF-8', 'GB2312', $modiusername);

	list($uid, $username, $password, $email) = uc_user_login($cokmodiuser, $modipassword);
	
	if($uid > 0) {
			
	
		//生成同步登录的代码
		$ucsynlogin = @uc_user_synlogin($uid);
		//用户登陆成功，设置 Cookie，加密直接用 uc_authcode 函数，用户使用自己的函数
		setcookie('Example_auth', uc_authcode($uid."\t".$cokmodiuser, 'ENCODE'));
		
		$sqllogin_modi="SELECT * FROM `cms_modiuser` where `discuz_id`='$uid'";
		$login_modi=@mysql_query($sqllogin_modi,$connmodicms);
		$rowlogin_modi=@mysql_fetch_array($login_modi);
		
		if($rowlogin_modi[modi_id]){ 
				
				$cokmodiuser	=	iconv('UTF-8', 'GB2312', $modiusername);
				//登陆成功,已经是无敌会员。
                $res['code'] = '1' ;
              	$res['modi_uid'] = $uid;
           		setcookie("modi_user", $uid,time()+3600, "/", ".modiauto.com.cn");

				
			}else{

$ins_modiuser="INSERT INTO `cms_modiuser` (`discuz_id`, `cars_brand_id`, `cars_model_id`, `add_time`) VALUES ('$uid', '0', '0', NOW());";
				$resultv=mysql_query($ins_modiuser,$connmodicms);
                if($resultv=='true'){
					
					//登陆成功，激活无敌会员。
                   	$cokmodiuser	=	iconv('UTF-8', 'GB2312', $modiusername);
					//登陆成功,已经是无敌会员。
					$res['code'] = '1' ;
					$res['modi_uid'] = $uid;
					setcookie("modi_user", $uid,time()+3600, "/", ".modiauto.com.cn");

                    }else{
                    	$res['code'] = 0; 
						//echo "error1";
                      
                    } 
		}		
		
		
		
	}elseif($uid == -1) {		
        $res['code'] = 0; 	
			
	} elseif($uid == -2) {
		$res['code'] = 0; 	
	} else {
		//error no way
	}
    //输出
	
    echo json_encode($res); 


?>
