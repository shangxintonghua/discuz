<h3>::我的爱车::</h3>
<?php 
	if($rowlogin_modi[cars_model_id]){
?>

<div class="myCar">
		        <img src="http://static.modiauto.com.cn/car/m_<?php echo $rowmodi_carimg[img_url];?>" alt="">
		        <p class="car_title"><?php echo $rowmodi_brand[name_cn].$rowmodi_car[name_cn];?></p>
		    </div><hr size=1>
<?php }else{?>

<?php }?>
<form id="form" action="" method="post"><div class="replace_car">
	<span>选择MyCar ：</span>
	
<select data-placeholder="品牌" id="area" name="thebrand" class="area_sl">
	<option value="">品牌</option>
<?php
	@$sqlbrand_list="SELECT * FROM `cms_brand` order by letter";
	$brand_list=@mysql_query($sqlbrand_list,$connmodicms);
	while($rowbrand_list=@mysql_fetch_array($brand_list)){
?>	
	<option value="<?php echo $rowbrand_list[id];?>"><?php echo $rowbrand_list[letter];?> - <?php echo $rowbrand_list[name_cn];?></option>
<?php }?>		
</select>
	

<select id="brand" class="brand_sl" name="userface" onchange="ChangeImg(this)"  runat="server" onclick="show()">
<option value="">车系</option>	
<?php
	@$sqlmodel_list="SELECT * FROM `cms_model` order by name";
	$model_list=@mysql_query($sqlmodel_list,$connmodicms);
	while($rowmodel_list=@mysql_fetch_array($model_list)){
?>
	<option value="<?php echo $rowmodel_list[id];?>" class="<?php echo $rowmodel_list[brand_id];?>"><?php echo $rowmodel_list[name_cn];?></option>
<?php }?>	
	</select>
	<input type="submit" name="addthecar" value="确定">
<?php
if($_POST[addthecar]){
	$addthecar="UPDATE `cms_modiuser` SET `cars_brand_id` = '$_POST[thebrand]',`cars_model_id` = '$_POST[userface]' WHERE `discuz_id` = '$Example_uid';";
	$resultv=mysql_query($addthecar,$connmodicms);
	if($resultv=='true'){
		 echo "<meta http-equiv=refresh content='0; url='>"; 
         exit();
	}else{
		echo '<script>alert("修改失败,请联系管理员")</script>';
        echo "<script>javascript :history.back(-1)</script>";	
		exit();
	}
}
?>	
</div>
</form>
<hr style="display:none;">
<div class="relevance_wz" style="display:none;">
	<span>xxx车相关文章</span>
<?php
	//@$sqlarticle_list="SELECT * FROM `cms_article` where `visible`='y' order by id desc limit 0,20";
	//$article_list=@mysql_query($sqlarticle_list,$connmodicms);
	//while($rowarticle_list=@mysql_fetch_array($article_list)){
?>		
		<div class="item">
	        <a href="article_url.php?aid=<?php echo $rowarticle_list[id];?>" target="_blank">
		        <img src="<?php echo $rowarticle_list[typeimg];?>" alt="">
		        <p><?php echo $rowarticle_list[title];?></p>
	        </a>
	    </div>
<?php //}?>
</div>
