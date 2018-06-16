<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>阿甲学子商城——支付页面</title>
    <link rel="stylesheet" href="{{asset("css/header.css")}}"/>
    <link rel="stylesheet" href="{{asset("css/footer.css")}}"/>
    <link href="{{asset("css/payment.css")}}" rel="Stylesheet"/>
</head>
<body>
@include('includes.header')

<div id="navlist">
    <ul>
        <li class="navlist_gray_left"></li>
        <li class="navlist_gray">确认订单信息</li>
        <li class="navlist_gray_arrow"></li>
        <li class="navlist_gray">支付订单<b></b></li>
        <li class="navlist_gray_arrow"></li>
        <li class="navlist_blue">支付完成<b></b></li>
        <li class="navlist_blue_right"></li>
    </ul>
</div>
<div id="container">
    <div>
        <h1><i>支付结果</i><span class="rt">支付订单：{{$code}} &nbsp;
            支付金额：<b>{{$totalPrice}}元</b></span></h1>
    </div>
    <div class="rightsidebar_box rt">
        <div class="pay_result">
            <img src="{{asset("images/pay/pay_succ.png")}}" alt=""/>
            <p>支付成功</p>
            <span><a href="#">查看订单状态？ </a><b><a href="{{url('home/myOrder')}}">查看订单&gt;&gt;</a></b></span>
            <br/>
            阿甲学子商城不会以系统异常、订单升级为由，要求你点击任何链接进行退款操作！
        </div>
    </div>
</div>
@include('includes.footer')
<script src="{{asset("js/jquery-3.1.1.min.js")}}"></script>
<script src="{{asset("js/index.js")}}"></script>
</body>
</html>