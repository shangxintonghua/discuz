<?php 
@session_start();  
include_once('zhu_modidata.php');

 		@$sqlmodiuser="SELECT * FROM `test_common_member`  WHERE  `uid` = '$_GET[userID]'";
        $modiuser=mysqli_query($connmodibbs,$sqlmodiuser);
        $rowmodiuser=mysqli_fetch_array($modiuser);
?>
document.write("<?php echo $rowmodiuser[username];?>");
