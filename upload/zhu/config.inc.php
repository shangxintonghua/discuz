<?php


define('UC_CONNECT', 'mysql');
define('UC_DBHOST', 'localhost');
define('UC_DBUSER', 'root');
define('UC_DBPW', '');
define('UC_DBNAME', 'test'); //ucenter数据库密码
define('UC_DBCHARSET', 'utf8');//ucenter数据库字符集
define('UC_DBTABLEPRE', '`test`.test_ucenter_');

define('UC_KEY', 'Y7aeOe5dEbt9G1xd6fG9I0eaN4uc12z3B7p1166fS4A1u2m2Xfz2m0c6c0n01ae7');
define('UC_API', 'http://localhost/uc_server');
define('UC_CHARSET', 'utf-8');
define('UC_IP', '');
define('UC_APPID', '2');
define('UC_PPP', '20');


//ucexample_2.php 用到的应用程序数据库连接参数
$dbhost = 'localhost';			// 数据库服务器
$dbuser = 'root';			// 数据库用户名
$dbpw = '';				// 数据库密码
$dbname = 'test';			// 数据库名
$pconnect = 0;				// 数据库持久连接 0=关闭, 1=打开
$tablepre = 'test_ucenter_';   		// 表名前缀, 同一数据库安装多个论坛请修改此处
$dbcharset = 'utf-8';			// MySQL 字符集, 可选 'gbk', 'big5', 'utf8', 'latin1', 留空为按照论坛字符集设定

//同步登录 Cookie 设置
$cookiedomain = '127.0.0.1'; 			// cookie 作用域
$cookiepath = '/';			// cookie 作用路径