<?php
/**
 * UCenter 应用程序开发 Example
 *
 * 设置头像的 Example 代码
 */

$dz_friend_totalnum = uc_friend_ls($Modi_uid,'10','10','10','0');
//echo $dz_friend_totalnum."个好友";
//print_r($dz_friend_totalnum);

$modiusername	=	iconv('GB2312', 'UTF-8', $dz_friend_totalnum['0']['username']);
//echo $modiusername;



?>
<div class="content" id="index_content">
            <div class="index_nav">
                <h2>我的无敌</h2>
                <ul class="s_nav">
                    <li class="tab_item act">主站资讯</li>
                    <li class="tab_item">论坛新帖</li>
                    <li class="tab_item">论坛回复</li>
                    <li class="tab_item">主站回复</li>
                </ul>
				
				<div class="ft_wrap">
                    <p class="ft_btn">发帖</p>
                    <div class="pop_wrap">
	                    <div class="box">
		                    <ul class="pop_zl">
		                        <script type="text/javascript" src="http://bbs.modiauto.com.cn/api.php?mod=js&bid=20"></script>
		                    </ul>
		                </div>
                    </div>
                </div>
				
            </div>
            <div class="in_wrap">
                <div class="tab_con_wrap act">
		            
<?php

	@$sqlarticle_list="SELECT * FROM `cms_article` where `visible`='y' order by id desc limit 0,5";
    $article_list=mysqli_query($connmodicms,$sqlarticle_list);

	while($rowarticle_list=@mysqli_fetch_array($article_list)){
?>						
					
		            <div class="tab_con_item">
		                <a href="article_url.php?aid=<?php echo $rowarticle_list[id];?>" target="_blank">
		                    <img src="<?php echo $rowarticle_list[typeimg];?>" class="tab_con_img" alt="<?php echo $rowarticle_list[title];?>">
		                </a>
		                <div class="hot_icon"><a href="http://newcars.modiauto.com.cn/list/45_.html" target="_blank">新车谍照</a></div>
		                <h4 class="tab_con_tle">
		                    <a href="article_url.php?aid=<?php echo $rowarticle_list[id];?>" target="_blank"><?php echo $rowarticle_list[title];?></a>
		                </h4>
		                <p class="tab_con_p">
		                    <a href="article_url.php?aid=<?php echo $rowarticle_list[id];?>" target="_blank"><em>[导读]</em><?php echo $rowarticle_list[summary];?></a>
		                </p>
		                <div class="share_wrap">
		                    <div class="left_f" style="display:none;">
		                        <i class="share_logo">&nbsp;</i>
		                        分享到
		                        <div class="bdsharebuttonbox" sharetext="" sharedesc="" shareimg="" shareurl="">
		                            <a class="s_weibo" data-cmd="tsina">&nbsp;</a>
		                            <a class="s_weixin" data-cmd="weixin">&nbsp;</a>
		                            <a class="s_qzone" data-cmd="qzone">&nbsp;</a>
		                            <a class="s_douban" data-cmd="douban">&nbsp;</a>
		                            <a class="s_renren" data-cmd="renren">&nbsp;</a>
		                        </div>
		                    </div>
							<span class="right_f">
								<span class="date_wrap"><?php echo $rowarticle_list[publish_time];?></span>
								<i class="reply_icon">&nbsp;</i>
								<span class="reply_num">暂无</span>
							</span>
		                    <div class="clear_f"></div>
		                </div>
						
						<div class="hf_wrap">
	                            <textarea class="text" name="" id="" cols="1" rows="1" placeholder="顺便说点什么吧..."></textarea>
	                            <a href="" class="hf_btn">回帖</a>
						</div>
		            </div>
		            
	<?php }?>		            

	            </div>

	            <div class="tab_con_wrap">
	                <script type="text/javascript" src="http://bbs.modiauto.com.cn/api.php?mod=js&bid=19"></script>
	                    
	                    
	                </div>
                
                

	            </div>
	            <div class="tab_con_wrap">
	                <ul class="reply_wrap">
	                    <li class="r_item">
	                        <div class="hd_pic"><img src="http://static.modiauto.com.cn/car/m_car_2845_1474184196.jpg" alt=""></div>
	                        <div class="rh_p">
	                            <p class="tz">
	                                <a href="##" class="name">紫菜包饭</a>回复了你的帖子<a href="#">《[技术知识] 分享良心好文，无敌带我们来打假》</a>
	                            </p>
	                            <p class="text">
“这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！”</p>
	                        </div>
							<div class="hf_wrap">
	                            <textarea class="text" name="" id="" cols="1" rows="1" placeholder="顺便说点什么吧..."></textarea>
	                            <a href="" class="hf_btn">回帖</a>
	                        </div>
	                    </li>

	                    <li class="r_item">
	                        <div class="hd_pic"><img src="http://static.modiauto.com.cn/car/m_car_2845_1474184196.jpg" alt=""></div>
	                        <div class="rh_p">
	                            <p class="tz">
	                                <a href="##" class="name">紫菜包饭</a>回复了你的帖子<a href="#">《[技术知识] 分享良心好文，无敌带我们来打假》</a>
	                            </p>
	                            <p class="text">
“这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！”</p>
	                        </div>
	                    </li>

	                    <li class="r_item">
	                        <div class="hd_pic"><img src="http://static.modiauto.com.cn/car/m_car_2845_1474184196.jpg" alt=""></div>
	                        <div class="rh_p">
	                            <p class="tz">
	                                <a href="##" class="name">紫菜包饭</a>回复了你的帖子<a href="#">《[技术知识] 分享良心好文，无敌带我们来打假》</a>
	                            </p>
	                            <p class="text">
“这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！”</p>
	                        </div>
	                    </li>

	                    <li class="r_item">
	                        <div class="hd_pic"><img src="http://static.modiauto.com.cn/car/m_car_2845_1474184196.jpg" alt=""></div>
	                        <div class="rh_p">
	                            <p class="tz">
	                                <a href="##" class="name">紫菜包饭</a>回复了你的帖子<a href="#">《[技术知识] 分享良心好文，无敌带我们来打假》</a>
	                            </p>
	                            <p class="text">
“这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！”</p>
	                        </div>
	                    </li>

	                    <li class="r_item">
	                        <div class="hd_pic"><img src="http://static.modiauto.com.cn/car/m_car_2845_1474184196.jpg" alt=""></div>
	                        <div class="rh_p">
	                            <p class="tz">
	                                <a href="##" class="name">紫菜包饭</a>回复了你的帖子<a href="#">《[技术知识] 分享良心好文，无敌带我们来打假》</a>
	                            </p>
	                            <p class="text">
“这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！”</p>
	                        </div>
	                    </li>

	                    <li class="r_item">
	                        <div class="hd_pic"><img src="http://static.modiauto.com.cn/car/m_car_2845_1474184196.jpg" alt=""></div>
	                        <div class="rh_p">
	                            <p class="tz">
	                                <a href="##" class="name">紫菜包饭</a>回复了你的帖子<a href="#">《[技术知识] 分享良心好文，无敌带我们来打假》</a>
	                            </p>
	                            <p class="text">
“这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！”</p>
	                        </div>
	                    </li>
	                </ul>
	            </div>

	            <div class="tab_con_wrap">
	                <ul class="reply_wrap">
	                    <li class="r_item">
	                        <div class="hd_pic"><img src="http://static.modiauto.com.cn/car/m_car_2845_1474184196.jpg" alt=""></div>
	                        <div class="rh_p">
	                            <p class="tz">
	                                <a href="##" class="name">紫菜包饭</a>回复了你的文章评论<a href="#">《[技术知识] 分享良心好文，无敌带我们来打假》</a>
	                            </p>
	                            <p class="text">
“这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！”</p>
	                        </div>
	                    </li>

                        <li class="r_item">
	                        <div class="hd_pic"><img src="http://static.modiauto.com.cn/car/m_car_2845_1474184196.jpg" alt=""></div>
	                        <div class="rh_p">
	                            <p class="tz">
	                                <a href="##" class="name">紫菜包饭</a>回复了你的文章评论<a href="#">《[技术知识] 分享良心好文，无敌带我们来打假》</a>
	                            </p>
	                            <p class="text">
“这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！”</p>
	                        </div>
	                    </li>
	                    <li class="r_item">
	                        <div class="hd_pic"><img src="http://static.modiauto.com.cn/car/m_car_2845_1474184196.jpg" alt=""></div>
	                        <div class="rh_p">
	                            <p class="tz">
	                                <a href="##" class="name">紫菜包饭</a>回复了你的文章评论<a href="#">《[技术知识] 分享良心好文，无敌带我们来打假》</a>
	                            </p>
	                            <p class="text">
“这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！”</p>
	                        </div>
	                    </li>
	                    <li class="r_item">
	                        <div class="hd_pic"><img src="http://static.modiauto.com.cn/car/m_car_2845_1474184196.jpg" alt=""></div>
	                        <div class="rh_p">
	                            <p class="tz">
	                                <a href="##" class="name">紫菜包饭</a>回复了你的文章评论<a href="#">《[技术知识] 分享良心好文，无敌带我们来打假》</a>
	                            </p>
	                            <p class="text">
“这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！”</p>
	                        </div>
	                    </li>
	                    <li class="r_item">
	                        <div class="hd_pic"><img src="http://static.modiauto.com.cn/car/m_car_2845_1474184196.jpg" alt=""></div>
	                        <div class="rh_p">
	                            <p class="tz">
	                                <a href="##" class="name">紫菜包饭</a>回复了你的文章评论<a href="#">《[技术知识] 分享良心好文，无敌带我们来打假》</a>
	                            </p>
	                            <p class="text">
“这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！”</p>
	                        </div>
	                    </li>
	                    <li class="r_item">
	                        <div class="hd_pic"><img src="http://static.modiauto.com.cn/car/m_car_2845_1474184196.jpg" alt=""></div>
	                        <div class="rh_p">
	                            <p class="tz">
	                                <a href="##" class="name">紫菜包饭</a>回复了你的文章评论<a href="#">《[技术知识] 分享良心好文，无敌带我们来打假》</a>
	                            </p>
	                            <p class="text">
“这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！这算什么事？作为车友，看到这个真是疯了！竟然这个网站还要对这类人如此呵护备至，也是醉了！”</p>
	                        </div>
	                    </li>
	                </ul>
	            </div>
            </div>
		</div>
