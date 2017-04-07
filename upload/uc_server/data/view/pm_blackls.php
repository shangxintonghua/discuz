<?php if(!defined('UC_ROOT')) exit('Access Denied');?>
<?php include $this->gettpl('header_client');?>
<?php include $this->gettpl('pm_nav');?>

<div class="ucinfo">
<form method="post" action="index.php?m=pm_client&a=blackls">
	<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
	<table cellpadding="0" cellspacing="0" width="100%">
		<tbody>
			<tr>
				<td>
					<textarea class="listarea" id="pm_blackls" rows="6" cols="10" name="blackls"><?php echo $blackls;?></textarea><br />
					<div class="ucnote">添加到该列表中的用户给您发送短消息时将不予接收<br />添加多个忽略人员名单时用逗号 "," 隔开，如“张三,李四,王五”<br />如需禁止所有用户发来的短消息，请设置为 "&#123;ALL&#125;"</div>
				</td>
			</tr>
		</tbody>
	</table>
	
	<div class="pages_btns">
		<span class="postbtn">
			<button name="pmsubmit" class="pmsubmit" type="submit">保存</button>
		</span>
	</div>
</form>
</div>

<?php include $this->gettpl('footer_client');?>