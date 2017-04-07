<?php if(!defined('UC_ROOT')) exit('Access Denied');?>
<script type="text/javascript">
function checkall(form, prefix, checkall) {
	var checkall = checkall ? checkall : 'chkall';
	for(var i = 0; i < form.elements.length; i++) {
		var e = form.elements[i];
		if(e.name && e.name != checkall && (!prefix || (prefix && e.name.match(prefix)))) {
			e.checked = form.elements[checkall].checked;
		}
	}
}

function toggle_collapse(objname, ctrlobj) {
	var obj = document.getElementById(objname);
	if(obj.style.display == '') {
		obj.style.display = 'none';
		ctrlobj.innerHTML = '<img src="images/default/spread.gif" />';
	} else {
		obj.style.display = '';
		ctrlobj.innerHTML = '<img src="images/default/shrink.gif" />';
	}
}

function ctlent(event) {
	if((event.ctrlKey && event.keyCode == 13) || (event.altKey && event.keyCode == 83)) {
		document.getElementById('postpmform').saveoutbox.value = 0;
		document.getElementById('postpmform').submit();
	}
}
</script>

<div class="ucnav">
<a <?php if($filter == 'newpm') { ?>class="ucontype" <?php } ?>href="index.php?m=pm_client&a=ls&filter=newpm">未读消息<?php if($unreadpmnum) { ?><strong>[<?php echo $unreadpmnum;?>]</strong><?php } ?></a>
<a <?php if($filter == 'privatepm') { ?>class="ucontype" <?php } ?>href="index.php?m=pm_client&a=ls&filter=privatepm">私人消息<?php if($pmnum_private) { ?><strong>[<?php echo $pmnum_private;?>]</strong><?php } ?></a>
<a <?php if($folder == 'blackls') { ?>class="ucontype" <?php } ?>href="index.php?m=pm_client&a=ls&folder=blackls">忽略列表</a>
<a <?php if($folder == 'send') { ?>class="ucontype sendpmontype" <?php } else { ?> class="sendpm" <?php } ?>href="index.php?m=pm_client&a=send&folder=send">发送短消息</a>

<?php if($unreadpmnum) { ?>
	<span class="navinfo">
		<img src="images/default/newpm.gif" />
		<?php if($unreadpmnum) { ?><strong><?php echo $unreadpmnum;?></strong> <a <?php if($filter == 'newpm') { ?>class="ontype" <?php } ?>href="index.php?m=pm_client&a=ls&filter=newpm">条未读消息</a><?php } ?>
	</span>
<?php } ?>
</div>