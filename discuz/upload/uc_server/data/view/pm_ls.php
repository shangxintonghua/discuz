<?php if(!defined('UC_ROOT')) exit('Access Denied');?>
<?php include $this->gettpl('header_client');?>
<?php include $this->gettpl('pm_nav');?>

<div class="ucinfo">
<form method="post" action="index.php?m=pm_client&a=delete&filter=<?php echo $filter;?>&<?php echo $extra;?>">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="pmlist">
<?php $pmrange = 0;?>
<?php if($pmlist) { ?>
	<tr class="ctrlbar">
		<td class="sel"><input type="checkbox" name="chkall" onclick="checkall(this.form, 'delete')" /></td>
		<td class="ava"><button name="pmsend" type="submit">删除</button></td>
		<td class="pef"></td>
		<td class="">
			<?php if($multipage) { ?><?php echo $multipage;?><?php } ?>
		</td>
	</tr>
	<?php foreach((array)$pmlist as $pm) {?>
		<tr<?php if($pm['isnew'] == 1) { ?> class="onset"<?php } ?>>
			<td class="sel">
			<?php if($pm['pmtype'] == 1) { ?>
				<input type="checkbox" name="deleteuid[]" value="<?php echo $pm['touid'];?>" />
			<?php } elseif($pm['pmtype'] == 2 && $pm['authorid'] == $user['uid']) { ?>
				<input type="checkbox" name="deleteplid[]" value="<?php echo $pm['plid'];?>" />
			<?php } elseif($pm['pmtype'] == 2 && $pm['authorid'] != $user['uid']) { ?>
				<input type="checkbox" name="deletequitplid[]" value="<?php echo $pm['plid'];?>" />
			<?php } ?>
			</td>
				<td class="ava">
				<?php if($pm['lastauthorid']) { ?><img src="avatar.php?uid=<?php echo $pm['lastauthorid'];?>&size=small" /><?php } ?>
				</td>
				<td class="per">
				<?php if($pm['pmtype'] == 1) { ?>
					<?php if($pm['lastauthorid'] == $user['uid']) { ?>
						发起者<?php echo $pm['tousername'];?>
					<?php } else { ?>
						来自: <?php echo $pm['lastauthor'];?>
					<?php } ?>
				<?php } elseif($pm['pmtype'] == 2) { ?>
					<?php if($pm['lastauthorid'] == $user['uid']) { ?>
						发送给大家
					<?php } else { ?>
						来自: <?php echo $pm['lastauthor'];?>
					<?php } ?>
				<?php } ?>
				<p><?php echo $pm['lastdateline'];?></p>
				</td>
				<td class="title">
				<h2>
				<?php if($pm['pmtype'] == 1) { ?>
					<a href="index.php?m=pm_client&a=view&touid=<?php echo $pm['touid'];?>&daterange=<?php echo $pm['daterange'];?>&filter=<?php echo $pm['filter'];?>&scroll=bottom&<?php echo $extra;?>" id="pm_view_<?php echo $pm['pmid'];?>">与<?php echo $pm['tousername'];?>的对话</a>
				<?php } else { ?>
					<a href="index.php?m=pm_client&a=view&plid=<?php echo $pm['plid'];?>&daterange=<?php echo $pm['daterange'];?>&filter=<?php echo $pm['filter'];?>&scroll=bottom&<?php echo $extra;?>" id="pm_view_<?php echo $pm['pmid'];?>"><?php echo $pm['subject'];?></a>(参与人数: <?php echo $pm['members'];?>)
				<?php } ?>
				</h2>
				<p <?php if($pm['isnew']) { ?>class="boldtext" <?php } ?>><?php echo $pm['message'];?></p>
			</td>
		</tr>
	<?php } ?>
	</tbody>
		<tfoot>
			<tr class="ctrlbar">
				<td class="sel"><input type="checkbox" onclick="this.form.chkall.click()" /></td>
				<td class="ava"><button onclick="this.form.pmsend.click()" type="button">删除</button></td>
				<td class="pef"></td>
				<td class="">
					<?php if($multipage) { ?><?php echo $multipage;?><?php } ?>
				</td>
			</tr>
		</tfoot>
	</table>
<?php } else { ?>
	<tr>
		<td colspan="4">没有短消息</td>
	</tr>
	</table>
<?php } ?>
</form>
</div>

<?php include $this->gettpl('footer_client');?>