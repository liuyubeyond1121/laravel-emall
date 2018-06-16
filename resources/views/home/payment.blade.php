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
@include('includes.header')
<div id="navlist">
    <ul>
        <li class="navlist_gray_left"></li>
        <li class="navlist_gray">确认订单信息</li>
        <li class="navlist_gray_arro"><canvas id="canvas_gray" width="20" height="38"></canvas>
        </li>
        <li class="navlist_blue">支付订单<b></b></li>
        <li class="navlist_blue_arro"><canvas id="canvas_blue" width="20" height="38"></canvas>
        </li>
        <li class="navlist_gray">支付完成<b></b></li>
        <li class="navlist_gray_right"></li>
    </ul>
</div>
<!--订单确认-->
<form action="{{url('home/paySuccess')}}" method="post" id="pay_form">
    <input type="hidden" name="$totalPrice" value="{{$totalPrice}}"/>
    <input type="hidden" name="code" value="{{$code}}"/>
    {{csrf_field()}}
    <div id="container" class="clearfix" >
        <!-- 支付订单信息-->
        <div class="pay_info">
            <b>支付金额：<i>{{$totalPrice}}元</i></b><input type="hidden" name="payment" value="0.01"/>
            <span>支付订单：{{$code}} 收款方：阿甲商城</span><input type="hidden" name="orderId" />
        </div>
        <!--支付方式-->
        <div id="pay_type">
            <!-- 支付方式头-->
            <div class="pay_type_title">
                <b>网上银行支付</b>
            </div>
            <div id="dnBank">
                <ul>
                    <li><input type="radio" name="bankId" value="BOC-NET-B2C" id="02zg">
                        <label for="02zg"><img src="{{asset("images/pay/pay_img1.jpg")}}" alt="" /></label>
                    </li>
                    <li><input type="radio" name="bankId" value="ICBC-NET-B2C" id="03gs">
                        <label for="03gs"><img src="{{asset("images/pay/pay_img2.jpg")}}" alt="" /></label>
                    </li>
                    <li><input type="radio" name="bankId" value="CMBCHINA-NET-B2C" id="04zs">
                        <label for="04zs"><img src="{{asset("images/pay/pay_img3.jpg")}}" alt="" /></label>
                    </li>
                    <li><input type="radio" name="bankId" value="CCB-NET-B2C" id="05js">
                        <label for="05js"><img src="{{asset("images/pay/pay_img4.jpg")}}" alt=""/></label>
                    </li>
                    <li><input type="radio" name="bankId" value="ABC-NET-B2C" id="06ny">
                        <label for="06ny"><span><img src="{{asset("images/pay/pay_img5.jpg")}}" alt=""/></span></label>
                    </li>

                </ul>
            </div>

        </div>
        <!--结算条-->
        <div id="count_bar">
        <span class="pay_leftTime">
            剩余付款时间：<b>15：00</b>
            <!--获取待支付时间并更改订单状态-->
        </span>
            <span  class="okPay" onclick="document.getElementById('pay_form').submit();">确认支付</span>
            <!-- <input type="submit" value="立即付款"> -->
        </div>

    </div>
</form>
@include('includes.footer')
<script src="{{asset("js/jquery-3.1.1.min.js")}}"></script>
<script src="{{asset("js/index.js")}}"></script>
<script>
    $("#count_bar .okPay").css("display","none");
    $("#dnBank>ul>li img").click(function(){
        $(this).addClass("hover") ;
        $(this).parent().parent().siblings().children('label').children('img').removeClass('hover');
        $("#count_bar .okPay").show("3000");
    });
    /* $(":not(#count_bar .okPay)").css("display","none"); */
</script>
<script type="text/javascript">
    function payment() {
        $("#pay_form").submit();
        // document.getElementById('pay_form').submit();
        alert(11);
    }
</script>
<script>
    var canvas=document.getElementById("canvas_gray");
    var cxt=canvas.getContext("2d");
    var gray = cxt.createLinearGradient (10, 0, 10, 38);
    gray.addColorStop(0, '#f5f4f5');
    gray.addColorStop(1, '#e6e6e5');
    cxt.beginPath();
    cxt.fillStyle = gray;
    cxt.moveTo(20,19);
    cxt.lineTo(0,38);
    cxt.lineTo(0,0);
    cxt.fill();
    cxt.closePath();
</script>
<script>
    var canvas=document.getElementById("canvas_blue");
    var cxt=canvas.getContext("2d");
    var blue = cxt.createLinearGradient (10, 0, 10, 38);
    blue.addColorStop(0, '#27b0f6');
    blue.addColorStop(1, '#0aa1ed');
    cxt.beginPath();
    cxt.fillStyle = blue;
    cxt.moveTo(20,19);
    cxt.lineTo(0,38);
    cxt.lineTo(0,0);
    cxt.fill();
    cxt.closePath();
</script>
</body>
</html>

