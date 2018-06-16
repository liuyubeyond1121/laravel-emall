<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>我的订单 - 阿甲学子商城</title>
    <link href="{{asset("css/myOrder.css")}}" rel="Stylesheet"/>
    <link href="{{asset("css/header.css")}}" rel="Stylesheet"/>
    <link href="{{asset("css/footer.css")}}" rel="Stylesheet"/>
    <link href="{{asset("css/personage.css")}}" rel="stylesheet"/>
</head>
<body>
@include('includes.header')
<!-- 我的订单导航栏-->
@yield('nav_order')
<!--我的订单内容区域 #container-->
<div id="container" class="clearfix">
    <!-- 左边栏-->
    <div id="leftsidebar_box" class="lf">
        <div class="line"></div>
        <dl class="my_order">
            <dt onClick="changeImage()">我的订单
                <img src="{{asset("images/myOrder/myOrder2.png")}}">
            </dt>
            <dd class="first_dd"><a href="{{url('home/myOrder')}}">全部订单</a></dd>
            @foreach($data as $v)
                @php $flag=0;  @endphp
                <dd>
                    <a href="{{url('home/myOrder?status='.$v->id)}}">{{$v->name}}
                        @foreach($udataAll as $value)
                            @if($v->id==$value->status)
                                @php ++$flag ; @endphp
                            @endif
                        @endforeach
                        @if($flag) <span style="color: red">　　{{$flag}}</span> @endif
                    </a>
                </dd>
            @endforeach

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
            {{--{{asset("personage.html")}}--}}
            <dd class="first_dd"><a href="javascript:;" onclick="member_show('{{session('user')->username}}','{{asset('admin/user/'.session('user')->id)}}','360','400')">我的信息</a></dd>
            <dd><a href="{{asset("personal_icon.html")}}">个人头像</a></dd>
            <dd><a href="{{asset("personal_password.html")}}">安全管理</a></dd>
        </dl>
    </div>
    <!-- 右边栏-->
    @yield('rightsidebar')
</div>

@include('includes.footer')
</body>
@yield('footer')
</html>