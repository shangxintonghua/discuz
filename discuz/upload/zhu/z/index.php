<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="keywords" content="jquery">
<meta name="description" content="">
<title>jQuery+Ajax+PHP实现“赞”</title>
<link rel="stylesheet" type="text/css" href="../css/main.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	$("p a").click(function(){
		var love = $(this);
		var id = love.attr("rel");
		love.fadeOut(300);
		$.ajax({
			type:"POST",
			url:"love.php",
			data:"id="+id,
			cache:false,
			success:function(data){
				love.html(data);
				love.fadeIn(300);
			}
		});
		return false;
	});
});
</script>
<style type="text/css">
@charset "utf-8";
/* CSS Document */
html,body,div,span,h1,h2,h3,h4,h5,h6,p,pre,a,code,em,img,small,strong,sub,sup,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label{margin:0;padding:0;border:0;outline:0;font-size:100%;vertical-align:baseline;background:transparent}
a{color:#007bc4/*#424242*/; text-decoration:none;}
a:hover{text-decoration:underline}
ol,ul{list-style:none}
table{border-collapse:collapse;border-spacing:0}
body{height:100%; font:12px/18px "Microsoft Yahei", Tahoma, Helvetica, Arial, Verdana, "\5b8b\4f53", sans-serif; color:#51555C; background:#162934 url(../images/body_bg.gif) repeat-x}
img{border:none}


#header{width:980px; height:92px; margin:0 auto; position:relative}
#logo{width:240px; height:90px; background:url(../images/logo_demo.gif) no-repeat}
#logo h1{text-indent:-999em}
#logo h1 a{display:block; width:240px; height:90px}


#main{width:980px; min-height:600px; margin:30px auto 0 auto; background:#fff; -moz-border-radius:12px;-khtml-border-radius: 12px;-webkit-border-radius: 12px; border-radius:12px;}
h2.top_title{margin:4px 20px; padding-top:15px; padding-left:20px; padding-bottom:10px; border-bottom:1px solid #d3d3d3; font-size:18px; color:#a84c10; background:url(../images/arrL.gif) no-repeat 2px 14px}

#footer{height:60px;}
#footer p{ padding:10px 2px; line-height:24px; text-align:center}
#footer p a:hover{color:#51555C}





.clear{clear:both}
.list{width:760px; margin:20px auto}
.list li{float:left; width:360px; height:280px; margin:10px; position:relative}
.list li p{position:absolute; top:0; left:0; width:360px; height:24px; line-height:24px; background:#000; opacity:.8;filter:alpha(opacity=80);}
.list li p a{padding-left:30px; height:24px; background:url(images/heart.png) no-repeat 4px -1px;color:#fff; font-weight:bold; font-size:14px}
.list li p a:hover{background-position:4px -25px;text-decoration:none}
</style>
</head>

<body>

<div id="main">
     <ul class="list">
     <?php
	 include_once("connect.php");
	 $sql = mysql_query("select * from pic");
	 while($row=mysql_fetch_array($sql)){
		 $pic_id = $row['id'];
		 $pic_name = $row['pic_name'];
		 $pic_url = $row['pic_url'];
		 $love = $row['love'];
	 ?>
     	<li><img src="<?php echo $pic_url;?>" alt="<?php echo $pic_name;?>"><p><a href="#" title="赞" class="img_on" rel="<?php echo $pic_id;?>"><?php echo $love;?></a></p></li>
     
     <p>踩<a href="#" title="赞" class="img_on" rel="<?php echo $pic_id+1;?>"><?php echo $love+1;?></a></p>
     
	 <?php }?>
     </ul>
     <div class="clear"></div>
   
</div>
</body>
</html>