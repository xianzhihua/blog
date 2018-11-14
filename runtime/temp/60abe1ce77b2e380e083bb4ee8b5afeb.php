<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:73:"C:\wamp\www\tp5blog\public/../application/index\view\article\article.html";i:1541078297;s:59:"C:\wamp\www\tp5blog\application\index\view\common\meta.html";i:1531652336;s:58:"C:\wamp\www\tp5blog\application\index\view\common\top.html";i:1541078261;s:59:"C:\wamp\www\tp5blog\application\index\view\common\left.html";i:1541078329;s:60:"C:\wamp\www\tp5blog\application\index\view\common\right.html";i:1541076767;s:61:"C:\wamp\www\tp5blog\application\index\view\common\footer.html";i:1531924988;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>冼智铧 - <?php echo $articles['title']; ?></title>
		<meta name="author" content="冼智铧">
	<meta name="description" content="一个前端小白">
	<meta name="keywords" content="冼智铧,冼智铧个人博客,个人博客">
	<link rel="icon" type="image/gif" href="/tp5blog/public/static/index/images/title.png" >
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/tp5blog/public/static/index/css/index.css">
	<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
</head>
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
					<div class="alert-bottom">
						<h4 class="article-title"><?php echo $articles['title']; ?></h4>
						<div class="time mt-20">
							<i class="glyphicon glyphicon-time"></i> <?php echo $articles['time']; ?> <i class="jiange"></i>
							<i class="glyphicon glyphicon-user"></i> <?php echo $articles['author']; ?> <i class="jiange"></i>
							<i class="glyphicon glyphicon-tag"></i> 
								<?php
								    $arr=explode(',',$articles['keywords']);
								    foreach ($arr as $k => $v){
								        echo "<a href='/tp5blog/public/index.php/index/search/index?keywords=$v'>$v</a> ";

								    }
								?>
							 <i class="jiange"></i>
							<i class="glyphicon glyphicon-comment"></i> <?php echo $count; ?> <i class="jiange"></i>
							<i class="glyphicon glyphicon-eye-open"></i> <?php echo $articles['click']; ?> <i class="jiange"></i>
						</div>
					</div>
					<div class="content article-bigcontent cate_content">
						<div class="position">
							<ol class="breadcrumb">
							  <li><a href="/tp5blog/public/index.php">首页</a></li>
							  <li><a href="javascript:;"><?php echo $articles['title']; ?></a></li>
							</ol>
						</div>

						<div class="panel panel-default article-content">
							<div class="panel-heading">
								<?php if($articles['pic']): ?><img src="/tp5blog/public/static<?php echo $articles['pic']; ?>"><?php else: ?><img src="/tp5blog/public/static/error.jpg"><?php endif; ?>
							</div>
							<div class="panel-body dec">
								<?php echo htmlspecialchars_decode($articles['content'] ); ?>
							</div>
							<div class="article-dianzan-div">
								<div class="article-dianzan"></div>
							</div>
							<script>
								$(function(){
									$('.article-dianzan').click(function(){
										$(this).addClass('on');
									})
								})
							</script>
							<hr>
							<p class="c">转载原创文章请注明，转载自： <a href="http://www.zhihuas.com">智铧博客</a> » <a href="/article/<?php echo $articles['id']; ?>.html"><?php echo $articles['title']; ?></a></p>
						</div>

						<div class="prenext">
						<?php if($after): ?>
						    <a href="/tp5blog/public/index.php/article/<?php echo $after['id']; ?>.html"><div class="pull-left">上一页</div></a>
						<?php else: ?>
						    <div class="pull-left">没有了</div>
						<?php endif; if($front): ?>
						    <a href="/tp5blog/public/index.php/article/<?php echo $front['id']; ?>.html"><div class="pull-right">下一页</div></a>
						<?php else: ?>
						    <div class="pull-right">没有了</div>
						<?php endif; ?>
						</div>
						<!-- 评论输入框 -->
						<?php if(\think\Request::instance()->session('zhihuas_name')): ?>
						<div class="row mes_div">
						    <div class="col-sm-1 cookimg">
						        <div class="cookimg_div">
						        	<div class="pulse"></div>
						            <img src="<?php echo \think\Request::instance()->session('zhihuas_img'); ?>" width="34" id="img" />
						        </div>
						    </div>
						    <div class="col-sm-11 form">
						        <div class="row cookres" style="display: none;">
						            <div class="col-sm-4">
						                <input name="name" type="text" class="form-control" value="<?php echo \think\Request::instance()->session('zhihuas_name'); ?>" id="name" AUTOCOMPLETE="off" placeholder="昵称 / 输入QQ号快速补全">
						            </div>
						            <div class="col-sm-4">
						                <input name="email" type="text" class="form-control" value="<?php echo \think\Request::instance()->session('zhihuas_email'); ?>" id="email" AUTOCOMPLETE="off" placeholder="邮箱地址">
						            </div>
						            <div class="col-sm-4">
						                <input name="web" type="text" class="form-control" value="<?php echo \think\Request::instance()->session('zhihuas_web'); ?>" id="web" AUTOCOMPLETE="off" placeholder="你的网站">
						            </div>
						        </div>
						        <div class="row">
						            <div class="col-sm-12">
						                <textarea name="content" class="form-control" id="content" cols="30" rows="3" placeholder="请输入留言内容"></textarea>
						            </div>
						        </div>
						        <button class="btn btn-success" id="btn-success" data-articleid="<?php echo $articles['id']; ?>" style="margin-top: 15px;" <?php if(\think\Request::instance()->session('zhihuas_name')): ?> data-cookie="yes" <?php endif; ?> >提交</button>
						    </div>
						</div>
						<?php else: ?>
						<div class="row mes_div">
						    <div class="col-sm-1">
						        <div class="cookimg_div">
						            <img src="" width="34" id="img" />
						        </div>
						        <script>
						        	$("#img").attr("src","https://static.youku.com/lvip/img/avatar/310/"+Math.floor(Math.random()*(40-10+1)+10)+".png")
						        </script>
						    </div>
						    <div class="col-sm-11 form">
						        <div class="row">
						            <div class="col-sm-4">
						                <input name="name" type="text" class="form-control" id="name" AUTOCOMPLETE="off" placeholder="昵称 / 输入QQ号快速补全">
						            </div>
						            <div class="col-sm-4">
						                <input name="email" type="text" class="form-control" id="email" AUTOCOMPLETE="off" placeholder="邮箱地址">
						            </div>
						            <div class="col-sm-4">
						                <input name="web" type="text" class="form-control" id="web" AUTOCOMPLETE="off" placeholder="你的网站">
						            </div>
						        </div>
						        <div class="row">
						            <div class="col-sm-12">
						                <textarea name="content" class="form-control" id="content" cols="30" rows="3" placeholder="请输入留言内容"></textarea>
						            </div>
						        </div>
						        <button class="btn btn-success" id="btn-success" data-articleid="<?php echo $articles['id']; ?>" style="margin-top: 15px;" <?php if(\think\Request::instance()->session('zhihuas_name')): ?> data-cookie="yes" <?php endif; ?> >提交</button>
						    </div>
						</div>
						<?php endif; ?>
						<!-- 评论列表 -->
						<h4 class="text-right">（<?php echo $count; ?>）评论博主审核才显示</h4>
						<?php if(is_array($message) || $message instanceof \think\Collection || $message instanceof \think\Paginator): $i = 0; $__LIST__ = $message;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<div class='media' <?php if($vo['level'] != '0'): ?> style="margin-left: 50px;" <?php endif; ?>>
						    <div class='media-left'>
						       <div class='media-object'>
						           <img src='<?php echo $vo['img']; ?>' width='40px' height='40px' />
						       </div>
						    </div>
						    <div class='media-body'>
						       <div class='media-heading'>
						           <p><a href="<?php echo $vo['web']; ?>" target="_blank" <?php if($vo['isadmin'] == '1'): ?> style="font-weight: 600;color: red;" <?php endif; ?>><?php echo $vo['name']; ?></a>
						                <i class='pull-right time'><?php echo $vo['time']; ?></i>
						           </p>
						           <p class='message'><b>
										<?php if($vo['Aname']): ?><a href="javascript:;" class="aite">@<?php echo $vo['Aname']; ?>:</a> <?php endif; ?><?php echo $vo['content']; ?>
						           </b></p>
						           <p class='time'>
						               <i class='dianzan' data-id='<?php echo $vo['id']; ?>'><svg viewBox='0 0 20 18' xmlns='http://www.w3.org/2000/svg' class='Icon Icon--like Icon--left' width='13' height='16' style='height: 14px; width: 11px;'><title></title><g><path d='M.718 7.024c-.718 0-.718.63-.718.63l.996 9.693c0 .703.718.65.718.65h1.45c.916 0 .847-.65.847-.65V7.793c-.09-.88-.853-.79-.846-.79l-2.446.02zm11.727-.05S13.2 5.396 13.6 2.89C13.765.03 11.55-.6 10.565.53c-1.014 1.232 0 2.056-4.45 5.83C5.336 6.965 5 8.01 5 8.997v6.998c-.016 1.104.49 2 1.99 2h7.586c2.097 0 2.86-1.416 2.86-1.416s2.178-5.402 2.346-5.91c1.047-3.516-1.95-3.704-1.95-3.704l-5.387.007z'></path></g></svg> <i class='lovenum'><?php echo $vo['love']; ?></i></i>
						               <i class="huifu_append"  data-key='on' data-id='<?php echo $vo['id']; ?>' data-level='<?php echo $vo['level']; ?>'><svg viewBox='0 0 22 16' class='Icon Icon--reply Icon--left' width='13' height='16' style='height: 14px; width: 11px;'><title></title><g><path d='M21.96 13.22c-1.687-3.552-5.13-8.062-11.637-8.65-.54-.053-1.376-.436-1.376-1.56V.677c0-.52-.635-.915-1.116-.52L.47 6.67C.18 6.947 0 7.334 0 7.763c0 .376.14.722.37.987 0 0 6.99 6.818 7.442 7.114.453.295 1.136.124 1.135-.5V13c.027-.814.703-1.466 1.532-1.466 1.185-.14 7.596-.077 10.33 2.396 0 0 .395.257.535.257.892 0 .614-.967.614-.967z'></path></g></svg> <i class='lovenum'>回复</i></i>
						           </p>
						       </div>
						       <div class="form_huifu"></div>
						    </div>
						</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						

					</div>
				</div>
				<div class="main-right-right">
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

					<div class="fixed-top">
						<div class="tab-pane p-20" style="width: 240px;">
						    <h4>相关文章</h4>
						    <div class="media">
						      <div class="media-body">
						    	<?php if(is_array($ralateres) || $ralateres instanceof \think\Collection || $ralateres instanceof \think\Paginator): $i = 0; $__LIST__ = $ralateres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						        <a href="/tp5blog/public/index.php/article/<?php echo $vo['0']; ?>.html"><p class="media-heading" style="margin-top: 10px;"><?php echo $vo['1']; ?></p></a>
						    	<?php endforeach; endif; else: echo "" ;endif; ?>
						      </div>
						    </div>
						</div>

						<div class="tab-pane p-20" style="width: 240px;">
						    <h4>频道推荐</h4>
						    <?php if(is_array($recres) || $recres instanceof \think\Collection || $recres instanceof \think\Paginator): $i = 0; $__LIST__ = $recres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
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
			</div>
			<footer class="footer">
	<p><a href="http://www.miitbeian.gov.cn/">粤ICP备18070364号</a><i class="jiange"></i> ECHO 'THINKPHP5'</p>
</footer>
		</div>
	</div>
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="/tp5blog/public/static/index/js/index.js"></script>


<script>

// 相关文章固定顶部
var navH = $(".fixed-top").offset().top;
$(window).scroll(function(){
	var scroH = $(this).scrollTop();
	if(scroH>=navH){
		$(".fixed-top").css({"position":"fixed","top":"50px"});
	}else if(scroH<navH){
		$(".fixed-top").css({"position":"static"});
	}
})


var Stch=false;
$('#btn-success').click(function(){
    var email=$.trim($("#email").val());
    var nameVal = $.trim($("#name").val());
    var _this = $(this);
    var regName = /[~#^$@%&!*()<>:;'"{}【】  ]/;
    if (Stch==true){

    }else{
    	if(email =="" || nameVal == ""){
    		alert('必须填写昵称及邮件');
    		return false;
    	}else if(!email.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/)){
    		alert('邮箱格式不正确！请重新输入');
    		return false;
    	}else if(nameVal.length < 2 || regName.test(nameVal)){
    		alert('姓名长度2位以上，不包含特殊字符');
    		return false;
    	}else if($("#content").val()==""){
    		alert('说点什么呀');
    		return false;
    	}
    	Stch=true;
        $.ajax({
            url : "<?php echo url('index/message/add_message'); ?>",
            type : "POST",
            data : {
                name : $('#name').val(),
                email : $('#email').val(),
                web : $('#web').val(),
                content : $('#content').val(),
                img : $('#img').attr('src'),
                articleid : _this.attr('data-articleid'),
            },
            beforeSend : function (jqXHR, settings) {
            	$('.mes_div').after("<div class='media' style='height:0;width:0;margin:0;padding:0;'></div>");
            },
            success : function(response,status,xhr){
            	var json = $.parseJSON(response);
                var div = `
		                <div class='media showS'>
		                    <div class='media-left'>
		                       <div class='media-object'>
		                           <img src='`+json.img+`' width='40px' height='40px' />
		                       </div>
		                    </div>
		                    <div class='media-body'>
		                       <div class='media-heading'>
		                           <p><a href="`+json.web+`" target="_blank">`+json.name+`</a>
		                                <i class='pull-right time'>`+json.time+`</i>
		                           </p>
		                           <p class='message'><b>`+json.content+`</b></p>
		                           <p class='time'>
		                               <i class='dianzan' data-id='`+json.id+`'><svg viewBox='0 0 20 18' xmlns='http://www.w3.org/2000/svg' class='Icon Icon--like Icon--left' width='13' height='16' style='height: 14px; width: 11px;'><title></title><g><path d='M.718 7.024c-.718 0-.718.63-.718.63l.996 9.693c0 .703.718.65.718.65h1.45c.916 0 .847-.65.847-.65V7.793c-.09-.88-.853-.79-.846-.79l-2.446.02zm11.727-.05S13.2 5.396 13.6 2.89C13.765.03 11.55-.6 10.565.53c-1.014 1.232 0 2.056-4.45 5.83C5.336 6.965 5 8.01 5 8.997v6.998c-.016 1.104.49 2 1.99 2h7.586c2.097 0 2.86-1.416 2.86-1.416s2.178-5.402 2.346-5.91c1.047-3.516-1.95-3.704-1.95-3.704l-5.387.007z'></path></g></svg> <i class='lovenum'>`+json.love+`</i></i>
		                               <i class="huifu_append"  data-level='0' data-key='on' data-id='`+json.id+`'><svg viewBox='0 0 22 16' class='Icon Icon--reply Icon--left' width='13' height='16' style='height: 14px; width: 11px;'><title></title><g><path d='M21.96 13.22c-1.687-3.552-5.13-8.062-11.637-8.65-.54-.053-1.376-.436-1.376-1.56V.677c0-.52-.635-.915-1.116-.52L.47 6.67C.18 6.947 0 7.334 0 7.763c0 .376.14.722.37.987 0 0 6.99 6.818 7.442 7.114.453.295 1.136.124 1.135-.5V13c.027-.814.703-1.466 1.532-1.466 1.185-.14 7.596-.077 10.33 2.396 0 0 .395.257.535.257.892 0 .614-.967.614-.967z'></path></g></svg> <i class='lovenum'>回复</i></i>
		                           </p>
		                       </div>
		                       <div class="form_huifu"></div>
		                    </div>
		                </div>`;
                $('.media').eq(0).before(div);
                $('#content').val('');
                $.ajax({
                    url : "<?php echo url('index/message/setCookie'); ?>",
                    type : "POST",
                    data : {
                        name : $('#name').val(),
                        email : $('#email').val(),
                        img : $('#img').attr('src'),
                        web : $('#web').val(),
                    },
                    success : function(res){

                    }
                });
                Stch=false;
            }
        })
    }
});

var Stch1 = false;
$('.content').delegate('.btn_huifu','click',function(){
    var email=$.trim($(this).parents('.form').find('.email').val());
    var nameVal = $.trim($(this).parents('.form').find('.name').val());
    var regName = /[~#^$@%&!*()<>:;'"{}【】  ]/;
    if (Stch1==true){
    }else{
        if(email =="" || nameVal == ""){
            alert('必须填写昵称及邮件');
            return false;
        }else if(!email.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/)){
            alert('邮箱格式不正确！请重新输入');
            return false;
        }else if(nameVal.length < 2 || regName.test(nameVal)){
            alert('姓名长度2位以上，不包含特殊字符');
            return false;
        }else if($(this).parents('.form').find('.content-huifu').val()==""){
            alert('说点什么呀');
            return false;
        }
        Stch1=true;
        var level = $(this).parents('.media-body').find('.huifu_append').attr('data-level');
        var newlevel = Number(level)+1;
        var pid = $(this).parents('.media-body').find('.huifu_append').attr('data-id');
        var articleid = $('#btn-success').attr('data-articleid');
        var name = $(this).parents('.form').find('.name').val();
        var email = $(this).parents('.form').find('.email').val();
        var web = $(this).parents('.form').find('.web').val();
        var content = $(this).parents('.form').find('.content-huifu').val();
        var img = $(this).parents('.form').find('.img').attr('src');
        var _this = $(this);
        $.ajax({
            url : "<?php echo url('index/message/add_message2'); ?>",
            type : "POST",
            data : {
                name : name,
                email : email,
                web : web,
                content : content,
                pid : pid,
                img : img,
                articleid : articleid,
            },
            success: function(response){
            	var json2 = $.parseJSON(response);
                var div = `
		                <div class='media showS' style='margin-left: `+ newlevel*25 +`px;'>
		                    <div class='media-left'>
		                       <div class='media-object'>
		                           <img src='`+json2.img+`' width='40px' height='40px' />
		                       </div>
		                    </div>
		                    <div class='media-body'>
		                       <div class='media-heading'>
		                           <p><a href="`+json2.web+`" target="_blank">`+json2.name+`</a>
		                                <i class='pull-right time'>`+json2.time+`</i>
		                           </p>
		                           <p class='message'><b><a href='javascript:;' class='aite'>@`+ json2.Aname +`:</a> `+json2.content+`</b></p>
		                           <p class='time'>
		                               <i class='dianzan' data-id='`+json2.id+`'><svg viewBox='0 0 20 18' xmlns='http://www.w3.org/2000/svg' class='Icon Icon--like Icon--left' width='13' height='16' style='height: 14px; width: 11px;'><title></title><g><path d='M.718 7.024c-.718 0-.718.63-.718.63l.996 9.693c0 .703.718.65.718.65h1.45c.916 0 .847-.65.847-.65V7.793c-.09-.88-.853-.79-.846-.79l-2.446.02zm11.727-.05S13.2 5.396 13.6 2.89C13.765.03 11.55-.6 10.565.53c-1.014 1.232 0 2.056-4.45 5.83C5.336 6.965 5 8.01 5 8.997v6.998c-.016 1.104.49 2 1.99 2h7.586c2.097 0 2.86-1.416 2.86-1.416s2.178-5.402 2.346-5.91c1.047-3.516-1.95-3.704-1.95-3.704l-5.387.007z'></path></g></svg> <i class='lovenum'>`+json2.love+`</i></i>
		                               <i class="huifu_append"  data-level='`+ newlevel +`' data-key='on' data-id='`+json2.id+`'><svg viewBox='0 0 22 16' class='Icon Icon--reply Icon--left' width='13' height='16' style='height: 14px; width: 11px;'><title></title><g><path d='M21.96 13.22c-1.687-3.552-5.13-8.062-11.637-8.65-.54-.053-1.376-.436-1.376-1.56V.677c0-.52-.635-.915-1.116-.52L.47 6.67C.18 6.947 0 7.334 0 7.763c0 .376.14.722.37.987 0 0 6.99 6.818 7.442 7.114.453.295 1.136.124 1.135-.5V13c.027-.814.703-1.466 1.532-1.466 1.185-.14 7.596-.077 10.33 2.396 0 0 .395.257.535.257.892 0 .614-.967.614-.967z'></path></g></svg> <i class='lovenum'>回复</i></i>
		                           </p>
		                       </div>
		                       <div class="form_huifu"></div>
		                    </div>
		                </div>`;
                $(_this).parents('.media').after(div);
                $('textarea').val('');
                $.ajax({
                    url : "<?php echo url('index/message/setCookie'); ?>",
                    type : "POST",
                    data : {
                        name : name,
                        email : email,
                        img : img,
                        web : web,
                    },
                    success : function(res){
                        $('#name').val(name);
                        $('#email').val(email);
                        $('#web').val(web);
                        $('#img').attr('src',img);
                    }
                });
                Stch1=false;
            }
        })
    }
});










$('.content').delegate('.name','blur',function(){
    var _parent = $(this).parents('.form');
    if (reg.test(_parent.find('.name').val())) {
        var email = _parent.find('.name').val()+'@qq.com';
        var web = 'https://user.qzone.qq.com/'+_parent.find('.name').val();
        $.ajax({
            url: "<?php echo url('index/message/qq'); ?>",
            type : "post",
            data : {
               qq : _parent.find('.name').val(),
            },
            success : function(response){var val = $.parseJSON(response);
                _parent.find('.name').val(val.name);
                _parent.find('.email').val(email);
                _parent.find('.web').val(web);
                _parent.find('.img').attr('src',val.txUrl)
            }
        })
    }else{
        return false;
    }
})




var reg = /^[0-9]+.?[0-9]*$/;
$('#name').blur(function(){
    if (reg.test($('#name').val())) {
        var email = $('#name').val()+'@qq.com';
        var web = 'https://user.qzone.qq.com/'+$('#name').val();
        $.ajax({
            url: "<?php echo url('index/message/qq'); ?>",
            type : "post",
            data : {
               qq : $('#name').val(),
            },
            success : function(response){var val = $.parseJSON(response);$('#name').val(val.name);$('#email').val(email);$('#web').val(web);$('#img').attr('src',val.txUrl);
            }
        })
    }else{
        return false;
    }
});

$('.content').delegate('.cookimgs','click',function(){
	$('.cookress').toggle();
});
$('.cookimg').click(function(){
	$('.cookres').toggle();
})


</script>
</body>
</html>