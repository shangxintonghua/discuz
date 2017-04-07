<?php
include_once("connect.php");

$ip = get_client_ip();
$id = $_POST['id'];
if(!isset($id) || empty($id)) exit;

$ip_sql=mysql_query("select ip from pic_ip where pic_id='$id' and ip='$ip'");
$count=mysql_num_rows($ip_sql);
if($count==0){
	$sql = "update pic set love=love+1 where id='$id'";
	mysql_query( $sql);
	$sql_in = "insert into pic_ip (pic_id,ip) values ('$id','$ip')";
	mysql_query( $sql_in);
	$result = mysql_query("select love from pic where id='$id'");
	$row = mysql_fetch_array($result);
	$love = $row['love'];
	echo $love;
}else{
	echo "赞过了..";
}

//获取用户真实IP
function get_client_ip() {
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
		$ip = getenv("HTTP_CLIENT_IP");
	else
		if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		else
			if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
				$ip = getenv("REMOTE_ADDR");
			else
				if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
					$ip = $_SERVER['REMOTE_ADDR'];
				else
					$ip = "unknown";
	return ($ip);
}
?>