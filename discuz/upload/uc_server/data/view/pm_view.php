<?php if(!defined('UC_ROOT')) exit('Access Denied');?>
<?php include $this->gettpl('header_client');?>
<?php include $this->gettpl('pm_nav');?>

<div class="ucinfo">
	<h1>
	</h1>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="newpm">
	<?php foreach((array)$pms as $pm) {?>
		<tbody>
			<tr class="<?php if($pm['authorid'] != $user['uid']) { ?>ontouser <?php } ?>">
				<td class="sel"><?php if($pm['isnew']) { ?><em class="new"></em><?php } ?></td>
				<td class="ava">
				<?php if($pm['authorid'] != $user['uid']) { ?><img src="avatar.php?uid=<?php echo $pm['authorid'];?>&size=small" /><?php } ?>
				</td>
				<td class="title">
				<p><?php echo $pm['dateline'];?></p>
				<?php echo $pm['message'];?></td>
				<td class="ava">
					<?php if($pm['authorid'] == $user['uid']) { ?>
						<img src="avatar.php?uid=<?php echo $pm['authorid'];?>&size=small" />
					<?php } else { ?>
						<a href="index.php?m=pm_client&a=send&pmid=<?php echo $pm['pmid'];?>&touid=<?php echo $touid;?>&plid=<?php echo $plid;?>&daterange=<?php echo $daterange;?>&do=forward&folder=send&<?php echo $extra;?>">转发</a>
					<?php } ?>
				</td>
			</tr>
		</tbody>
	<?php } ?>
	</table>
	<div style="float:right">
		<?php if($touid) { ?>
			<button onclick="location.href='index.php?m=pm_client&a=ls&filter=privatepm'">返回</button>
		<?php } elseif($plid) { ?>
			<button onclick="location.href='index.php?m=pm_client&a=ls&filter=chatpm'">返回</button>
		<?php } ?>
	</div>
	历史短消息:
	<?php if($touid) { ?>
	<a href="index.php?m=pm_client&a=view&touid=<?php echo $touid;?>&filter=<?php echo $filter;?>&<?php echo $extra;?>"<?php if($daterange == 1) { ?> class="bold"<?php } ?>>今天</a>&nbsp;
	<a href="index.php?m=pm_client&a=view&touid=<?php echo $touid;?>&daterange=2&filter=<?php echo $filter;?>&<?php echo $extra;?>"<?php if($daterange == 2) { ?> class="bold"<?php } ?>>昨天</a>&nbsp;
	<a href="index.php?m=pm_client&a=view&touid=<?php echo $touid;?>&daterange=3&filter=<?php echo $filter;?>&<?php echo $extra;?>"<?php if($daterange == 3) { ?> class="bold"<?php } ?>>前天</a>&nbsp;
	<a href="index.php?m=pm_client&a=view&touid=<?php echo $touid;?>&daterange=4&filter=<?php echo $filter;?>&<?php echo $extra;?>"<?php if($daterange == 4) { ?> class="bold"<?php } ?>>上周</a>&nbsp;
	<a href="index.php?m=pm_client&a=view&touid=<?php echo $touid;?>&daterange=5&filter=<?php echo $filter;?>&<?php echo $extra;?>"<?php if($daterange == 5) { ?> class="bold"<?php } ?>>更早</a>&nbsp;
	<?php } elseif($plid) { ?>
	<a href="index.php?m=pm_client&a=view&plid=<?php echo $plid;?>&filter=<?php echo $filter;?>&<?php echo $extra;?>"<?php if($daterange == 1) { ?> class="bold"<?php } ?>>今天</a>&nbsp;
	<a href="index.php?m=pm_client&a=view&plid=<?php echo $plid;?>&daterange=2&filter=<?php echo $filter;?>&<?php echo $extra;?>"<?php if($daterange == 2) { ?> class="bold"<?php } ?>>昨天</a>&nbsp;
	<a href="index.php?m=pm_client&a=view&plid=<?php echo $plid;?>&daterange=3&filter=<?php echo $filter;?>&<?php echo $extra;?>"<?php if($daterange == 3) { ?> class="bold"<?php } ?>>前天</a>&nbsp;
	<a href="index.php?m=pm_client&a=view&plid=<?php echo $plid;?>&daterange=4&filter=<?php echo $filter;?>&<?php echo $extra;?>"<?php if($daterange == 4) { ?> class="bold"<?php } ?>>上周</a>&nbsp;
	<a href="index.php?m=pm_client&a=view&plid=<?php echo $plid;?>&daterange=5&filter=<?php echo $filter;?>&<?php echo $extra;?>"<?php if($daterange == 5) { ?> class="bold"<?php } ?>>更早</a>&nbsp;
	<a href="index.php?m=pm_client&a=member&plid=<?php echo $plid;?>&filter=<?php echo $filter;?>&<?php echo $extra;?>">参与成员</a>&nbsp;
	<?php } ?>
	<?php if($touid) { ?>
		<button onclick="if(confirm('您确定要删除所有短消息吗？')) location.href='index.php?m=pm_client&a=delete&deleteuid[]=<?php echo $touid;?>&filter=<?php echo $filter;?>&<?php echo $extra;?>'">删除全部</button>
	<?php } elseif($plid) { ?>
		<?php if($founderuid == $user['uid']) { ?>
		<button onclick="if(confirm('您确定要删除该群聊的消息吗？')) location.href='index.php?m=pm_client&a=delete&deleteplid[]=<?php echo $plid;?>&filter=<?php echo $filter;?>&<?php echo $extra;?>'">删除群聊</button>
		<?php } else { ?>
		<button onclick="if(confirm('您确定要退出该群聊吗？')) location.href='index.php?m=pm_client&a=delete&quitchapm[]=<?php echo $plid;?>&filter=<?php echo $filter;?>&<?php echo $extra;?>'">退出群聊</button>
		<?php } ?>
	<?php } ?>
	<br style="clear: both" />

	<?php if($replypmid) { ?>
		<form method="post" id="postpmform" name="postpmform" action="index.php?m=pm_client&a=send&replypmid=<?php echo $replypmid;?>&<?php echo $extra;?>">
		<?php if($sendpmseccode) { ?><input type="hidden" name="seccodehidden" value="<?php echo $seccodeinit;?>" /><?php } ?>
		<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>">
		<input type="hidden" name="touid" value="<?php echo $touid;?>">
		<input type="hidden" name="daterange" value="<?php echo $daterange;?>">
		<?php include $this->gettpl('pm_editorbar');?>
		<textarea class="listarea" id="pm_textarea" rows="6" cols="10" name="message" onKeyDown="ctlent(event)"></textarea>
		<?php if($sendpmseccode) { ?>
			<p><label><input type="text" name="seccode" value="" size="5" /> <img width="70" height="21" src="admin.php?m=seccode&seccodeauth=<?php echo $seccodeinit;?>&<?php echo rand();?>" /></label></p>
		<?php } ?>
		<p class="pages_btns"><button name="pmsubmit" class="pmsubmit" type="submit">发送</button></p>
		</form>
	<?php } ?>

</div>

<?php if($scroll == 'bottom') { ?>
	<script type="text/javascript">
	window.onload = function() {
		if(!document.postpmform) {
			return;
		}
		window.scroll(0, document.body.scrollHeight);
		document.postpmform.message.focus();
	}
	</script>
<?php } ?>

<?php include $this->gettpl('footer_client');?>