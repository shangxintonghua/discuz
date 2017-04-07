<?php
/**
 * 文档编辑
 *
 * @version			comment_index.php  
 * @name_cn			文章内嵌评论页
 * @editor			zhuhuiming .
 * @update			2-29 .
 * @copyright		edit by:zhu Copyright (c) 1989 - 2016, DesDev, Inc.
 */

	
	@session_start();    
	include_once 'zhu_modidata.php';
	include_once './config.inc.php';
	include_once './uc_client/client.php';

	//list($Example_uid, $Example_username) = explode("\t", uc_authcode($_COOKIE['Example_auth'], 'DECODE'));
	
	$Example_uid=$_COOKIE[modi_user];

if($_GET[aid]){}else{echo "no aid";exit();}
$cip = $_SERVER["REMOTE_ADDR"];
$likedate=date('Y-m-d');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>无敌网评论接口</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" href="http://www.modiauto.com.cn/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="http://common.modiauto.com.cn/css2/common.css"/>	
    <link rel="stylesheet" type="text/css" href="http://common.modiauto.com.cn/css/comment.css"/>	
     
</head> 
<body>



<div class="main" style=" margin:10px;">
<form name="example" method="POST" action="">
		<div class="review_wraper">

        <div class="tab_pl act">
			<div class="review_grade_wrap">
	
				<form id="form" name="form" action="" method="get">
					<div style="margin:10px 0px 0px 10px">
                    <?php 
					if($Example_uid){ 
					
							$sqlshowbbsmember11="SELECT * FROM `pre_common_member` WHERE `uid` = '$Example_uid';";	
							$showbbsmember11=@mysql_query($sqlshowbbsmember11,$connmodibbs);
							$rowshowbbsmember11=@mysql_fetch_array($showbbsmember11);
							
					?>

                    	Hi,<?php echo $rowshowbbsmember11[username];?></a>
                    <?php }else{?>
                    	<a href="http://id.modiauto.com.cn" target="_blank">登录</a> | <a href="http://bbs.modiauto.com.cn/member.php?mod=register" target="_blank">注册无敌通行证</a>
                    <?php }?>
                    </div>
                    <br class="clear_f">
					<?php
					
					if($_GET[replyid]){
						
						if($Example_uid){}else{ 
							echo '<script>alert("请先登录再回复")</script>';
	           				echo "<script>javascript :history.back(-1)</script>";
							exit();
						}
						
						$sqlshowreply="SELECT * FROM `cms_comment` WHERE `id` = '$_GET[replyid]'";
						$showreply=@mysql_query($sqlshowreply,$connmodicms);
						$rowshowreply=@mysql_fetch_array($showreply);
				
							$sqlshowbbsmember2="SELECT * FROM `pre_common_member` WHERE `uid` = '$rowshowreply[user_name]';";	
							$showbbsmember2=@mysql_query($sqlshowbbsmember2,$connmodibbs);
							$rowshowbbsmember2=@mysql_fetch_array($showbbsmember2);
							
					?>
                        
                        <div class="reply"></div>
                        
                        
                        <div class="reply">
	                        <i class="start"></i>
	                        <p>回复@<?php echo $rowshowbbsmember2[username];?>：<?php echo $rowshowreply[content];?></p>
	                        <i class="end"></i>
	                        <div class="clear_f"></div>
                        </div>
                    
					<?php }?>    
                        
                    <div class="Input_Box">
	                    
                        <textarea class="review_text" name="content1" rows="10" placeholder="无敌网温馨提示您：留言中请不要恶意攻击国家、地区、车型、车主、用户及无敌网小编，不要发布任何广告性质内容。请共同维护无敌网的车友交流环境。"><?php 
						echo $_POST[content1];?></textarea>
	                    <div class="faceDiv"> </div>
				        <div class="Input_Foot"> 
				          <a class="imgBtn" href="javascript:void(0);"></a>
				       </div>
                       
                       <div class="review_footer">
						<div class="auth_code">
						<div class="txt_p">
<?php if($Example_uid){?>                        
						    验证码：<input type="text" name="yzm" class="code_input" id="code">
						    </div>
	<img src="getcode.php" onclick = "this.src='getcode.php?'+Math.random()"/>


	<input type="submit" style="border: medium none;" class="regbut_input" value="发&nbsp;表" id="loginBtn" name="loginBtn">
<?php }else{?>
    <a type="submit" style="padding: 5px;border: medium none;background:#5C5858; font-size: 18px;height: 35px;line-height: 33px;border-radius: 2px;color: #fff;cursor: pointer;" class="" href="#" target="_blank">请先登录</a>

<?php }?>
	
						</div>
						<div class="clear_f"></div>
					</div>	
				    </div>

					
				</form>		
			</div>
	 
<?php 

//点赞
if($_GET[like]){    

	$sqlchk_like="SELECT * FROM `cms_comment_like` WHERE `ip` = '$cip' AND `date` = '$likedate' AND `type` = 'like' AND `cid` = '$_GET[like]' AND `uid` = '$Example_uid';";	
	$chk_like=@mysql_query($sqlchk_like,$connmodicms);
	$rowchk_like=@mysql_fetch_array($chk_like);

	if($rowchk_like[id]){
		echo '<script>alert("Sorry，您已经赞过了")</script>';
	}else{

		$sqllike12="SELECT * FROM `cms_comment_like_total` WHERE `cid` = '$_GET[like]' AND `type` = 'like';";	
		$like12=@mysql_query($sqllike12,$connmodicms);
		$rowlike12=@mysql_fetch_array($like12);

		$pptotal11	=	$rowlike12[total] + 1;
		if($rowlike12[id]){

			//echo '更新';
			$inssql="UPDATE `cms_comment_like_total` SET  `total` =  '$pptotal11' WHERE `id` ='$_GET[like]';";

			}else{

			//echo '插入';
			$inssql="INSERT INTO `cms_comment_like_total` (`cid`, `type`, `ip`, `total`) VALUES ('$_GET[like]', 'like', '$cip', '1');";
				
				
		}

		$likelog_sql	="INSERT INTO `cms_comment_like` (`cid`, `uid`, `type`, `ip`, `date`) VALUES ('$_GET[like]', '$Example_uid', 'like', '$cip', '$likedate');";
		$resultv=mysql_query($inssql,$connmodicms);
		$likeresult		=mysql_query($likelog_sql,$connmodicms);        
		if($resultv=='true' and $likeresult=='true'){
			echo '<script>alert("点赞成功")</script>';
	    }else{
	       echo '<script>alert("添加失败,请联系管理员")</script>';
	       echo "<script>javascript :history.back(-1)</script>";
	    } 
    }
}

//点叉叉
if($_GET[unlike]){    

	$sqlchk_like="SELECT * FROM `cms_comment_like` WHERE `ip` = '$cip' AND `date` = '$likedate' AND `type` = 'unlike' AND `cid` = '$_GET[unlike]' AND `uid` = '$Example_uid';";	
	$chk_like=@mysql_query($sqlchk_like,$connmodicms);
	$rowchk_like=@mysql_fetch_array($chk_like);

	// if($rowchk_like[id]){
	// 	echo '<script>alert("Sorry，您已下下过了")</script>';
	// }else{

		$sqllike12="SELECT * FROM `cms_comment_like_total` WHERE `cid` = '$_GET[unlike]' AND `type` = 'unlike';";	
		$like12=@mysql_query($sqllike12,$connmodicms);
		$rowlike12=@mysql_fetch_array($like12);

		$pptotal11	=	$rowlike12[total] + 1;
		if($rowlike12[id]){

			echo '更新';
			echo $inssql="UPDATE `cms_comment_like_total` SET  `total` =  '$pptotal11' WHERE `id` ='$_GET[unlike]';";

			}else{

			echo '插入';
			echo $inssql="INSERT INTO `cms_comment_like_total` (`cid`, `type`, `ip`, `total`) VALUES ('$_GET[unlike]', 'unlike', '$cip', '1');";
				
				
		}

		$likelog_sql	="INSERT INTO `cms_comment_like` (`cid`, `uid`, `type`, `ip`, `date`) VALUES ('$_GET[unlike]', '$Example_uid', 'unlike', '$cip', '$likedate');";
		$resultv=mysql_query($inssql,$connmodicms);
		$likeresult		=mysql_query($likelog_sql,$connmodicms);        
		if($resultv=='true' and $likeresult=='true'){
			echo '<script>alert("下下成功")</script>';
	    }else{
	       echo '<script>alert("添加失败,请联系管理员")</script>';
	       echo "<script>javascript :history.back(-1)</script>";
	    } 
    //}
}



	if($_POST['loginBtn'] ){
		
		if($_POST['content1']){
					
			if($_SESSION['code']==$_POST['yzm']){
			
		if (!empty($_POST['content1'])) {
			
			if (get_magic_quotes_gpc()) {
				
				
				$htmlData 	= 	stripslashes($_POST['content1']);

				
			} else {
				$ru			=	str_replace('<p>','',$_POST['content1']);
				$ru			=	str_replace("<",'&lt;',$ru);
				$ru			=	str_replace(">",'&gt;',$ru);
				$ru			=	str_replace('<img src="http://id.modiauto.com.cn/emoticons/images/','[emoji',$ru);
				$ru			=	str_replace('.gif" border="0" alt="" />','emoji]',$ru);
				$ru			=	str_replace("\n",'<br/>',$ru);			
				$ru			=	str_replace('</p>','',$ru);
				$ru			=	str_replace('\n','',$ru);
				$ru			=	str_replace('javascript:','',$ru);
				$ru			=	str_replace('onclick','',$ru);
				$ru			=	str_replace('alert(1)','',$ru);
				$ru			=	str_replace('alert','',$ru);
				$ru			=	str_replace('"','“',$ru);
				$ru			=	str_replace("'",'’',$ru);
				
				$htmlData 	= 	stripslashes($ru);
			}
		}
		


		
//$inssql="INSERT INTO `cms_parts_comment` (`parts_id`, `content_check`, `content_ip`, `content_text`, `content_nickname`, `content_quote_id`, `content_datatime`, `s1`, `s2`, `s3`, `s4`, `s5`, `s6`) VALUES ('$_GET[id]','0','$cip','$htmlData','$_POST[username]','0','$zhudate','$_POST[pointV1]','$_POST[pointV2]','$_POST[pointV3]','$_POST[pointV4]','$_POST[pointV5]','$_POST[pointV6]');";

$sqlshowlastID="SELECT * FROM `cms_comment` order by id desc";
$showlastID=@mysql_query($sqlshowlastID,$connmodicms);
$rowshowlastID=@mysql_fetch_array($showlastID);
$lid=$rowshowlastID[id]+1;


				
$inssql="INSERT INTO `cms_comment` (`id`, `article_id`, `user_name`, `email`, `content`, `referrer`, `zt`, `ip`, `status`, `create_time`, `subject_id`, `domain_name`) VALUES ('$lid', '$_GET[aid]', '$Example_uid', NULL, '$htmlData', NULL, NULL, '$cip', '6', '$zhudate', '$_GET[replyid]', NULL);";
$resultv=mysql_query($inssql,$connmodicms);
	        
			if($resultv=='true'){
				echo '<script>alert("留言成功")</script>';
				echo "<meta http-equiv=refresh content=0;url=?aid=".$_GET[aid]." >";
				//echo "<script>javascript :history.back(-1)</script>";
	            //echo "<script>location.href='?id=$rowfindidmun[id]';</script>";  
	        }else{
	           echo '<script>alert("添加失败,请联系管理员")</script>';
	           echo "<script>javascript :history.back(-1)</script>";
	        } 
			
		}else{
			echo '<script>alert("验证码失败")</script>';
	        //echo "<meta http-equiv=refresh content=0;url=#pl >";
		}
				
	}else{
		echo '<script>alert("请输入内容哦")</script>';
        }

    }
	?> 
    
			
<?php
				//$ramysql=rand(1,99);
				$sqlshowlog="SELECT * FROM `cms_comment` WHERE `article_id`= '$_GET[aid]' and `subject_id` ='' AND `status` = '6' ORDER BY `id` DESC limit 0,50";	
				$showlog=@mysql_query($sqlshowlog,$connmodicms);
				while($rowshowlog=@mysql_fetch_array($showlog)){
					
				$bq 	=	str_replace('[modi_','<img src="http://static.modiauto.com.cn/gjck/face/',$rowshowlog[content]);
				$bq 	=	str_replace('_modi]','.gif" border="0" alt="" />',$bq);
					
				$sqlshowbbsmember="SELECT * FROM `pre_common_member` WHERE `uid` = '$rowshowlog[user_name]';";	
				$showbbsmember=@mysql_query($sqlshowbbsmember,$connmodibbs);
				$rowshowbbsmember=@mysql_fetch_array($showbbsmember);
				
				
				$sqllike1="SELECT * FROM `cms_comment_like_total` WHERE `cid` = '$rowshowlog[id]' and `type` = 'like';";	
				$like1=@mysql_query($sqllike1,$connmodicms);
				$rowlike1=@mysql_fetch_array($like1);
				
				$sqlunlike1="SELECT * FROM `cms_comment_like_total` WHERE `cid` = '$rowshowlog[id]' and `type` = 'unlike';";	
				$unlike1=@mysql_query($sqlunlike1,$connmodicms);
				$rowunlike1=@mysql_fetch_array($unlike1);
?>
<div class="revcontent">
<ul class="comment_list">

			    
						<li>

				
						<img src="http://bbs.modiauto.com.cn/uc_server/avatar.php?uid=<?php echo $rowshowlog[user_name];?><&size=small" class="head_img">
                        <p class="tle">
								<span class="name_span"><a href="http://bbs.modiauto.com.cn/home.php?mod=space&uid=<?php echo $rowshowlog[user_name];?>&do=profile" target="_blank"><?php echo $rowshowbbsmember[username];?></a></span>
								<span class="date_span"><?php echo $rowshowlog[create_time];?></span>
							</p>
						<div class="comment_con_wrapper">
					
							<p class="con <?php echo $rowshowlog[id];?>"><?php echo $bq;?></p>
							
<?php

//引用回复循环
	$sqlshowlog2="SELECT * FROM `cms_comment` WHERE `subject_id` = '$rowshowlog[id]'  AND `status` = '6' order by `id` desc limit 0,50";	
	$showlog2=@mysql_query($sqlshowlog2,$connmodicms);
	while($rowshowlog2=@mysql_fetch_array($showlog2)){
		
	$bq2 	=	str_replace('[modi_','<img src="http://static.modiauto.com.cn/gjck/face/',$rowshowlog2[content]);
	$bq2 	=	str_replace('_modi]','.gif" border="0" alt="" />',$bq2);
		
	$sqlshowbbsmember2="SELECT * FROM `pre_common_member` WHERE `uid` = '$rowshowlog2[user_name]';";	
	$showbbsmember2=@mysql_query($sqlshowbbsmember2,$connmodibbs);
	$rowshowbbsmember2=@mysql_fetch_array($showbbsmember2);
	
	$sqllike="SELECT * FROM `cms_comment_like_total` WHERE `cid` = '$rowshowlog2[id]' and `type` = 'like';";	
	$like=@mysql_query($sqllike,$connmodicms);
	$rowlike=@mysql_fetch_array($like);
	
	$sqlunlike="SELECT * FROM `cms_comment_like_total` WHERE `cid` = '$rowshowlog2[id]' and `type` = 'unlike';";	
	$unlike=@mysql_query($sqlunlike,$connmodicms);
	$rowunlike=@mysql_fetch_array($unlike);
	
	if($rowshowbbsmember2[id]){ $morecomment=" display:none";}
?>
                            <!-- 引用回复 start-->
                            
                            <div class="reply_wrap">
                            	<div class="reply_li <?php echo $rowshowlog2[id];?>">
								    <a href="http://bbs.modiauto.com.cn/home.php?mod=space&uid=<?php echo $rowshowlog2[user_name];?>&do=profile" target="_blank"><?php echo $rowshowbbsmember2[username];?></a>：<?php echo $bq2;?>
								    <span class="like">
								        
								        <a href="?like=<?php echo $rowlike[id];?>&aid=<?php echo $_GET[aid];?>" class="up">
								            <i></i>
								            <?php if($rowlike[total]){echo $rowlike[total];}else{echo '0';}?>
								        </a>
								        <a href="?unlike=<?php echo $rowunlike[id];?>&aid=<?php echo $_GET[aid];?>" class="down">
								            <i></i>
								            <?php if($rowunlike[total]){echo $rowunlike[total];}else{echo '0';}?>
								        </a>
                                        
                                        <a href="?replyid=<?php echo $rowshowlog2[id];?>&aid=<?php echo $_GET[aid];?>" class="reply">回复</a>
								    </span>
                                    
								</div>
                            </div>
                            <!-- 引用回复 end-->
                            
<?php } //引用回复 end ?>				

						</div>
						<div class="clear_f"></div>
						<div class="commnet_op">
						    <span class="like">
						        <a href="?like=<?php echo $rowlike1[id];?>&aid=<?php echo $_GET[aid];?>" class="up">
						            <i></i>
						            <?php if($rowlike1[total]){echo $rowlike1[total];}else{echo '0';}?>
						        </a>
						        <a href="?unlike=<?php echo $rowunlike1[id];?>&aid=<?php echo $_GET[aid];?>" class="down">
						            <i></i>
						            <?php if($rowunlike1[total]){echo $rowunlike1[total];}else{echo '0';}?>
						        </a>
						    </span>
							<a href="?replyid=<?php echo $rowshowlog[id];?>&aid=<?php echo $_GET[aid];?>" class="reply">回复</a>
						</div>
					</li>


			</ul>

			</div>
	 <?php }?>	





<script type="text/javascript" charset="utf-8" src="http://common.modiauto.com.cn/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" charset="utf-8" src="http://common.modiauto.com.cn/js/chained.js"></script>
<script type="text/javascript" src="http://common.modiauto.com.cn/js/gjck.js"></script>
<script type="text/javascript" src="http://common.modiauto.com.cn/js/gjck2.js"></script>
<script type="text/javascript" src="http://common.modiauto.com.cn/js/p_comment.js"></script>



</body>
</html>