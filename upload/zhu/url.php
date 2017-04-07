<?php
header("Content-type: text/html; charset=utf-8");
include_once 'zhu_modidata.php';

?>




<?php
	

	
	@$sqlfocus="SELECT * FROM `cms_article`  WHERE  `id` = '$_GET[aid]'";
	$focus=@mysql_query($sqlfocus,$connmodicms);
	$rowfocus=@mysql_fetch_array($focus); 

	$rowfocusurl=$rowfocus['url'];
	$rowfocusurl=str_replace('modify.modiauto.com.cn', "www.modiauto.com.cn/html"	,	$rowfocusurl);
	$rowfocusurl=str_replace('racing.modiauto.com.cn', "www.modiauto.com.cn/html"	,	$rowfocusurl);
	  	
	// 循环出频道
	@$sqlchannel0="SELECT * FROM `cms_channel`  WHERE  `id` = '$rowfocus[channel_id]'";
	$channel0=@mysql_query($sqlchannel0,$connmodicms);
	$rowchannel0=@mysql_fetch_array($channel0);
	// 循环出专栏
	@$sqlcolumn0="SELECT * FROM `cms_column`  WHERE  `id` = '$rowfocus[column_id]'";
	$column0=@mysql_query($sqlcolumn0,$connmodicms);
	$rowcolumn0=@mysql_fetch_array($column0);


	//完整文章url
	$rowarticleurl0= "http://www.modiauto.com.cn/html/".$rowchannel0[location]."/".$rowcolumn0[location]."/".$rowfocus[id].".html";
	echo "新网址：".$rowarticleurl0."<BR>文章标题：".$rowfocus[title]."<HR>";
	//echo "<meta http-equiv=refresh content='0; url=".$rowarticleurl0."'>"; 
	//exit();
	

$urlToEncode=$rowarticleurl0;//要生成二维码的网址

generateQRfromGoogle($urlToEncode);

function generateQRfromGoogle($chl,$widhtHeight ='400',$EC_level='L',$margin='0')

{

$url = urlencode($url);

echo '<img src="http://chart.apis.google.com/chart?chs='.$widhtHeight.'x'.$widhtHeight.'&cht=qr&chld='.$EC_level.'|'.$margin.'&chl='.$chl.'" alt="QR code" widhtHeight="'.$size.'" widhtHeight="'.$size.'"/>';//Google API接口，若失效可到Google网址查询最新接口

}



?>
