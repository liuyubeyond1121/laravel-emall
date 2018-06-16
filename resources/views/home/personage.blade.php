<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>我的订单 - 阿甲学子商城</title>
    <link href="{{asset("css/myOrder.css")}}" rel="Stylesheet"/>
    <link href="{{asset("css/header.css")}}" rel="Stylesheet"/>
    <link href="{{asset("css/footer.css")}}" rel="Stylesheet"/>
    <link href="{{asset("css/personage.css")}}" rel="stylesheet" />
</head>
<body>
<!-- 页面顶部-->
<header id="top">
    <div id="logo" class="lf">
        <img class="animated jello" src="{{asset("images/header/logo.png")}}" alt="logo"/>
    </div>
    <div id="top_input" class="lf">
        <input id="input" type="text" placeholder="请输入您要搜索的内容"/>
        <div class="seek" tabindex="-1">
            <div class="actived" ><span>分类搜索</span> <img src="{{asset("images/header/header_normal.png")}}" alt=""/></div>
            <div class="seek_content" >
                <div id="shcy" >生活餐饮</div>
                <div id="xxyp" >学习用品</div>
                <div id="srdz" >私人订制</div>
            </div>
        </div>
        <a href="{{asset("")}}" class="rt"><img id="search" src="{{asset("images/header/search.png")}}" alt="搜索"/></a>
    </div>
    <div class="rt">
        <ul class="lf">
            <li><a href="{{asset("myCollect.html")}}" title="我的收藏"><img class="care" src="{{asset("images/header/care.png")}}" alt=""/></a><b>|</b></li>
            <li><a href="{{asset("myOrder.html")}}" title="我的订单"><img class="order" src="{{asset("images/header/order.png")}}" alt=""/></a><b>|</b></li>
            <li><a href="{{asset("cart.html")}}" title="我的购物车"><img class="shopcar" src="{{asset("images/header/shop_car.png")}}" alt=""/></a><b>|</b></li>
            <li><a href="{{asset("lookforward.html")}}">帮助</a><b>|</b></li>
            <li><a href="{{asset("login.html")}}">登录</a></li>
        </ul>
    </div>
</header>
<!-- 主导航-->
<nav id="nav">
    <ul>
        <li><a href="{{asset("index.html")}}">首页</a></li>
        <li><a href="{{asset("item_food.html")}}">生活餐饮</a></li>
        <li><a href="{{asset("studyarticle.html")}}">学习用品</a></li>
        <li><a href="{{asset("lookforward.html")}}">私人定制</a></li>
    </ul>
</nav>
<!-- 我的订单导航栏-->
<div id="nav_order">
    <ul>
        <li><a href="{{asset("")}}">首页<span>&gt;</span>个人中心</a></li>
    </ul>
</div>
<!--我的订单内容区域 #container-->
<div id="container" class="clearfix">
    <!-- 左边栏-->
    <div id="leftsidebar_box" class="lf">
        <div class="line"></div>
        <dl class="my_order">
            <dt onClick="changeImage()">我的订单
                <img src="{{asset("images/myOrder/myOrder2.png")}}">
            </dt>
            <dd class="first_dd"><a href="{{asset("myOrder.html")}}">全部订单</a></dd>
            <dd>
                <a href="#">
                    待付款
                    <span><!--待付款数量--></span>
                </a>
            </dd>
            <dd>
                <a href="#">
                    待收货
                    <span><!--待收货数量-->1</span>
                </a>
            </dd>
            <dd>
                <a href="#">
                    待评价<span><!--待评价数量--></span>
                </a>
            </dd>
            <dd>
                <a href="#">退货退款</a>
            </dd>
        </dl>

        <dl class="footMark">
            <dt onClick="changeImage()">我的优惠卷<img src="{{asset("images/myOrder/myOrder1.png")}}"></dt>
        </dl>

        <dl class="address">
                <dt>收货地址<img src="{{asset("images/myOrder/myOrder1.png")}}"></dt>
				<dd><a href="{{asset("addressAdmin.html")}}">地址管理</a></dd>
            </dl>
            <dl class="count_managment">
                <dt onClick="changeImage()">帐号管理<img src="{{asset("images/myOrder/myOrder1.png")}}"></dt>
                <dd class="first_dd"><a href="{{asset("personage.html")}}">我的信息</a></dd>
                <dd><a href="{{asset("personal_icon.html")}}">个人头像</a></dd>
                <dd><a href="{{asset("personal_password.html")}}">安全管理</a></dd>
            </dl>


    </div>
    <!-- 右边栏-->
    <!--个人信息头部-->
    <div class="rightsidebar_box rt">
        <div class="rs_header">
            <span class="rs_header_active">我的信息</span>
            <span>个人头像</span>
            <span>安全管理</span>
        </div>

        <!--个人信息具体内容 -->
        <div class="rs_content">
            <!--头像-->
            <div class="rs_content_headPortrait">
                <span class="same">我的头像：</span>
                <img src="{{asset("images/personage/user50.png")}}" alt=""/>
                <span class="change_headPortrait same_click" onclick="toPage('personal_icon.html')">更改头像</span>
            </div>
            <!--用户名-->
            <div class="rs_content_username">
                <span class="same">用户名：</span>
                <span class="same rs_username">王小明</span>
                <input class="ed_username" value="" style="display: none;"/>
                <span class="change_username same_click">更改用户名</span>
            </div>
            <!--真实姓名-->
            <!--<div class="rs_content_realName">
                <span class="same">真实姓名：</span>
                <span class="addRealName same_click">添加</span>
            </div>-->
            <!--性别-->
            <div class="rs_content_sex">
                <span class="same">性别：</span>
                <span class="man selected">
                    <img src="{{asset("images/personage/select.png")}}" alt=""/>男
                </span>
                <span class="women">
                    <img src="{{asset("images/personage/un_select.png")}}" alt=""/>女
                </span>
            </div>
            <!--绑定电话-->
            <div class="rs_content_tel">
                <span class="same">绑定电话：</span>
                <input type="text" value=""/>
            </div>
            <!--绑定邮箱-->
            <div class="rs_content_mail">
                <span class="same">绑定邮箱：</span>
                <input class="ed_email" value="" style="display: none;"/>
                <span class="rs_mail">liuranicon@163.com</span>
                <span class="same_click change_mail">更改邮箱</span>
            </div>
            <!--保存按钮-->
            <div class="save">
                保存更改
            </div>
        </div>
    </div>
</div>

<!-- 品质保障，私人定制等-->
<div id="foot_box">
    <div class="icon1 lf">
        <img src="{{asset("images/footer/icon1.png")}}" alt=""/>

        <h3>品质保障</h3>
    </div>
    <div class="icon2 lf">
        <img src="{{asset("images/footer/icon2.png")}}" alt=""/>

        <h3>私人定制</h3>
    </div>
    <div class="icon3 lf">
        <img src="{{asset("images/footer/icon3.png")}}" alt=""/>

        <h3>学员特供</h3>
    </div>
    <div class="icon4 lf">
        <img src="{{asset("images/footer/icon4.png")}}" alt=""/>

        <h3>专属特权</h3>
    </div>
</div>
<!-- 页面底部-->
<div class="foot_bj">
    <div id="foot">
        <div class="lf">
            <p class="footer1"><img src="{{asset("images/footer/logo.png")}}" alt="" class=" footLogo"/></p>
            <p class="footer2"><img src="{{asset("images/footer/footerFont.png")}}"alt=""/></p>
            
        </div>
        <div class="foot_left lf" >
            <ul>
                <li><a href="#"><h3>买家帮助</h3></a></li>
                <li><a href="#">新手指南</a></li>
                <li><a href="#">服务保障</a></li>
                <li><a href="#">常见问题</a></li>
            </ul>
            <ul>
                <li><a href="#"><h3>商家帮助</h3></a></li>
                <li><a href="#">商家入驻</a></li>
                <li><a href="#">商家后台</a></li>
            </ul>
            <ul>
                <li><a href="#"><h3>关于我们</h3></a></li>
                <li><a href="#">关于阿甲</a></li>
                <li><a href="#">联系我们</a></li>
                <li>
                    <img src="{{asset("images/footer/wechat.png")}}" alt=""/>
                    <img src="{{asset("images/footer/sinablog.png")}}" alt=""/>
                </li>
            </ul>
        </div>
        <div class="service">
            <p>阿甲商城客户端</p>
            <img src="{{asset("images/footer/ios.png")}}" class="lf">
            <img src="{{asset("images/footer/android.png")}}" alt="" class="lf"/>
        </div>
        <div class="download">
            <img src="{{asset("images/footer/erweima.png")}}">
        </div>
		<!-- 页面底部-备案号 #footer -->
            <div class="record">
                &copy;2017 阿甲集团有限公司 版权所有 京ICP证xxxxxxxxxxx
            </div>
    </div>
</div>
</body>
<script type="text/javascript" src="{{asset("js/jquery-3.1.1.min.js")}}"></script>
<script src="{{asset("js/index.js")}}"></script>
<script src="{{asset("js/jquery.page.js")}}"></script>
<script type="text/javascript" src="{{asset("js/order.js")}}"></script>
<script type="text/javascript" src="{{asset("js/personal.js")}}"></script>
</html>