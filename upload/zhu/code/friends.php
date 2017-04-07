<?php
/**
 * UCenter 应用程序开发 Example
 *
 * 设置头像的 Example 代码
 */
echo "<h3>::我的好友::</h3>";

$dz_friend_totalnum = uc_friend_ls($Example_uid,'10','10','10','0');
//echo $dz_friend_totalnum."个好友";
//print_r($dz_friend_totalnum);

$modiusername	=	iconv('GB2312', 'UTF-8', $dz_friend_totalnum['0']['username']);
echo $modiusername;



?>