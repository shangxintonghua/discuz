<?php
/**
 * 文档编辑
 *
 * @version		zhu_modidata.php
 * @name_cn		数据库modidata连接文件
 * @editor			zhuhuiming .
 * @update			11-1 .
 * @copyright		edit by:zhu Copyright (c) 1989 - 2016, DesDev, Inc.
 */
 
@session_start();

// 新论坛数据库
$connmodibbs = mysqli_connect("localhost", "root","","test");
mysqli_query($connmodibbs,"SET NAMES 'utf8'");

ini_set('date.timezone','Asia/Shanghai');
$zhudate=date('Y-m-d H:i:s');
error_reporting(0);
?>
