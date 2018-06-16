<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>阿甲商城学子登陆页面</title>
    <link href="<?php echo e(asset("css/header.css")); ?>" rel="Stylesheet"/>
    <link href="<?php echo e(asset("css/footer.css")); ?>" rel="Stylesheet"/>
    <link href="<?php echo e(asset("css/animate.css")); ?>" rel="Stylesheet"/>
    <link href="<?php echo e(asset("css/login.css")); ?>" rel="stylesheet"/>
</head>
<body>
<!-- 页面顶部-->
<header id="top">
    <div class="top">
        <img src="<?php echo e(asset("images/header/logo.png")); ?>" alt=""/>
        <span>欢迎登录</span>
    </div>
</header>
<div id="container">
    <div id="cover" class="rt">
        <form id="login-form" method="post" name="form1" action="<?php echo e(url('home/login')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="txt">
                <p>登录学子商城
                    <span>
                        <a href="<?php echo e(asset("home/register")); ?>">新用户注册</a>
                    </span>
                </p>
                <div class="text">
                    <input type="text" placeholder="请输入您的用户名" name="username" id="username" required>
                    <span><img src="<?php echo e(asset("images/login/yhm.png")); ?>"></span>
                </div>
                
                <div class="text">
                    <input type="password" id="password" placeholder="请输入您的密码" name="password" required minlength="6" maxlength="15">
                    <span><img src="<?php echo e(asset("images/login/mm.png")); ?>"></span>
                </div>
                <div class="chose">
                    <input type="checkbox" class="checkbox" id="ck_rmbUser" value="0">自动登录
                    <span>忘记密码？</span>
                </div>
                
                <input class="button_login" type="submit" value="登录" id="bt-login" />
            </div>
        </form>
    </div>
</div>
<!--错误提示-->
<div id="showResult"></div>
<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="<?php echo e(asset("js/jquery-3.1.1.min.js")); ?>"></script>
<script src="<?php echo e(asset("jquery/jquery.cookie.js")); ?>"></script>


<script type="text/javascript">

    $(document).ready(function () {
        if ($.cookie("rmbUser") == "true") {
            $("#ck_rmbUser").attr("checked", true);
            $("#username").val($.cookie("username"));
            $("#password").val($.cookie("password"));
        }
    });

    //记住用户名密码
    function Save() {
        if ($("#ck_rmbUser").attr("checked")) {
            var str_username = $("#username").val();
            console.log(str_username);
            var str_password = $("#password").val();
            $.cookie("rmbUser", "true", { expires: 7 }); //存储一个带7天期限的cookie
            $.cookie("username", str_username, { expires: 7 });
            $.cookie("password", str_password, { expires: 7 });
        }
        else {
            $.cookie("rmbUser", "false", { expire: -1 });
            $.cookie("username", "", { expires: -1 });
            $.cookie("password", "", { expires: -1 });
        }
    };
</script>
</body>
</html>