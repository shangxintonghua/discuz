<?php
header("Content-Type: text/html;charset=UTF-8"); 
/**
 * UCenter 应用程序开发 Example
 *
 * 设置头像的 Example 代码
 */
echo "<h3>::头像修改::</h3>";

echo '
<img src="'.UC_API.'/avatar.php?uid='.$Example_uid.'&size=big">
<img src="'.UC_API.'/avatar.php?uid='.$Example_uid.'&size=middle">
<img src="'.UC_API.'/avatar.php?uid='.$Example_uid.'&size=small">
<br><br>'.uc_avatar($Example_uid);

?>