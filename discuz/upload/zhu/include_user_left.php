<div class="leftnav_wrap">

	<dl class="news_list">
		<dt>我的爱车</dt>
			
<?php 
	$sqllogin_modi="SELECT * FROM `cms_modiuser` where `discuz_id`='$Example_uid'";
	$login_modi=mysqli_query($sqllogin_modi,$connmodicms);
	$rowlogin_modi=mysqli_fetch_array($login_modi);
	
	if($rowlogin_modi[cars_model_id]){
		
		$sqlmodi_car="SELECT * FROM `cms_model` where `id` = '$rowlogin_modi[cars_model_id]'";
		$modi_car=mysqli_query($sqlmodi_car,$connmodicms);
		$rowmodi_car=mysqli_fetch_array($modi_car);
		
		$sqlmodi_brand="SELECT * FROM `cms_brand` where `id` = '$rowmodi_car[brand_id]'";
		$modi_brand=mysqli_query($sqlmodi_brand,$connmodicms);
		$rowmodi_brand=mysqli_fetch_array($modi_brand);

		$sqlmodi_carimg="SELECT * FROM `cms_model_img` where `model_id` = '$rowmodi_car[id]'";
		$modi_carimg=mysqli_query($sqlmodi_carimg,$connmodicms);
		$rowmodi_carimg=mysqli_fetch_array($modi_carimg);
?>
            
			<div class="myCar" >
               <a href="?a=mycar">
	               <img src="http://static.modiauto.com.cn/car/m_<?php echo $rowmodi_carimg[img_url];?>" title="<?php echo $rowmodi_brand[name]."-".$rowmodi_car[name_cn];?>">
	               <p><?php echo $rowmodi_car[name_cn];?></p>
               </a>  
            </div>
            
<?php }else{?>
			
            <div class="addCar" >
                <a href="?a=mycar">添加爱车</a>
            </div>
<?php }?>            
            
	</dl>
	
	<dl class="news_list">
		<dt>无敌社区</dt>
		<dd><a href="http://id.modiauto.com.cn/" target="_blank">我的首页</a></dd>
        <dd><a href="http://bbs.modiauto.com.cn/forum.php?mod=guide&view=my" target="_blank">我的帖子</a></dd>
		<dd><a href="http://bbs.modiauto.com.cn/home.php?mod=space&do=favorite&view=me" target="_blank">论坛收藏</a></dd>
		<dd><a href="http://bbs.modiauto.com.cn/home.php?mod=space&do=friend" target="_blank">我的好友</a></dd>
		<dd><a href="http://bbs.modiauto.com.cn/home.php?mod=space&do=notice&view=mypost&type=post" target="_blank">私信<?php if($rowmodiuser[newpm]){?><span class="tips"><?php echo $rowmodiuser[newpm];?></span><?php }?></a></dd>
		<dd><a href="http://bbs.modiauto.com.cn/home.php?mod=space&do=pm" target="_blank">提到我<?php if($rowmodiuser[newprompt]){?><span class="tips"><?php echo $rowmodiuser[newprompt];?></span><?php }?></a></dd>
		<dd><a href="?a=footmark">文章足迹</a></dd>
		<dd><a href="?a=my_article">文章收藏</a></dd>
	</dl>

	<dl class="news_list">
		<dt>改件仓库</dt>
		<dd><a href="http://parts.modiauto.com.cn" target="_blank">改件仓库首页</a></dd>
		<dd><a href="?a=parts">改件收藏</a></dd>
		<dd><a href="?a=trade">改件订单</a></dd>
	</dl>
	 
	<dl class="news_list">
		<dt>应用</dt>
		<dd><a href="http://parts.modiauto.com.cn" target="_blank">改件仓库</a></dd>
		<dd><a href="http://cars.modiauto.com.cn" target="_blank">车型库</a></dd>
		<dd><a href="http://www.modiauto.com.cn/car" target="_blank">车型参数库</a></dd>
		<dd><a href="http://brand.modiauto.com.cn" target="_blank">品牌专区</a></dd>
		<dd><a href="http://bbs.modiauto.com.cn" target="_blank">交流平台</a></dd>
	</dl>
	
	<dl class="news_list">
		<dt>意见反馈</dt>
		<dd><a href="#">Bug提交</a></dd>
		<dd><a href="#">留言给技术部</a></dd>
	</dl>
	
</div>