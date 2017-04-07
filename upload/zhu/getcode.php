<?php
	session_start();
	//生成验证码图片
	header("Content-type: image/png");
	// 全数字
	$str = "1,2,3,4,5,6,7,8,9,a,b,c,d,f,g";      //要显示的字符，可自己进行增删
	$list = explode(",", $str);
	$cmax = count($list) - 1;
	$verifyCode = rand(1111,9999);
	 
	$_SESSION['code'] = $verifyCode;        //将字符放入SESSION中
	  
	$im = imagecreate(55,25);    //生成图片
	$black = imagecolorallocate($im, 0,0,0);     //此条及以下三条为设置的颜色
	$white = imagecolorallocate($im, 255,255,255);
	$gray = imagecolorallocate($im, 200,200,200);
	$red = imagecolorallocate($im, 255, 0, 0);
	imagefill($im,25,10,$white);     //给图片填充颜色
	  
	//将验证码绘入图片
	imagestring($im, 50, 10, 8, $verifyCode, $black);    //将验证码写入到图片中
	  
	for($i=0;$i<50;$i++)  //加入干扰象素
	{
		 imagesetpixel($im, rand(1,99) , rand(1,99) , $black);    //加入点状干扰素
		 imagesetpixel($im, rand(1,99) , rand(1,99) , $red);
		 imagesetpixel($im, rand(1,99) , rand(1,99) , $gray);
		 //imagearc($im, rand()p, rand()p, 20, 20, 75, 170, $black);    //加入弧线状干扰素
		 //imageline($im, rand()p, rand()p, rand()p, rand()p, $red);    //加入线条状干扰素
	}
	imagepng($im);
	imagedestroy($im);
?>