<?php
$callback = $_GET["callback"];
$a = array(
 'code'=>'CA1998',
    'price'=>'6000',
    'tickets'=>20,
    'func'=>$callback,
);
$result = json_encode($a);
echo "flightHandler($result)";
exit;