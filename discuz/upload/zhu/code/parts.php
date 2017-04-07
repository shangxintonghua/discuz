
<?php
	echo "<h3>::改件仓库收藏::</h3>";

	@$sqlparts_list="SELECT * FROM `cms_parts`";
	$parts_list=@mysql_query($sqlparts_list,$connmodicms);
	while($rowparts_list=@mysql_fetch_array($parts_list)){
?>		
		
		<div class="item">
	        <a href="index_parts_details.php?id=<?php echo $rowparts_list[id];?>">
		        <img src="http://static.modiauto.com.cn/gjck/<?php echo $rowparts_list[icon_img];?>" alt="">
		        <p>[新] <?php echo $rowparts_list[name];?></p>
	        </a>
	    </div>
<?php }?>