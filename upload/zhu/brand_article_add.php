<?php
/**
 * 文档编辑
 *
 * @version			brand_article.php  
 * @name_cn			文章评论列表
 * @editor			zhuhuiming .
 * @update			2017-02-21 .
 * @copyright		edit by:zhu Copyright (c) 1989 - 2016, zhuphp, Inc.
 */
 

include_once('zhu_modidata.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>品牌专区文章列表 | zhuCms</title>

</head>

 
<body>

<form id="" name="" method="POST" action="">

	<input type="text" name="article_id" placeholder="id"/>
	<input type="text" name="modify_brand_id" placeholder="brand_id"/>
	<input type="submit" name="addsub" value="提交">


<?php

	$sqlshowlog="SELECT *  FROM `m_brand_article` ORDER BY `id`  DESC";	
	$showlog=@mysql_query($sqlshowlog,$connmodicms);
	$rowshowlog=@mysql_fetch_array($showlog);

	$fuckid = $rowshowlog[id] + 1;


if($_POST[addsub]){

	$inssql="insert into `m_brand_article` (`id`,`article_id` , `modify_brand_id`) VALUES ('$fuckid','$_POST[article_id]','$_POST[modify_brand_id]');";

	$resultv=mysql_query($inssql);
	if($resultv=='true'){
		echo '<script>alert("添加成功")</script>';
		
	}else{
	   echo '<script>alert("添加失败,请联系管理员")</script>';
	   //echo "<script>javascript :history.back(-1)</script>";
	} 
}		
?>
</form>

</body>
</html>
