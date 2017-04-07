<?php if(!defined('UC_ROOT')) exit('Access Denied');?>
<script src="js/pm_editor.js" type="text/javascript"></script>
<script type="text/javascript">
lang['pm_prompt_list'] = '输入一个列表项目.\r\n留空或者点击取消完成此列表.';
lang['pm_prompt_img'] = '请输入图片链接地址:';
lang['pm_prompt_url'] = '请输入链接的地址:';
lang['pm_prompt_email'] = '请输入此链接的邮箱地址:';
</script>

<div class="editor">
<a id="editor_b" href="###" onclick="insertunit('[b]', '[/b]')" title="粗体"></a>
<a id="editor_i" href="###" onclick="insertunit('[i]', '[/i]')" title="斜体"></a>
<a id="editor_u" href="###" onclick="insertunit('[u]', '[/u]')" title="下划线"></a>
<a id="editor_color" href="###" onmouseover="showmenu(event, this.id)" title="颜色"></a>
<a id="editor_alignleft" href="###" onclick="insertunit('[align=left]', '[/align]')" title="居左"></a>
<a id="editor_aligncenter" href="###" onclick="insertunit('[align=center]', '[/align]')" title="居中"></a>
<a id="editor_alignright" href="###" onclick="insertunit('[align=right]', '[/align]')" title="居右"></a>
<a id="editor_url" href="###" onclick="inserttag('url', 1)" title="插入链接"></a>
<a id="editor_email" href="###" onclick="inserttag('email', 1)" title="插入邮箱链接"></a>
<a id="editor_img" href="###" onclick="inserttag('img')" title="插入图片"></a>
<a id="editor_list1" href="###" onclick="insertlist('1')" title="排序的列表"></a>
<a id="editor_lista" href="###" onclick="insertlist()" title="未排序列表"></a>
<a id="editor_indent" href="###" onclick="insertunit('[indent]', '[/indent]')" title="增加缩进"></a>
<a id="editor_floatleft" href="###" onclick="insertunit('[float=left]', '[/float]')" title="左浮动"></a>
<a id="editor_floatright" href="###" onclick="insertunit('[float=right]', '[/float]')" title="右浮动"></a>
<a id="editor_quote" href="###" onclick="insertunit('[quote]', '[/quote]')" title="插入引用"></a>
<a id="editor_code" href="###" onclick="insertunit('[code]', '[/code]')" title="插入代码"></a>
</div>
<?php $coloroptions = array('Black', 'Sienna', 'DarkOliveGreen', 'DarkGreen', 'DarkSlateBlue', 'Navy', 'Indigo', 'DarkSlateGray', 'DarkRed', 'DarkOrange', 'Olive', 'Green', 'Teal', 'Blue', 'SlateGray', 'DimGray', 'Red', 'SandyBrown', 'YellowGreen','SeaGreen', 'MediumTurquoise', 'RoyalBlue', 'Purple', 'Gray', 'Magenta', 'Orange', 'Yellow', 'Lime', 'Cyan', 'DeepSkyBlue', 'DarkOrchid', 'Silver', 'Pink', 'Wheat', 'LemonChiffon', 'PaleGreen', 'PaleTurquoise', 'LightBlue', 'Plum', 'White')?>
<div id="editor_color_menu" style="display: none;">
<?php foreach((array)$coloroptions as $key => $colorname) {?>
	<input type="button" style="background-color: <?php echo $colorname;?>" onclick="insertunit('[color=<?php echo $colorname;?>]', '[/color]')" />
<?php }?>
</div>