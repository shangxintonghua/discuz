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

<style type="text/css">
body,td,th {
	font-family: "微软雅黑";
	font-size: 15px;
}
.aaa {
	font-size: 15px;
	position: fixed;
	left: 100px;
	bottom: 0px;
	width: 82%;
	margin-right: auto;
	margin-left: auto;
	margin-bottom: 1px;
}
.aaa .add {
	display: block;
	padding: 5px;
	background-color: #9F3;
}
.aaa #s input {
	padding-top: 11px;
	padding-right: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
}
.aaa #s .key {
	width: 90%;
	margin-top: 5px;
	margin-right: 0px;
	margin-bottom: 5px;
	margin-left: 5px;
	border: 1px solid #666;
}
.aaa #s .sub {
	background-color: #666;
	margin: 0px;
	padding: 10px;
	font-size: 16px;
	color: #FFF;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
}
.aaa #s {
	width: 95%;
	margin-right: auto;
	margin-left: auto;
}
#saytext {
	width: 98%;
	padding-top: 5px;
	padding-bottom: 5px;
	margin: 10px;
	height: 60px;
	border: 0px solid #999999;
	background-color: #F5F5F5;
}
#saytext2 {
	width: 98%;    
	height: 200px; 
}
#saytext3 {
	width: 98%;
	
}
</style>
</head>

 
<body>
<?php if($_GET[edit]){
	
	
	$sqlshowedit="SELECT * FROM  `cms_comment` WHERE `id` = '$_GET[edit]'";
	$showedit=@mysql_query($sqlshowedit,$conOLD);
	$rowshowedit=@mysql_fetch_array($showedit);	
	
	
	
?>
<table width="" border="0" align="left" cellpadding="0" cellspacing="1" style="border:#900">
  <tr>
	<td width="10%" align="center" valign="middle" bgcolor="#D6D6D6"><a href="?type=all">全部内容</a></td>
  	<td width="10%" height="40" align="center" valign="middle" bgcolor="#D6D6D6"><a href="?type=yes">已通过</a></td>
    <td width="10%" align="center" valign="middle" bgcolor="#D6D6D6"><a href="?type=no">未通过</a></td>
  </tr>
</table>

<form id="edit" name="edit" method="get" action="?edit=<?php echo $_GET[edit];?>">
<table width="99%" border="0" align="left" cellpadding="0" cellspacing="1" style="border:#900">

  <tr>
  	<td width="5%" height="30" align="center" valign="middle" bgcolor="#D6D6D6">ID</td>
    <td width="" align="center" valign="middle" bgcolor="#D6D6D6">内容</td>
  </tr>
  <tr>
  	<td align="center" bgcolor="#F5F5F5" height="30" width="5%">昵称</a></td>
	<td align="center" bgcolor="#F5F5F5"><script charset="UTF-8" src="http://id.modiauto.com.cn/userjs.php?userID=<?php echo $rowshowedit['user_name'];?>"></script> </td>
  </tr>  
  <tr>
  	<td align="center" bgcolor="#F5F5F5" height="30" width="5%">评论内容</a></td>
	<td align="center" bgcolor="#F5F5F5"><textarea name="saytext" class="review_text2" id="saytext2"><?php echo $rowshowedit['content'];?></textarea></td>
  </tr> 
  <tr>
  	<td align="center" bgcolor="#F5F5F5" height="30" width="5%">评论IP</a></td>
	<td align="center" bgcolor="#F5F5F5"><input name="ip" class="review_text2" id="saytext3" value="<?php echo $rowshowedit['ip'];?>"></input></td>
  </tr>   
    <tr>
      <td align="center" bgcolor="#F5F5F5" id="" height="30">&nbsp;</td>
      <td align="center" bgcolor="#F5F5F5"><input type="hidden" name="edit" value="<?php echo $_GET[edit];?>"><input type="submit" name="editsub" value="提交"></input></td>
    </tr> 
</table>
</form>
<?php 
	if($_GET[edit] and $_GET[editsub]){
		
	//$sqlshowedit	=	"UPDATE `cms_comment` SET `content` = '$_GET[saytext]',`ip` = '$_GET[ip]' WHERE `id` = '$_GET[edit]'";
	$resultv=mysql_query($sqlshowedit);
	
		if($resultv=='true'){  
			echo '<script>alert("编辑成功")</script>';
			echo "<script>javascript :history.back(-1)</script>";exit();
			//echo "<meta http-equiv=refresh content=0; url=parts_content.php>";

			//echo "<meta http-equiv=refresh content=0; url=zhu_carlist.php>"; 
			}else{
				echo '<script>alert("编辑失败,请联系管理员")</script>';
				echo "<script>javascript :history.back(-1)</script>";exit();
		}
	}
?>
<?php }else{?>
<table width="" border="0" align="left" cellpadding="0" cellspacing="1" style="border:#900">

  <tr>
	<td width="10%" align="center" valign="middle" bgcolor="#D6D6D6"><a href="?type=all">全部内容</a></td>
  	<td width="10%" height="40" align="center" valign="middle" bgcolor="#D6D6D6"><a href="?type=yes">已通过</a></td>
    <td width="10%" align="center" valign="middle" bgcolor="#D6D6D6"><a href="?type=no">未通过</a></td>
	<td width="10%" align="center" valign="middle" bgcolor="#D6D6D6">
    	
        <form id="" name="" method="get" action="">
            <input type="text" name="userID" placeholder="id"/>
            <input type="submit" name="editsub" value="提交">
        </form>
    </td>

  </tr>
  
</table>


<table width="99%" border="0" align="left" cellpadding="0" cellspacing="1" style="border:#900">

  <tr>
  	<td width="2%" align="center" valign="middle" bgcolor="#D6D6D6">ID</td>
    <td width="10%" height="40" align="center" valign="middle" bgcolor="#D6D6D6">文章标题</td>
	<td width="5%" align="center" valign="middle" bgcolor="#D6D6D6">用户</td>
    <td width="" align="center" valign="middle" bgcolor="#D6D6D6">内容</td>
    <td width="8%" align="center" valign="middle" bgcolor="#D6D6D6">执行IP</td>
    <td width="10%" align="center" valign="middle" bgcolor="#D6D6D6">审核/操作</td>
    <td width="10%" align="center" valign="middle" bgcolor="#D6D6D6">更新时间</td>
  </tr>
  
<?php


if(@$_GET[a]=='delete'){
	$editsql="DELETE FROM `m_brand_article` WHERE `id` = '$_GET[id]';";
	$resultv=mysql_query($editsql);
	
	if($resultv=='true'){  
		echo '<script>alert("删除成功")</script>';
		echo "<meta http-equiv=refresh content=1;url=?userID=".$_GET[userID]." >";
		exit();
				
		}else{
			echo '<script>alert("添加失败,请联系管理员")</script>';
			echo "<script>javascript :history.back(-1)</script>";exit();
		}
}


if($_GET[ch]){
	$inssql="UPDATE `cms_comment` SET  `content_check` =  '1' WHERE `id` ='$_GET[ch]'";
	$resultv=mysql_query($inssql);
	if($resultv=='true'){
		echo '<script>alert("审核成功")</script>';
		echo "<meta http-equiv=refresh content=1;url=? >";
		exit();
	}else{
	   echo '<script>alert("添加失败,请联系管理员")</script>';
	   echo "<script>javascript :history.back(-1)</script>";
	} 
}		
		


//列表开始
			if($_GET[userID]){
				$sqlshowlog="SELECT *  FROM `m_brand_article` WHERE `modify_brand_id` = '$_GET[userID]' ORDER BY `article_id`  DESC";	
			}elseif($_GET[type]=='yes'){
			}elseif($_GET[type]=='no'){
				//$sqlshowlog="SELECT * FROM `cms_comment` WHERE `status` != '6'  ORDER BY  `id`  DESC limit 0,50 ";	
			}elseif($_GET[type]=='all' or $_GET[type]==''){
				//$sqlshowlog="SELECT * FROM `cms_comment` where `status` = '6' ORDER BY `id`  DESC limit 0,50 ";	
			}
			$showlog=@mysql_query($sqlshowlog,$connmodicms);
			while($rowshowlog=@mysql_fetch_array($showlog)){
			  
			$sqlshowparts="SELECT * FROM  `cms_article` WHERE `id` = '$rowshowlog[article_id]'";
			$showparts=@mysql_query($sqlshowparts,$connmodicms);
			$rowshowparts=@mysql_fetch_array($showparts);



?>
  <tr>
  	<td align="center" bgcolor="#F5F5F5" width="100"><?php echo $rowshowlog[id];?></a></td>
    <td height="30" align="center" bgcolor="#F5F5F5"><a href="http://www.modiauto.com.cn/jump/cmsurl.php?aid=<?php echo $rowshowlog[article_id];?>" target="_blank"><?php echo $rowshowparts['title'];?></a></td>
    <td align="center" bgcolor="#F5F5F5" id="<?php echo $rowshowlog['id'];?>"><a href="http://bbs.modiauto.com.cn/home.php?mod=space&uid=<?php echo $rowshowlog['user_name'];?>" target="_blank"><script charset="UTF-8" src="http://id.modiauto.com.cn/userjs.php?userID=<?php echo $rowshowlog['user_name'];?>"></script></a></td>
	<td align="center" bgcolor="#F5F5F5"><textarea name="saytext" class="review_text" id="saytext" readonly="readonly"><?php echo $rowshowlog['content'];?></textarea></td>
    <td align="center" bgcolor="#F5F5F5"><?php echo $rowshowlog['ip'];?></td>
    
	<td align="center" bgcolor="#F5F5F5"><?php if($rowshowlog[content_check]=='0'){echo "<a href=?ch=$rowshowlog[id]&type=$_GET[type]>未审核</a>";}elseif($rowshowlog[content_check]=='1'){echo "<a href=?cx=$rowshowlog[id]&type=$_GET[type]>已审核</a>";}?> <a href="?edit=<?php echo $rowshowlog[id];?>">编辑</a> <a class="delete" href="?a=delete&id=<?php echo $rowshowlog[id];?>&userID=<?php echo $_GET[userID];?>" onclick="{if(confirm('确定要删除记录吗?')){return true;}return false;}">删除</a></td>
    
	
	<td align="center" bgcolor="#F5F5F5"><?php echo $rowshowlog['create_time'];?></td>
    
    
  </tr>


<?php }?>  
</table>
<?php }?>
 


</body>
</html>
