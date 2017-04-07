
<?php
	echo "<h3>::我的文章收藏::</h3>";

	@$sqlarticle_list="SELECT * FROM `cms_article` where `visible`='y' order by id desc limit 0,20";
	$article_list=@mysql_query($sqlarticle_list,$connmodicms);
	while($rowarticle_list=@mysql_fetch_array($article_list)){
?>		
		
		<div class="item">
	        <a href="article_url.php?aid=<?php echo $rowarticle_list[id];?>" target="_blank">
		        <img src="<?php echo $rowarticle_list[typeimg];?>" alt="">
		        <p><?php echo $rowarticle_list[title];?></p>
	        </a>
	    </div>
<?php }?>