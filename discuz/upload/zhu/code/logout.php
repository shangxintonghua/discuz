<?php

/**
 *
 *
 *用户退出的代码
 * 使用到的接口函数：
 * uc_user_synlogout()	可选，生成同步退出的代码
 */

setcookie('MODICERTIFICATE', '', 0);

//生成同步退出的代码
$ucsynlogout = uc_user_synlogout();
echo $ucsynlogout;
$Modi_uid = $Modi_username = '';
echo "<meta http-equiv=refresh content='0; url=login.php'>";
?>