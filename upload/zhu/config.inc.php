<?php


define('UC_CONNECT', 'mysql');
define('UC_DBHOST', 'localhost');
define('UC_DBUSER', 'root');
define('UC_DBPW', '');
define('UC_DBNAME', 'test'); //ucenter���ݿ�����
define('UC_DBCHARSET', 'utf8');//ucenter���ݿ��ַ���
define('UC_DBTABLEPRE', '`test`.test_ucenter_');

define('UC_KEY', 'Y7aeOe5dEbt9G1xd6fG9I0eaN4uc12z3B7p1166fS4A1u2m2Xfz2m0c6c0n01ae7');
define('UC_API', 'http://localhost/uc_server');
define('UC_CHARSET', 'utf-8');
define('UC_IP', '');
define('UC_APPID', '2');
define('UC_PPP', '20');


//ucexample_2.php �õ���Ӧ�ó������ݿ����Ӳ���
$dbhost = 'localhost';			// ���ݿ������
$dbuser = 'root';			// ���ݿ��û���
$dbpw = '';				// ���ݿ�����
$dbname = 'test';			// ���ݿ���
$pconnect = 0;				// ���ݿ�־����� 0=�ر�, 1=��
$tablepre = 'test_ucenter_';   		// ����ǰ׺, ͬһ���ݿⰲװ�����̳���޸Ĵ˴�
$dbcharset = 'utf-8';			// MySQL �ַ���, ��ѡ 'gbk', 'big5', 'utf8', 'latin1', ����Ϊ������̳�ַ����趨

//ͬ����¼ Cookie ����
$cookiedomain = '127.0.0.1'; 			// cookie ������
$cookiepath = '/';			// cookie ����·��