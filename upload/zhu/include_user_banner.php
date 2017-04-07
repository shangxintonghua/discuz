<?php
$modi_friend_totalnum	=	uc_friend_totalnum($Example_uid,'0');	//获取好友数量

$modi_uc_pm_checknew	=	uc_pm_checknew($Example_uid,'2');		//获取短消息内容
?>
	<div class="ift_wrap">
	    <div class="hd_img">
	        <a href="?a=avatar"><img src="http://bbs.modiauto.com.cn/uc_server/avatar.php?uid=<?php echo $rowmodiuser[uid];?>&size=big" alt=""></a>
	    </div>
	    <div class="user_center">
	        <h2 class="user_name">
	            <b><a href="index.php"><?php echo $rowmodiuser[username];?></a></b>
	            <i class="sex <?php echo $rowbbs_profile[gender];?>" style="display:none;"></i>
	        </h2>
	        <div class="user_lv">
			
	            <a href="?a=money" class="state_mes modi_coin">
	                无敌币
	                <span class=""><?php echo $rowmodiuser[credits];?></span>
	            </a>
				
	            <a href="?a=friends" class="state_mes modi_coin">
	                好友
	                <span><?php echo $modi_friend_totalnum;?></span>
	            </a>
				
				<a href="?a=msg" class="state_mes modi_coin">
	                消息
	                <span><?php echo $modi_friend_totalnum;?></span>
	            </a>
				
	        </div>
        </div>
        <div class="user_right">
	        <a href="">密码修改</a>
	        <a href="">长传头像</a>
	        <a href="?a=logout">退出</a>
	    </div>
        
	    
	</div>