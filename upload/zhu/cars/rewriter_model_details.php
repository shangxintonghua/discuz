<?php
/**
 * 文档编辑
 *
 * @version     model_details.php  
 * @name_cn     车型群详情页
 * @editor      zhuhuiming .
 * @update      9-23 .
 * @copyright   edit by:zhu Copyright (c) 1989 - 2016, DesDev, Inc.

 */


@session_start();  
include_once('zhu_conn.php');

//print_r($_GET);

	@$sqlcheckbrand="SELECT * FROM `cms_brand` WHERE `name` = '$_GET[brand]' ";
	$checkbrand=@mysql_query($sqlcheckbrand,$conOLD);
	$rowcheckbrand=@mysql_fetch_array($checkbrand);
  
  
if($_GET[id]){
	
	@$sqlshowcar="SELECT * FROM `cms_model` WHERE `id` = '$_GET[id]' ";
	}elseif($_GET[key]){
	// 仅用于rewrite模糊查车
	@$sqlshowcar="SELECT * FROM `cms_model` WHERE `name` LIKE '%$_GET[key]%' or `name_cn` LIKE '%$_GET[key]%'";
	}elseif($_GET[name]){
	
	$rewriteurlget = str_replace("_","-",$_GET[name]);
	// 仅用于rewrite精准查车,会绑定品牌ID
	@$sqlshowcar="SELECT * FROM `cms_model` WHERE `name` = '$rewriteurlget' AND `brand_id` = '$rowcheckbrand[id]'";
}
  
  $showcar=@mysql_query($sqlshowcar,$conOLD);
  $rowshowcar=@mysql_fetch_array($showcar);
  
  @$sqlshowbrand="SELECT * FROM `cms_brand` WHERE `id` = '$rowshowcar[brand_id]' ";
  $showbrand=@mysql_query($sqlshowbrand,$conOLD);
  $rowshowbrand=@mysql_fetch_array($showbrand);

  @$sqltypedetails="SELECT * FROM `cms_parts_type` WHERE `name_en` = '$_GET[type]' ";
  $typedetails=@mysql_query($sqltypedetails,$conOLD);
  $rowtypedetails=@mysql_fetch_array($typedetails);
 
//echo $rowshowbrand[name]."-".$rowshowcar[name];
 
@$sqlshowbanner="SELECT * FROM `cms_model_img` WHERE `model_id` = '$rowshowcar[id]'";
$showbanner=@mysql_query($sqlshowbanner,$conOLD);
$rowshowbanner=@mysql_fetch_array($showbanner);
 
  
	// 查询图片是否缩小了
	@$sqlcheckimg="SELECT * FROM `cms_model_img` WHERE `model_id` = '$rowshowcar[id]' ";
	$checkimg=@mysql_query($sqlcheckimg,$conOLD);
	$rowcheckimg=@mysql_fetch_array($checkimg);
	
$restrmodel = str_replace("-","_",$rowshowcar['name']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1400px, initial-scale=1.0" />
    <title><?php if($rowshowbrand[name_cn]){echo $rowshowbrand[name_cn];}else{ echo $rowshowbrand[name];}?>_<?php if($rowshowcar[name_cn]){echo $rowshowcar[name_cn];}else{ echo $rowshowcar[name];}?>改装专题_改装车_无敌网</title>
    <meta name="keywords" content="<?php if($rowshowcar[name_cn]){echo $rowshowcar[name_cn];}else{ echo $rowshowcar[name];}?>改装配件，<?php if($rowshowcar[name_cn]){echo $rowshowcar[name_cn];}else{ echo $rowshowcar[name];}?>改装车零件，<?php echo $rowshowcar[name_cn];?>改装专题,,<?php echo $rowshowcar[name_cn];?>外观改装,<?php echo $rowshowcar[name_cn];?>动力改装,<?php echo $rowshowcar[name_cn];?>影音改装,<?php echo $rowshowcar[name_cn];?>操控改装,<?php echo $rowshowcar[name_cn];?>内饰改装,<?php echo $rowshowcar[name_cn];?>改装包围,<?php echo $rowshowcar[name_cn];?>排气改装,<?php echo $rowshowcar[name_cn];?>改装大灯,<?php echo $rowshowcar[name_cn];?>改装尾翼,<?php echo $rowshowcar[name_cn];?>轮毂改装,<?php echo $rowshowcar[name_cn];?>改装剪刀门,<?php echo $rowshowcar[name_cn];?>座椅改装,<?php echo $rowshowcar[name_cn];?>ECU升级,<?php echo $rowshowcar[name_cn];?>改装避震,<?php echo $rowshowcar[name_cn];?>改装刹车,<?php echo $rowshowcar[name_cn];?>隔音改装,<?php echo $rowshowcar[name_cn];?>改装DVD导航,<?php echo $rowshowcar[name_cn];?>进气改装,<?php echo $rowshowcar[name_cn];?>改装涡轮增压,<?php echo $rowshowcar[name_cn];?>改装发动机,<?php echo $rowshowcar[name_cn];?>改装机械增压<?php if($rowshowcar[name_cn]){echo $rowshowcar[name_cn];}else{ echo $rowshowcar[name];}?>改装论坛，<?php if($rowshowcar[name_cn]){echo $rowshowcar[name_cn];}else{ echo $rowshowcar[name];}?>改装图片，改装避震，改装车" /><meta name="description" content="无敌网-车型群，致力打造全网首个改装最全的<?php if($rowshowbrand[name_cn]){echo $rowshowbrand[name_cn];}else{ echo $rowshowbrand[name];}?>_<?php if($rowshowcar[name_cn]){echo $rowshowcar[name_cn];}else{ echo $rowshowcar[name];}?>改装专题，参数及对应车型最多，销售优惠信息最多于一身的综合型改件仓库。努力服务每一位车友的提供改装方案服务" />
	<link rel="shortcut icon" href="http://www.modiauto.com.cn/favicon.ico"/>
	<link rel="stylesheet" href="http://common.modiauto.com.cn/css2/common.css">
    <link rel="stylesheet" href="http://common.modiauto.com.cn/css2/car_search.css">
</head>

<body>
    <?php include_once('./if_cars_head.php');?>
	<div class="main_wrapper">
	
	
		<div class="bread_crumb_wrapper">
			<div class="bread_crumb_wrap">
			当前位置：
				<a href="http://www.modiauto.com.cn/">无敌网</a>
				&gt;
				<a href="http://cars.modiauto.com.cn">车型库</a>
				&gt;
				<?php if($rowshowbrand[name_cn]){echo $rowshowbrand[name_cn];}else{ echo $rowshowbrand[name];}?>
				&gt;
				<a href="http://cars.modiauto.com.cn/<?php echo $rowshowbrand[name];?>-<?php echo $restrmodel;?>/" target="_blank"><?php if($rowshowcar[name_cn]){echo $rowshowcar[name_cn];}else{ echo $rowshowcar[name];}?></a>
			</div>
			<div class="clear_f"></div>
			<!--<form class="search_form">
			    <select id="" class="">
					    <option value="">请选择</option>
						<option value="">车型</option>
						<option value="">系列</option>
				</select>
				<input type="text"></input>
				<button>搜索</button>
			</form>-->
		</div>

		
		
		<div class="left_wrap">
			<div class="info_con">
			    <div class="tle">
				    <h2><?php if($rowshowcar[name_cn]){echo $rowshowcar[name_cn];}else{ echo $rowshowcar[name];}?>改装 </h2><a href="http://cars.modiauto.com.cn/<?php echo $rowshowbrand[name];?>-<?php echo $rowshowcar[name];?>/modify/">更多 >></a>
				</div>
				
<?php
@$sqlshowarticlei0="SELECT * FROM `cms_article` WHERE `model_id` = '$rowshowcar[id]' and visible = 'Y' and published = '1' and finished = '1'  and `channel_id` in ('1062','1063','1064','1065','1090','1066') order by id DESC";
$showarticlei0=@mysql_query($sqlshowarticlei0,$conOLD);
$rowshowarticlei0=@mysql_fetch_array($showarticlei0);



// 循环频道
@$sqlchanneli0="SELECT * FROM `cms_channel`  WHERE  `id` = '$rowshowarticlei0[channel_id]'";
$channeli0=@mysql_query($sqlchanneli0,$conOLD);
$rowchanneli0=@mysql_fetch_array($channeli0);
// 循环出专栏
@$sqlcolumni0="SELECT * FROM `cms_column`  WHERE  `id` = '$rowshowarticlei0[column_id]'";
$columni0=@mysql_query($sqlcolumni0,$conOLD);
$rowcolumni0=@mysql_fetch_array($columni0);
// 缩短标题
$short_title0 = mb_substr($rowshowarticle0[title],0,20, 'utf-8');
$short_type0 = mb_substr($rowcolumn0[short_name],0,2, 'utf-8');
// 缩短标题
$short_titlei0 = mb_substr($rowshowarticlei0[title],0,30, 'utf-8');
// 完整文章url
$rowarticleurli0= "http://www.modiauto.com.cn/html/".$rowchanneli0[location]."/".$rowcolumni0[id]."/".$rowshowarticlei0[id].".html"; 

?>				
				<div class="focus_pic">
					
					
					<?php if($rowshowarticlei0[id]){?>
				    <a href="<?php echo $rowarticleurli0;?>" target="_blank"><img src="<?php echo $rowshowarticlei0[indeximg];?>" alt="<?php echo $rowshowarticlei0[title];?>" title="<?php echo $rowshowarticlei0[title];?>"></a>
					<a href="<?php echo $rowarticleurli0;?>" target="_blank" alt="<?php echo $rowshowarticlei0[title];?>" title="<?php echo $rowshowarticlei0[title];?>"><p><?php echo $short_titlei0;?></p></a>
					<?php }else{?>
					<a href="mailto:hudong@modiauto.com.cn" target="_blank"><img src="http://static.modiauto.com.cn/jpg/201610/b44d5e02-44e8-4b5a-9614-ab4b49521b1b.jpg"></a>
					<p>投稿请点击：<a href="mailto:hudong@modiauto.com.cn" target="_blank" class="red">互动部</a></p>
					<?php }?>
					
				</div>
				<div class="article_list">

				
				<ul class="list_ul">
<?php


$modicar = explode(',',$rowshowcar[hot_keywords]); 
//$char = implode(",",$hello);
//print_r($hello);


	
@$sqlshowarticle0="SELECT * FROM `cms_article` WHERE visible = 'Y' and published = '1' and finished = '1'  and  `channel_id` in ('1062','1063','1064','1065','1090','1066') and `model_id` = '$rowshowcar[id]' order by id desc limit 0,14 ";
$showarticle0=@mysql_query($sqlshowarticle0,$conOLD);
while($rowshowarticle0=@mysql_fetch_array($showarticle0)){
	// 循环频道
	@$sqlchannel0="SELECT * FROM `cms_channel`  WHERE  `id` = '$rowshowarticle0[channel_id]'";
	$channel0=@mysql_query($sqlchannel0,$conOLD);
	$rowchannel0=@mysql_fetch_array($channel0);
	// 循环出专栏
	@$sqlcolumn0="SELECT * FROM `cms_column`  WHERE  `id` = '$rowshowarticle0[column_id]'";
	$column0=@mysql_query($sqlcolumn0,$conOLD);
	$rowcolumn0=@mysql_fetch_array($column0);
	//缩短标题
	$short_title0 = mb_substr($rowshowarticle0[title],0,20, 'utf-8');
	$short_type0 = mb_substr($rowcolumn0[short_name],0,2, 'utf-8');
	//完整文章url
	$rowarticleurl0= "http://www.modiauto.com.cn/html/".$rowchannel0[location]."/".$rowcolumn0[location]."/".$rowshowarticle0[id].".html";


	  
?>					
					    <li>
							<span class="lanmu_link"><a href="http://cars.modiauto.com.cn/<?php echo $rowshowbrand[name];?>-<?php echo $restrmodel;?>/column/<?php echo $rowcolumn0[id];?>/" target="_blank"><?php if($short_type0){echo $short_type0;}else{echo "暂无";}?></a></span>
							|
							<a href="<?php echo $rowarticleurl0;?>" target="_blank" title="<?php echo $rowshowarticle0[title];?>"><?php echo $short_title0;?></a>
						</li>
					
<?php  }?>						
				</ul>
					
				</div>
			</div>
			<div class="ad" style="display:none;">
			    <div class="ad970_wrapper"><a href="##" target="_blank"><img src="" alt=""></a></div>
			</div>
			<div class="info_con">
			    <div class="tle">
				    <h2><?php if($rowshowcar[name_cn]){echo $rowshowcar[name_cn];}else{ echo $rowshowcar[name];}?>文化 </h2><a href="http://cars.modiauto.com.cn/<?php echo $rowshowbrand[name];?>-<?php echo $rowshowcar[name];?>/culture/">更多 >></a>
				</div>
<?php


@$sqlshowarticlei2="SELECT * FROM `cms_article` WHERE `model_id` = '$rowshowcar[id]' and visible = 'Y' and `channel_id` in ('1094','1069','1076','1077','1080','1156') order by id DESC";
$showarticlei2=@mysql_query($sqlshowarticlei2,$conOLD);
$rowshowarticlei2=@mysql_fetch_array($showarticlei2);
// 循环频道
@$sqlchanneli2="SELECT * FROM `cms_channel`  WHERE  `id` = '$rowshowarticlei2[channel_id]'";
$channeli2=@mysql_query($sqlchanneli2,$conOLD);
$rowchanneli2=@mysql_fetch_array($channeli2);
// 循环出专栏
@$sqlcolumni2="SELECT * FROM `cms_column`  WHERE  `id` = '$rowshowarticlei2[column_id]'";
$columni2=@mysql_query($sqlcolumni2,$conOLD);
$rowcolumni2=@mysql_fetch_array($columni2);
//缩短标题
$short_titlei2 = mb_substr($rowshowarticlei2[title],0,32, 'utf-8');
//完整文章url
$rowarticleurli2= "http://www.modiauto.com.cn/html/".$rowchanneli2[location]."/".$rowcolumni2[location]."/".$rowshowarticlei2[id].".html";

?>				
				<div class="focus_pic">
					<?php if($rowshowarticlei2[id]){?>
				    <a href="<?php echo $rowarticleurli2;?>" target="_blank"><img src="<?php echo $rowshowarticlei2[indeximg];?>" alt="<?php echo $rowshowarticlei2[title];?>" title="<?php echo $rowshowarticlei2[title];?>"></a>
					<a href="<?php echo $rowarticleurli2;?>" target="_blank" alt="<?php echo $rowshowarticlei2[title];?>" title="<?php echo $rowshowarticlei2[title];?>"><p><?php echo $short_titlei2;?></p></a>
					<?php }else{?>
					<a href="mailto:hudong@modiauto.com.cn" target="_blank"><img src="http://static.modiauto.com.cn/jpg/201610/b44d5e02-44e8-4b5a-9614-ab4b49521b1b.jpg"></a>
					<p>投稿请点击：<a href="mailto:hudong@modiauto.com.cn" target="_blank" class="red">互动部</a></p>
					<?php }?>
				</div>
				<div class="article_list">
				    				<ul class="list_ul">
<?php
$modicar = explode(',',$rowshowcar[hot_keywords]); 
//$char = implode(",",$hello);
//print_r($hello);

//foreach($modicar as $valcar){
	
@$sqlshowarticle2="SELECT * FROM `cms_article` WHERE `model_id` = '$rowshowcar[id]' and visible = 'Y' and  `channel_id` in ('1094','1069','1076','1077','1080','1156') and `tag` LIKE '%$varcar%' order by id desc limit 0,14 ";
$showarticle2=@mysql_query($sqlshowarticle2,$conOLD);
while($rowshowarticle2=@mysql_fetch_array($showarticle2)){
	
	@$sqlchannel2="SELECT * FROM `cms_channel`  WHERE  `id` = '$rowshowarticle2[channel_id]'";
	$channel2=@mysql_query($sqlchannel2,$conOLD);
	$rowchannel2=@mysql_fetch_array($channel2);
	// 循环出专栏
	@$sqlcolumn2="SELECT * FROM `cms_column`  WHERE  `id` = '$rowshowarticle2[column_id]'";
	$column2=@mysql_query($sqlcolumn2,$conOLD);
	$rowcolumn2=@mysql_fetch_array($column2);
	//缩短标题
	$short_title2 = mb_substr($rowshowarticle2[title],0,22, 'utf-8');
	$short_type2 = mb_substr($rowcolumn2[short_name],0,22, 'utf-8');

	//完整文章url
	$rowarticleurl2= "http://www.modiauto.com.cn/html/".$rowchannel2[location]."/".$rowcolumn2[location]."/".$rowshowarticle2[id].".html";

	  
	  
?>					
					    <li>
							<span class="lanmu_link"><a href="http://cars.modiauto.com.cn/<?php echo $rowshowbrand[name];?>-<?php echo $restrmodel;?>/column/<?php echo $rowcolumn2[id];?>/" target="_blank"><?php if($short_type2){echo $short_type2;}else{echo "暂无";}?></a></span>
							|
							<a href="<?php echo $rowarticleurl2;?>" target="_blank" ><?php echo $short_title2;?></a>
						</li>
					
<?php }?>						
				</ul>
				</div>
			</div>
			<div class="ad"  style="display:none;">
			    <div class="ad970_wrapper"><a href="##" target="_blank"><img src="" alt=""></a></div>
			</div>
			<div class="info_con">
			    <div class="tle">
				    <h2><?php if($rowshowcar[name_cn]){echo $rowshowcar[name_cn];}else{ echo $rowshowcar[name];}?>赛车 </h2><a href="http://cars.modiauto.com.cn/<?php echo $rowshowbrand[name];?>-<?php echo $rowshowcar[name];?>/racing/">更多 >></a>
				</div>
				
<?php
@$sqlshowarticlei3="SELECT * FROM `cms_article` WHERE `model_id` = '$rowshowcar[id]' and visible = 'Y' and  `channel_id` = '1079' order by id DESC";
$showarticlei3=@mysql_query($sqlshowarticlei3,$conOLD);
$rowshowarticlei3=@mysql_fetch_array($showarticlei3);

// 循环频道
@$sqlchanneli3="SELECT * FROM `cms_channel`  WHERE  `id` = '$rowshowarticlei3[channel_id]'";
$channeli3=@mysql_query($sqlchanneli3,$conOLD);
$rowchanneli3=@mysql_fetch_array($channeli3);
// 循环出专栏
@$sqlcolumni3="SELECT * FROM `cms_column`  WHERE  `id` = '$rowshowarticlei3[column_id]'";
$columni3=@mysql_query($sqlcolumni3,$conOLD);
$rowcolumni3=@mysql_fetch_array($columni3);
// 缩短标题
$short_titlei3 = mb_substr($rowshowarticlei3[title],0,30, 'utf-8');

//完整文章url
$rowarticleurli3= "http://www.modiauto.com.cn/html/".$rowchanneli3[location]."/".$rowcolumni3[location]."/".$rowshowarticlei3[id].".html";
?>		
				<div class="focus_pic">
					<?php if($rowshowarticlei3[id]){?>
				    <a href="<?php echo $rowarticleurli3;?>" target="_blank"><img src="<?php echo $rowshowarticlei3[indeximg];?>" alt="<?php echo $rowshowarticlei3[title];?>" title="<?php echo $rowshowarticlei3[title];?>"></a>
					<a href="<?php echo $rowarticleurli3;?>" target="_blank" alt="<?php echo $rowshowarticlei3[title];?>" title="<?php echo $rowshowarticlei3[title];?>"><p><?php echo $short_titlei3;?></p></a>
					<?php }else{?>
					<a href="mailto:hudong@modiauto.com.cn" target="_blank"><img src="http://static.modiauto.com.cn/jpg/201610/b44d5e02-44e8-4b5a-9614-ab4b49521b1b.jpg"></a>
					<p>投稿请点击：<a href="mailto:hudong@modiauto.com.cn" target="_blank" class="red">互动部</a></p>
					<?php }?>
				</div>
				
				<div class="article_list">
				    
					<ul class="list_ul">
<?php

$modicar = explode(',',$rowshowcar[hot_keywords]); 
//$char = implode(",",$hello);
//print_r($hello);

//foreach($modicar as $valcar){
	
@$sqlshowarticle3="SELECT * FROM `cms_article` WHERE `model_id` = '$rowshowcar[id]' and visible = 'Y' and  `channel_id` = '1079' and `tag` LIKE '%$varcar%' order by id desc limit 0,14 ";
$showarticle3=@mysql_query($sqlshowarticle3,$conOLD);
while($rowshowarticle3=@mysql_fetch_array($showarticle3)){
	
	@$sqlchannel3="SELECT * FROM `cms_channel`  WHERE  `id` = '$rowshowarticle3[channel_id]'";
	$channel3=@mysql_query($sqlchannel3,$conOLD);
	$rowchannel3=@mysql_fetch_array($channel3);
	// 循环出专栏
	@$sqlcolumn3="SELECT * FROM `cms_column`  WHERE  `id` = '$rowshowarticle3[column_id]'";
	$column3=@mysql_query($sqlcolumn3,$conOLD);
	$rowcolumn3=@mysql_fetch_array($column3);
	//缩短标题
	$short_title3 = mb_substr($rowshowarticle3[title],3,23, 'utf-8');
	$short_type3 = mb_substr($rowcolumn3[short_name],0,22, 'utf-8');
	//完整文章url
	$rowarticleurl3= "http://www.modiauto.com.cn/html/".$rowchannel3[location]."/".$rowcolumn3[location]."/".$rowshowarticle3[id].".html";
?>					
					    <li>
							<span class="lanmu_link"><a href="http://cars.modiauto.com.cn/<?php echo $rowshowbrand[name];?>-<?php echo $restrmodel;?>/column/<?php echo $rowcolumn3[id];?>/" target="_blank"><?php if($short_type3){echo $short_type3;}else{echo "暂无";}?></a></span>
							|
							<a href="<?php echo $rowarticleurl3;?>" target="_blank" ><?php echo $short_title3;?></a>
						</li>
					
<?php }?>   
					</ul>
				</div>
			</div>
		</div>
		<div class="right_wrap">
		<?php include_once("./if_cars_right.php");?>
		</div>
		<div class="bottom_wrap">
			<div class="other_tuku">
				<div class="tle">
					<h2><?php if($rowshowcar[name_cn]){echo $rowshowcar[name_cn];}else{ echo $rowshowcar[name];}?>图库 </h2><a href="http://cars.modiauto.com.cn/<?php echo $rowshowbrand[name];?>-<?php echo $rowshowcar[name];?>/photo/">更多 >></a>
				</div>
				<div class="other_tuku_list">
				
<?php
	@$sqlphotolist="SELECT * FROM `photo_group` WHERE `model_id` = '$rowshowcar[id]' order by id desc limit 0,4";
	$photolist=@mysql_query($sqlphotolist,$conOLD);
	while($rowphotolist=@mysql_fetch_array($photolist)){
?>					
					<div class="other_tuku_item">
						<a href="http://photo.modiauto.com.cn/<?php echo $rowphotolist[photo_id];?>.html" target="_blank">
							<img src="<?php echo $rowphotolist[middle];?>" alt="<?php echo $rowphotolist[title];?>">
						</a>
						<p align="center"><a href="http://photo.modiauto.com.cn/<?php echo $rowphotolist[photo_id];?>.html" target="_blank"><?php echo $rowphotolist[title];?></a></p>
					</div>
<?php }?>				

					
					
				</div>
			</div>
			
			<?php include_once("./if_cars_bottom.php");?>
			
	    </div>
		<div class="clear_f"></div>
  </div>
  <div class="footer_container">
    <div class="for_fix_wrap">
        <div class="footer_container">
            <div class="footer_wrap">
                <a class="a_link" href="http://about.modiauto.com.cn/other/about/" target="_blank">关于我们</a>
                <a class="a_link" href="http://about.modiauto.com.cn/other/sitemap/" target="_blank">网站地图</a>
                <a class="a_link" href="http://about.modiauto.com.cn/other/contact/" target="_blank">联系我们</a>
                <a class="a_link" href="http://about.modiauto.com.cn/other/hr/" target="_blank">加入我们</a>
                <a class="a_link" href="http://about.modiauto.com.cn/other/friendlink/" target="_blank">友情链接</a>
                <a class="a_link" href="http://about.modiauto.com.cn/other/law/" target="_blank">法律顾问</a>
                <a class="gotop">返回顶部<i class="gotop_icon"></i></a>
            </div>
        </div>
    </div>
    <div class="aboutus_container">
        <div class="aboutus_wrap">
					<span>版权所有：无敌汽车网www.modiauto.com.cn<a href="mailto:webmaster@modiauto.com.cn" target="_blank">（如有任何问题，请点击此处）</a> <a href="http://about.modiauto.com.cn/images/110263.jpg" target="_blank">京ICP证110263号</a> |
                    <a href="http://www.miitbeian.gov.cn" target="_blank">京ICP备11011280号</a> |
                    京公网安备11010602010154号    Copyright © 2005-2016</span>  </br>
            <div class="i">业务联系：400-930-8880</div>


        </div>

    </div>
</div>
<script type="text/javascript" src="http://common.modiauto.com.cn/js2/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://common.modiauto.com.cn/js2/common.js"></script>
</body>
</html>