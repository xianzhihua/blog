<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:69:"C:\wamp\www\tp5blog\public/../application/index\view\index\index.html";i:1541077909;s:59:"C:\wamp\www\tp5blog\application\index\view\common\meta.html";i:1531652336;s:58:"C:\wamp\www\tp5blog\application\index\view\common\top.html";i:1541078261;s:59:"C:\wamp\www\tp5blog\application\index\view\common\left.html";i:1541078329;s:60:"C:\wamp\www\tp5blog\application\index\view\common\right.html";i:1541076767;s:61:"C:\wamp\www\tp5blog\application\index\view\common\footer.html";i:1531924988;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>冼智铧 - 一个前端小白</title>
		<meta name="author" content="冼智铧">
	<meta name="description" content="一个前端小白">
	<meta name="keywords" content="冼智铧,冼智铧个人博客,个人博客">
	<link rel="icon" type="image/gif" href="/tp5blog/public/static/index/images/title.png" >
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="icon" type="image/gif" href="/tp5blog/public/static/index/images/title.png" >
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/tp5blog/public/static/index/css/index.css">
<body>
	<div class="container">
		<header class="top" id="top">
	<div class="top-left">
		冼智铧
	</div>
	<div class="top-right" style="position: relative;">

		<div class="search-div animatedDown">
			<form  method="get" action="<?php echo url('index/Search/index'); ?>">
				<input type="text" class="search-div-form" name="keywords" placeholder="输入关键词回车搜索...">
			</form>
		</div>

		<div class="dropdown hidden-xs pull-right" style="display: inline;">
		  <a class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">
		    登录
		    <span class="caret"></span>
		  </a>
		  <ul class="dropdown-menu dropdown-menu-right shake" role="menu" aria-labelledby="dropdownMenu1">
		   	<form>
		    	<label for="navbar-login-user">用户名</label>
		    	<input type="text" name="username" class="form-control" placeholder="用户名或电子邮箱">
		    
		    	<label for="navbar-login-user">密码</label>
		    	<input type="password" name="password" class="form-control" placeholder="密码">
		    	<button type="submit" id="login-submit" name="submitLogin" class="btn btn-block btn-primary">
			    	<span class="text">暂未开放</span>
		    	</button>
		    </form>
		  </ul>
		</div> 
		<i class="glyphicon glyphicon-search pull-right toggle-search"></i>
		<i class="glyphicon glyphicon-menu-hamburger pull-right small-btn toggle-left" style="background-color: rgb(142,133,200);"></i>
	</div>
</header>
	
<div id="zhebu"></div>
<div id="gotop"><i class="glyphicon glyphicon-hand-up"></i></div>
		<div class="main">
			<div class="main-left">
			<div class="big-nav">
	<div class="margin-left-div">
		<img src="http://q.qlogo.cn/headimg_dl?dst_uin=1103223758&spec=100" height="96" width="96">
		<h4 class="author">zhihua</h4>
		<p class="desc">最美不过重逢</p>
	</div>
	<div class="hr"></div>
	<div class="margin-left-div">
		<p class="margin-left-div-title">导航</p>
		<ul class="margin-left-ul">
			<a href="/tp5blog/public/index.php"><li><i class="glyphicon glyphicon-home"></i>首页</li></a>
		</ul>
	</div>
	<div class="hr"></div>
	<div class="margin-left-div">
		<p class="margin-left-div-title">组成</p>
		<ul class="margin-left-ul">
			<li>
				<i class="glyphicon glyphicon-th"></i>分类<i class="glyphicon glyphicon-menu-right pull-right"></i>					
				<ul>
					<?php if(is_array($cateres) || $cateres instanceof \think\Collection || $cateres instanceof \think\Paginator): $i = 0; $__LIST__ = $cateres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<a href="/tp5blog/public/index.php/cate/<?php echo $vo['id']; ?>.html"><li><?php echo $vo['catename']; ?></li></a>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</li>
			<li>
				<i class="glyphicon glyphicon-file"></i>页面<i class="glyphicon glyphicon-menu-right pull-right"></i>
				<ul>
					<a href="<?php echo url('index/message/index'); ?>"><li>留言</li></a>
				</ul>
			</li>
			<li>
				<i class="glyphicon glyphicon-link"></i>友链<i class="glyphicon glyphicon-menu-right pull-right"></i>
				<ul>
					<?php if(is_array($linkres) || $linkres instanceof \think\Collection || $linkres instanceof \think\Paginator): $i = 0; $__LIST__ = $linkres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<a href="<?php echo $vo['url']; ?>" target="_blank"><li><?php echo $vo['title']; ?></li></a>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</li>
			</a>
		</ul>
	</div>
</div>

			</div>
			<div class="main-right">
				<div class="main-right-left">
					<div class="alert alert-warning">
						<a href="#" class="close" data-dismiss="alert">
							&times;
						</a>
						<p>公告：欢迎大家访问小站，有问题请留言。</p>
					</div>
					<div class="alert-bottom" data-count="<?php echo $articleres_count; ?>">
						<h4>智铧博客</h4>
						<p>最美不过重逢。</p>
					</div>
					<div class="content cate_content" id="content">
					<?php if(is_array($articleres) || $articleres instanceof \think\Collection || $articleres instanceof \think\Paginator): $i = 0; $__LIST__ = $articleres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<div class="panel panel-default">
							<div class="panel-heading">
								<a href="/tp5blog/public/index.php/article/<?php echo $vo['id']; ?>.html" data-pjax ><?php if($vo['pic']): ?><img src="/tp5blog/public/static<?php echo $vo['pic']; ?>" width="100%"><?php else: ?><img src="/tp5blog/public/static/error.jpg" width="100%"><?php endif; ?></a>
							</div>
							<div class="panel-body dec dec-div">
								<a href="/tp5blog/public/index.php/article/<?php echo $vo['id']; ?>.html" data-pjax ><h4><?php echo $vo['title']; ?></h4></a>
								<div class="modal-btn" data-toggle="modal" data-target="#myModal" data-id="<?php echo $vo['id']; ?>">
									<p class="desc_div"><?php echo $vo['desc']; ?><a class="down">预览</a></p>	
									<hr>
									<div class="time">
										<i class="glyphicon glyphicon-time"></i> <?php echo $vo['time']; ?> <i class="jiange"></i>
										<i class="glyphicon glyphicon-user"></i> <?php echo $vo['author']; ?> <i class="jiange"></i>
										<i class="glyphicon glyphicon-tag keywords"></i> 
											<?php
												$arr=explode(',',$vo['keywords']);
												foreach ($arr as $k => $v){
													echo "<a href='/index.php/index/search/index?keywords=$v'>$v</a> ";
												}
											?>	
										<i class="jiange"></i>
										<i class="glyphicon glyphicon-comment"></i> <?php echo $vo['count']; ?> <i class="jiange"></i>
										<i class="glyphicon glyphicon-eye-open"></i> <?php echo $vo['click']; ?> <i class="jiange"></i>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
				<div class="main-right-right animate">
				<div id="right-tab">
    <ul class="nav nav-pills nav-justified">
      <li class="active">
        <a class="nav-link" href="#home" id="home-tab" data-toggle="tab"><i class="glyphicon glyphicon-fire"></i></a>
      </li>
      <li class="">
        <a class="nav-link" href="#lianxi" id="lianxi-tab" data-toggle="tab"><i class="glyphicon glyphicon-comment"></i></a>
      </li>
      <li class="">
        <a class="nav-link" href="#intro" id="intro-tab" data-toggle="tab"><i class="glyphicon glyphicon-retweet"></i></a>
      </li>
    </ul>
    <div id="tabscontent" class="tab-content">
        <div class="tab-pane active" id="home">
            <h4>热门文章</h4>
            <?php if(is_array($clickres) || $clickres instanceof \think\Collection || $clickres instanceof \think\Paginator): $i = 0; $__LIST__ = $clickres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="media">
              <div class="media-left">
                <a href="/tp5blog/public/index.php/article/<?php echo $vo['id']; ?>.html">
                  <?php if($vo['pic']): ?>
                    <img class="media-object" src="/tp5blog/public/static<?php echo $vo['pic']; ?>" alt="<?php echo $vo['title']; ?>">
                  <?php else: ?>
                    <img class="media-object" src="/tp5blog/public/static/404.jpg" alt="">
                  <?php endif; ?>
                </a>
              </div>
              <div class="media-body">
                <a href="/tp5blog/public/index.php/article/<?php echo $vo['id']; ?>.html"><p class="media-heading"><?php echo $vo['title']; ?></p></a>
                <p class="media-body2"><i class="glyphicon glyphicon-eye-open"></i> <?php echo $vo['click']; ?><i class="jiange"></i><i class="glyphicon glyphicon-comment"></i> <?php echo $vo['count']; ?></p>
              </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="tab-pane" id="lianxi">
            <h4>最新评论</h4>
            <?php if(is_array($newMes) || $newMes instanceof \think\Collection || $newMes instanceof \think\Paginator): $i = 0; $__LIST__ = $newMes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="media">
              <div class="media-left">
                <a href="#">
                  <img class="media-object" src="<?php echo $vo['img']; ?>">
                </a>
              </div>
              <div class="media-body">
                <p class="media-heading"><?php echo $vo['name']; ?></p>
                <p class="newmes-content"><?php echo $vo['content']; ?></p>
              </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="tab-pane" id="intro">
            <h4>随机文章</h4>
            <?php if(is_array($tjres) || $tjres instanceof \think\Collection || $tjres instanceof \think\Paginator): $i = 0; $__LIST__ = $tjres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="media">
              <div class="media-left">
                <a href="/tp5blog/public/index.php/article/<?php echo $vo['id']; ?>.html">
                  <?php if($vo['pic']): ?>
                    <img class="media-object" src="/tp5blog/public/static<?php echo $vo['pic']; ?>" alt="<?php echo $vo['title']; ?>">
                  <?php else: ?>
                    <img class="media-object" src="/tp5blog/public/static/404.jpg" alt="">
                  <?php endif; ?>
                </a>
              </div>
              <div class="media-body">
                <a href="/tp5blog/public/index.php/article/<?php echo $vo['id']; ?>.html"><p class="media-heading"><?php echo $vo['title']; ?></p></a>
                <p class="media-body2"><i class="glyphicon glyphicon-eye-open"></i> <?php echo $vo['click']; ?><i class="jiange"></i><i class="glyphicon glyphicon-comment"></i> <?php echo $vo['count']; ?></p>
              </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</div>
<div class="p-20" id="fix">
    <h4>分类</h4>
    <ul class="list-group">
        <?php if(is_array($cateres) || $cateres instanceof \think\Collection || $cateres instanceof \think\Paginator): $i = 0; $__LIST__ = $cateres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li class="list-group-item"> 
            <a href="/tp5blog/public/index.php/cate/<?php echo $vo['id']; ?>.html"> <span class="badge pull-right"><?php echo $vo['count']; ?></span><?php echo $vo['catename']; ?></a>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?> 
    </ul>
</div>
<div class="p-20">
    <h4>标签云</h4>
    <div class="tag-yun">
        <?php if(is_array($tagres) || $tagres instanceof \think\Collection || $tagres instanceof \think\Paginator): $i = 0; $__LIST__ = $tagres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <a href="/tp5blog/public/index.php/index/search/index?keywords=<?php echo $vo['tagname']; ?>"><span class="label label-info"><?php echo $vo['tagname']; ?></span></a>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
				</div>
			</div>
			<footer class="footer">
	<p><a href="http://www.miitbeian.gov.cn/">粤ICP备18070364号</a><i class="jiange"></i> ECHO 'THINKPHP5'</p>
</footer>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">

	    </div>
	  </div>
	</div>


	<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="/tp5blog/public/static/index/js/index.js"></script>
	<script src="/tp5blog/public/static/index/js/page.js"></script>

</body>
</html>