<?php
$username = stripslashes(trim(@$_POST['user'])); 
$password = stripslashes(trim(@$_POST['password'])); 
if($username=='哇' && $password=='1'){ 
    $res['code'] = 1; 
    $res['username'] = $username; 
    $res['logintime'] = date('Y-m-d H:i'); 
}else{ 
    $res['code'] = 0; 
} 
echo json_encode($res); 


?>