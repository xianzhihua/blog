<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"C:\wamp\www\tp5blog\public/../application/admin\view\login\login.html";i:1531282914;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="login page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="/tp5blog/public/static/admin/style/bootstrap.css" rel="stylesheet">
    <link href="/tp5blog/public/static/admin/style/font-awesome.css" rel="stylesheet">
    <!--Beyond styles-->
    <link id="beyond-link" href="/tp5blog/public/static/admin/style/beyond.css" rel="stylesheet">
    <link href="/tp5blog/public/static/admin/style/demo.css" rel="stylesheet">
    <link href="/tp5blog/public/static/admin/style/animate.css" rel="stylesheet">
</head>
<!--Head Ends-->
<!--Body-->

<body>
    <div class="login-container animated fadeInDown">
        <form action="" method="post">
            <div class="loginbox bg-white">
                <div class="loginbox-title">SIGN IN</div>
                <div class="loginbox-textbox">
                    <input class="form-control" placeholder="username" name="username" type="text">
                </div>
                <div class="loginbox-textbox">
                    <input class="form-control" placeholder="password" name="password" type="password">
                </div>
                <div class="loginbox-textbox">
                    <input class="form-control" placeholder="code" name="code" type="text" AUTOCOMPLETE="off">
                    <img src="<?php echo captcha_src(); ?>" alt="captcha" onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random();" style="margin-top: 20px;cursor: pointer;">
                </div>
                <div class="loginbox-submit">
                    <input class="btn btn-primary btn-block" value="Login" type="submit">
                </div>
            </div>
        </form>
    </div>
    <!--Basic Scripts-->
    <script src="/tp5blog/public/static/admin/style/bootstrap.js"></script>
    <script src="/tp5blog/public/static/admin/style/jquery_002.js"></script>
    <!--Beyond Scripts-->
    <script src="/tp5blog/public/static/admin/style/beyond.js"></script>




</body><!--Body Ends--></html>