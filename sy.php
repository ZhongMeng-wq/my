<?php
/**
template name:首页项目2
*/
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Cache-Control" content="no-transform">
		<meta http-equiv="Cache-Control" content="no-siteapp">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
		<meta name="format-detection" content="telphone=no,email=no">
		<meta name="keywords" content="友链展示loline">
		<meta name="description" itemprop="description" content="">
		<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
		<title>loline洛林</title>
		<link rel="stylesheet" href="https://zhongmeng-wq.github.io/my/style.css" />
		<link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
	</head>
	<body>
		<div id="dhl">
			<button class="dhl_button"><i class="fa fa-bars" style="font-size: 20px;"></i></button>
		</div>
		<div id="left">
			<div class="head_div">
			</div>
			<div class="head_title">
				<img id="img_head" src="https://blog.loline.top/wp-content/uploads/2022/02/head.jpg" />
				<h1>loline首页</h1>
				<span><i>吃喝玩乐万岁!!!</i></span>
				<br />
				<span><i>这是一个项目的首页</i></span>
				<hr class="hr"/>
				<p>此页面为loline已经收录的页面<br />你也可以把你的网页添加进来<br />点击按钮添加友链</p>
				<a href="https://blog.loline.top/%e6%b7%bb%e5%8a%a0%e5%8f%8b%e9%93%be.html" target="_blank"><button class="button1">添加友链</button></a>
			</div>
			<div id="yl">
				<ul class="yl_ul">
					<li class="yl_li">
						<a href="https://space.bilibili.com/36985720?spm_id_from=333.1007.0.0" target="_blank">
							<button class="button ico yl_button">
								<svg class="savg" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"
									class="zhuzhan-icon">
									<path fill-rule="evenodd" clip-rule="evenodd"
										d="M3.73252 2.67094C3.33229 2.28484 3.33229 1.64373 3.73252 1.25764C4.11291 0.890684 4.71552 0.890684 5.09591 1.25764L7.21723 3.30403C7.27749 3.36218 7.32869 3.4261 7.37081 3.49407H10.5789C10.6211 3.4261 10.6723 3.36218 10.7325 3.30403L12.8538 1.25764C13.2342 0.890684 13.8368 0.890684 14.2172 1.25764C14.6175 1.64373 14.6175 2.28484 14.2172 2.67094L13.364 3.49407H14C16.2091 3.49407 18 5.28493 18 7.49407V12.9996C18 15.2087 16.2091 16.9996 14 16.9996H4C1.79086 16.9996 0 15.2087 0 12.9996V7.49406C0 5.28492 1.79086 3.49407 4 3.49407H4.58579L3.73252 2.67094ZM4 5.42343C2.89543 5.42343 2 6.31886 2 7.42343V13.0702C2 14.1748 2.89543 15.0702 4 15.0702H14C15.1046 15.0702 16 14.1748 16 13.0702V7.42343C16 6.31886 15.1046 5.42343 14 5.42343H4ZM5 9.31747C5 8.76519 5.44772 8.31747 6 8.31747C6.55228 8.31747 7 8.76519 7 9.31747V10.2115C7 10.7638 6.55228 11.2115 6 11.2115C5.44772 11.2115 5 10.7638 5 10.2115V9.31747ZM12 8.31747C11.4477 8.31747 11 8.76519 11 9.31747V10.2115C11 10.7638 11.4477 11.2115 12 11.2115C12.5523 11.2115 13 10.7638 13 10.2115V9.31747C13 8.76519 12.5523 8.31747 12 8.31747Z"
										fill="currentColor"></path>
								</svg>
								哔哩哔哩
							</button>

						</a>
					</li>

					<li class="yl_li qq">
						<a class="qq" href="tencent://message/?uin=3157152301&amp" target="_blank">
							<button class="button ico yl_button">
								<i class="fa fa-qq" aria-hidden="true"></i> 联系QQ
							</button>
						</a>
					</li>
					<li class="yl_li mqq">
						<a class="mqq" href="mqqwpa://im/chat?chat_type=wpa&uin=3157152301&version=1&src_type=web">
							<button class="button ico yl_button">
								<i class="fa fa-qq" aria-hidden="true"></i> 3157152301
							</button>
						</a>
					</li>

					<li class="yl_li">
						<a href="https://qm.qq.com/cgi-bin/qm/qr?k=KKoXGxnmJp7ZnUsEgv8Y9gW2O2uq3uuX&jump_from=webapi"
							target="_blank">
							<button class="button ico yl_button">
								<i class="fa fa-qq" aria-hidden="true"></i> QQ交流群
							</button>
						</a>
					</li>
					<li class="yl_li">
						<a href="https://blog.loline.top/img/wechat.jpg" target="_blank">
							<button class="button ico yl_button">
								<i class="fa fa-weixin" aria-hidden="true"></i> Wechat
							</button>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div id="right">
			<ul class="xm_ul">
			    <?php
			    $bookmarks = get_bookmarks(array('orderby'=>'rand'));
                if(!empty($bookmarks)){
                    foreach($bookmarks as $bookmark){
                        $friendimg = $bookmark->link_image;
                        if(empty($friendimg)) $friendimg = get_stylesheet_directory_uri().'/static/images/avatar.png';
                        echo '
                            <li class="xm_li">
            					<a href="'.$bookmark->link_url.'" target="_blank">
            						<div class="xm_l">
            							<img class="xm_img" src="'.$friendimg.'" />
            						</div>
            						<div class="xm_r">
            							<h2 class="nr_font xm_h2" style="">'.$bookmark->link_name.'</h2>
            							<h4 class="nr_font xm_h6" style=""><i>'.$bookmark->link_description.'</i></h4>
            						</div>
            					</a>
            				</li>';
                    }
                } 
                ?>
			</ul>
		</div>
		<div class="foot">
			<button class="foot_button">© <?php echo date('Y'); ?> <a style="color: blue;" href="https://www.loline.top">loline </a>| 版权所有</button>
		</div>
	</body>
</html>
