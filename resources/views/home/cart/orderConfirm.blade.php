<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>确认订单</title>
    <link href="{{asset("css/orderConfirm.css")}}" rel="Stylesheet"/>
    <link href="{{asset("css/header.css")}}" rel="Stylesheet"/>
    <link href="{{asset("css/footer.css")}}" rel="Stylesheet"/>
</head>
<body>
@include('includes.header')
<div id="navlist">
    <ul>
        <li class="navlist_blue_left"></li>
        <li class="navlist_blue">确认订单信息</li>
        <li class="navlist_blue_arro"><canvas id="canvas_blue" width="20" height="38"></canvas>
        </li>
        <li class="navlist_gray">支付订单<b></b></li>
        <li class="navlist_gray_arro"><canvas id="canvas_gray" width="20" height="38"></canvas>
        </li>
        <li class="navlist_gray">支付完成<b></b></li>
        <li class="navlist_gray_right"></li>
    </ul>
</div>
<!--订单确认-->
<div id="container" class="clear">
    <!--收货地址-->
    <div class="adress_choice">
        <p>选择收货地址</p>
        @if($address)
        <div id="addresId1">
            <i class="address_name">
                <b>{{$address->sname}}</b> {{$address->addr}}
            </i>
            <i class="user_address">
                {{$address->addrinfo}}  　 电话:{{$address->stel}} 　　  邮箱:{{$address->email}}
            </i>
        </div>
        @else
            <div id="addresId1">
                <i class="address_name">
                    您还没有收获地址！
                </i>
                <i class="user_address">
                     <a href="{{url('home/address')}}">请点击更多地址添加地址！</a>
                </i>
            </div>
        @endif
        <a href="{{url('home/address')}}">
            更多地址 &gt;&gt;
        </a>
    </div>
    <!-- 商品信息-->
    <form name="orderConfirm" id="orderConfirm" method="post" action="{{url('home/payment')}}">
        {{csrf_field()}}
        <input type="hidden" name="aid" value="{{$address->id}}"/>

        <div class="product_confirm">
            <p>确认商品信息</p>
            <ul class="item_title">
                <li class="p_info">商品信息</li>
                <li class="p_price">单价(元)</li>
                <li class="p_count">数量</li>
                <li class="p_tPrice">金额</li>
            </ul>
            @foreach($newShop as $v)
                <input type="hidden" name="ids[]" value="{{$v['id']}}"/>
                <input type="hidden" name="num[]" value="{{$v['num']}}"/>
                <input type="hidden" name="salePrice[]" value="{{$v['productInfo']->salePrice}}"/>
                <input type="hidden" name="totalPrice" value="{{$v['productInfo']->salePrice}}"/>
            <ul class="item_detail">
                <li class="p_info">
                    <b><img src="{{asset("emall/n4/".$v['productInfo']->defaultImage->imagePath)}}"/></b>

                    <b class="product_name lf">
                        {{$v['productInfo']->name}}
                    </b>
                    <br/>
                <span class="product_color ">
                   颜色：深空灰
                </span>
                </li>
                <li class="p_price">
                    <i>阿甲专属价</i>
                    <br/>
                    <span class="pro_price">￥<span class="ppp_price">{{$v['productInfo']->salePrice}}</span></span>
                </li>
                <li class="p_count">X<span>{{$v['num']}}</span></li>
                <li class="p_tPrice">￥<span>{{$v['productInfo']->salePrice*$v['num']}}</span></li>
            </ul>
            @endforeach
        </div>
    </form>
    <!-- 结算条-->
    <div id="count_bar">
        <span class="go_cart"><a href="{{url('home/cart')}}" >&lt;&lt;返回购物车</a></span>
        <span class="count_bar_info">已选<b  id="count"> 0 </b>件商品&nbsp;&nbsp;合计(不含运费):<b class="zj"></b> <input type="hidden" name="Payment" value=""/>元</span>
        <span class="go_pay">确认并付款</span>
        {{--<input type="submit" class="btn btn-success" value=""/>--}}
    </div>
</div>
@include('includes.footer')
<script src="{{asset("js/jquery-3.1.1.min.js")}}"></script>
<script src="{{asset("js/index.js")}}"></script>
<script>
    var html=0;
    var total=0;
    $(function(){
        $(".item_detail").each(function() {
            html+=1;
            var p=parseFloat($(this).children('.p_price').children('.pro_price').children('.ppp_price').html());
            console.log(p);
            var sl=parseFloat($(this).children('.p_count').children('span').html());
            var xj=parseFloat(p*sl).toFixed(2);
            console.log("xiaoji"+xj);
            $(this).children('.p_tPrice').children('span').html(xj);
            total+=xj-0;
        })
        console.log("zongji"+total);
        $("#count").html(html)-0;
        $('.zj').html(total.toFixed(2))-0;
        var input_zj=parseFloat($('.zj').html()).toFixed(2);
        $('#payment').val(input_zj);
    })
</script>
<script>
    $(".go_pay").click(function () {
        $('#orderConfirm').submit();
    })
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

