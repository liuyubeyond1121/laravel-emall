<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>阿甲学子商城——支付页面</title>
    <link href="{{asset("css/payment.css")}}" rel="Stylesheet" />
    <link href="{{asset("css/header.css")}}" rel="Stylesheet" />
    <link href="{{asset("css/footer.css")}}" rel="Stylesheet" />
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
<div id="navlist">
    <ul>
        <li class="navlist_gray_left"></li>
        <li class="navlist_gray">确认订单信息</li>
        <li class="navlist_gray_arrow"></li>
        <li class="navlist_gray">支付订单<b></b></li>
        <li class="navlist_gray_arrow"></li>
        <li class="navlist_blue">支付结果<b></b></li>
        <li class="navlist_blue_right"></li>
    </ul>
</div>
<div id="container">
    <div>
        <h1><i>支付失败</i>
            <span class="rt">支付订单：123455666677 &nbsp;支付金额：<b>4999.00元</b></span></h1>
    </div>
    <div class="rightsidebar_box rt" >
        <div class="pay_result">
            <img src="{{asset("images/pay/pay_fail.png")}}" alt=""/>
            <p>支付失败</p>
            <span><a href="#">查看订单状态？ </a><b><a href="#">查看订单&gt;&gt;</a></b></span>
            <br/>
            阿甲学子商城不会以系统异常、订单升级为由，要求你点击任何链接进行退款操作！
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
<script src="{{asset("js/jquery-3.1.1.min.js")}}"></script>
<script src="{{asset("js/index.js")}}"></script>
</body>
</html>