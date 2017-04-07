<?php if(!defined('UC_ROOT')) exit('Access Denied');?>
<?php include $this->gettpl('header_client');?>
<?php include $this->gettpl('pm_nav');?>

<script type="text/javascript">
function switchfirendls() {
	if(document.getElementById('friendls').style.display == '') {
		document.getElementById('friendls').style.display = 'none';
		document.getElementById('pmcontent').className = 'pmcontent noside';
	} else {
		document.getElementById('friendls').style.display = '';
		document.getElementById('pmcontent').className = 'pmcontent';
	}
}
</script>

<div class="ucinfo">
	<?php if($pmid && $do == 'forward') { ?>
		<h1><span><button onclick="location.href='index.php?m=pm_client&a=view&touid=<?php echo $touid;?>&plid=<?php echo $plid;?>&<?php echo $extra;?>'">返回</button></span></h1>
	<?php } ?>

	<form method="post" id="postpmform" name="postpmform" action="index.php?m=pm_client&a=send&<?php echo $extra;?>">
	<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>">
	<?php if($sendpmseccode) { ?><input type="hidden" name="seccodehidden" value="<?php echo $seccodeinit;?>" /><?php } ?>
	<div class="pmcontent<?php if(!$friends) { ?> noside<?php } ?>" id="pmcontent">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="newpm">
		<tbody>
			<tr>
				<td class="sel"></td>
				<th>收件人:</th>
				<td>
				<input class="ucinput" type="text" name="msgto" size="65" value="<?php echo $touser;?>" />
				</td>
			</tr>
			<tr>
				<td class="sel"></td>
				<th>消息内容:</th>
				<td>
				<?php include $this->gettpl('pm_editorbar');?>
				<textarea class="listarea" id="pm_textarea" rows="15" cols="10" style="height: 210px" name="message" onKeyDown="ctlent(event)"><?php echo $message;?></textarea>
				</td>
			</tr>
			<?php if($sendpmseccode) { ?>
			<tr>
				<td class="sel"></td>
				<th>验证码:</th>
				<td>
					<label><input type="text" name="seccode" value="" size="5" /> <img width="70" height="21" src="admin.php?m=seccode&seccodeauth=<?php echo $seccodeinit;?>&<?php echo rand();?>" /></label>
				</td>
			</tr>
			<?php } ?>
		</tbody>

		<tfoot>
			<tr>
				<td class="sel"></td>
				<th></th>
				<td>
				<button name="pmsubmit" type="submit" class="pmsubmit">发送</button>
				<input type="checkbox" name="type" value="1" checked="checked" />群聊
				</td>
			</tr>
		</tfoot>
	</table>
	</div>
	<?php if($friends) { ?>
	<div class="pmside" id="friendls">
		<h3><input type="checkbox" name="chkall" onclick="checkall(this.form, 'friend')" value="<?php echo $pm['pmid'];?>" /> 好友</h3>
		<ul>
		<?php foreach((array)$friends as $friend) {?>
			<li><input type="checkbox" name="friend[]" value="<?php echo $friend['friendid'];?>"> <?php echo $friend['username'];?></li>
		<?php } ?>
		</ul>
	</div>
	<?php } ?>
	</form>
</div>

<?php include $this->gettpl('footer_client');?>