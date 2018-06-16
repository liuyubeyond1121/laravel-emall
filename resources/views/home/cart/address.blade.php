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
@include('includes.header')
<!-- 我的订单导航栏-->
<div id="nav_order">
    <ul>
        <li><a href="{{asset("/")}}">首页<span>&gt;</span>个人中心</a></li>
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
    <div class="rightsidebar_box rt">
    	
        <!--标题栏-->
        <div class="rs_header">
            <span class="address_title">收获地址管理</span>
        </div>
        <!--收货人信息填写栏-->
        <div class="rs_content">
        	<form method="post" action="{{url('home/addressSave')}}">
                {{csrf_field()}}
	            <!--收货人姓名-->
	            <div class="recipients">
	                <span class="red">*</span>收货人：<input type="text" name="sname" id="receiverName"/>
	            </div>
	            <!--收货人所在城市等信息-->
	            <div data-toggle="distpicker" class="address_content" >
					 <span class="red">*</span>省&nbsp;&nbsp;份：<select data-province="---- 选择省 ----" id="receiverState"></select>
					  城市：<select data-city="---- 选择市 ----" id="receiverCity"></select>
					  区/县：<select data-district="---- 选择区 ----" id="receiverDistrict"></select>
                    <input type="hidden" id="addr" name="addr"/>
				</div>

	            <!--收货人详细地址-->
	            <div class="address_particular">
	                <span class="red">*</span>详细地址：<textarea name="addrinfo" id="receiverAddress" cols="60" rows="3" placeholder="建议您如实填写详细收货地址"></textarea>
	            </div>
	            <!--收货人地址-->
	            <div class="address_tel">
	                <span class="red">*</span>手机号码：<input type="tel" id="receiverMobile" name="stel"/>
                    {{--固定电话：<input type="text" name="receiverPhone" id="receiverPhone"/>--}}
	            </div>
	            <!--邮政编码-->
	            <div class="address_postcode">
	                <span class="red">&nbsp;</span>邮政编码：<input type="text" name="postcode"/>
	            </div>
                <!--邮政编码-->
                <div class="address_postcode">
                    <span class="red">&nbsp;</span>邮　　箱：<input type="email" name="email"/>
                </div>
	            <!--地址名称-->
	            <div class="address_name">
	                <span class="red">&nbsp;</span>地址名称：<input type="text" id="addressName" name="addrname"/>如：<span class="sp">家</span><span class="sp">公司</span><span class="sp">宿舍</span>
	            </div>
	            <!--保存收货人信息-->
	            <div class="save_recipient">
	                保存收货人信息
	            </div>
    		</form>
            <!--已有地址栏-->
            <div class="address_information_manage">
                <div class="aim_title">
                    <span class="dzmc dzmc_title">地址名称</span><span class="dzxm dzxm_title">姓名</span><span class="dzxq dzxq_title">地址详情</span><span class="lxdh lxdh_title">联系电话</span><span class="operation operation_title">操作</span>
                </div>
                @foreach($address as $v)

                        <div class="aim_content_one aim_active">
                            @if($v->status==1)
                                 <span  class="dzmc dzmc_active">{{$v->addrname}}</span>
                            @else
                                <span class="dzmc dzmc_normal">{{$v->addrname}}</span>
                            @endif
                            <span class="dzxm dzxm_normal">{{$v->sname}}</span>
                            <span class="dzxq dzxq_normal">{{$v->addr}}{{$v->addrinfo}}</span>
                            <span class="lxdh lxdh_normal">{{$v->stel}}</span>
                            <span class="operation operation_normal">
                                <span class="aco_change">修改</span>|<span class="aco_delete">删除</span>
                            </span>
                            @if($v->status==1)
                                <span class="swmr swmr_normal" addrurl="{{url('home/addressUpdate')}}" addrid="{{$v->id}}"></span>
                            @else
                                <span class="swmr swmr_normal" addrurl="{{url('home/addressUpdate')}}" addrid="{{$v->id}}">设为默认</span>
                            @endif
                        </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@include('includes.footer')
</body>
<script type="text/javascript" src="{{asset("js/jquery-3.1.1.min.js")}}"></script>
<script src="{{asset("js/jquery.page.js")}}"></script>
<script type="text/javascript" src="{{asset("js/order.js")}}"></script>
<script type="text/javascript" src="{{asset("js/distpicker.data.js")}}"></script>
<script type="text/javascript" src="{{asset("js/distpicker.js")}}"></script>
<script type="text/javascript" src="{{asset("js/personal.js")}}"></script>
<script type="text/javascript">
//	$(".lxdh_normal").each(function(i,e) {
//		var phone = $(e)();
//		$(e)(changePhone(phone));
//	});
window.onload = function() {
//   console.log($("#receiverState option:selected").val());
    var addr = $("#receiverState option:selected").val()+$("#receiverCity option:selected").val()+$("#receiverDistrict option:selected").val() ;
    $('#addr').val(addr) ;
    $('select').change(function(){
        setTimeout(function () {
            var addr = $("#receiverState option:selected").val()+$("#receiverCity option:selected").val()+$("#receiverDistrict option:selected").val() ;
            $('#addr').val(addr) ;
        }, 10);
    })

};
//$(function(){
//    console.log($("#receiverState option:selected").val()) ;
//}) ;
//$(document).ready(function(){
//    console.log($("#receiverState option:selected").val()) ;
//});
</script>
</html>