<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="UTF-8">
		<meta name="keywords" content="{{$record->metaKeywords}}"/>
		<meta name="description" content="{{$record->metaDescription}}" />
		<title>{{$record->name}}_阿甲学子商城</title>
		<link rel="stylesheet" href="{{asset("css/header.css")}}"/>
		<link href="{{asset("css/pro_details.css")}}" rel="Stylesheet"/>
		<link href="{{asset("css/animate.css")}}" rel="Stylesheet"/>
		<link rel="stylesheet" href="{{asset("css/footer.css")}}"/>
<style>
	.Ptable {
	margin: 10px 0
}

.Ptable-item {
	padding: 12px 0;
	line-height: 220%;
	color: #999;
	font-size: 12px
}

.Ptable-item:after {
	content: "";
	height: 0;
	visibility: hidden;
	display: block;
	clear: both
}

.Ptable-item h3 {
	width: 110px;
	text-align: right
}

.Ptable-item dl {
	margin-left: 110px
}

.Ptable-item dt {
	width: 160px;
	float: left;
	text-align: right;
	padding-right: 5px
}

.Ptable-item dd {
	margin-left: 210px
}

.Ptable-item .Ptable-tips {
	position: relative;
	float: left;
	width: auto;
	margin-left: 0
}

.Ptable-item .Ptable-tips:hover {
	z-index: 2
}

.Ptable-item .Ptable-sprite-question {
	display: inline-block;
	margin-left: 4px;
	width: 16px;
	height: 16px;
	vertical-align: -3px;
	background: url(http://static.360buyimg.com/item/default/1.0.36/components/detail/i/sprite.png) no-repeat
}
</style>
</head>
<body>
@include('includes.header')
<!-- 内容-->
<!--细节导航-->
<div id="nav_detail">
	<h5>首页 > 学习用品 > 笔记本电脑 > {{mb_substr($record->name,0,40)}}</h5>
</div>
<!--产品预览-->
<div id="shop_detail">
	<!-- 左侧-->
	<div id="preview" class="lf">
		<div id="mediumDiv">
			<img id="mImg" src="{{asset("emall/n1/" . $record->defaultImage->imagePath)}}" width="460" height="360"/>
		</div>
		<div id="icon_all">
			<ul id="icon_list">
				@foreach($record->thumbImages as $thumbImage)
				<li class="i1">
					<img src="{{asset("emall/n4/" . $thumbImage->imagePath)}}" width="84" height="84"/>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
	<!-- 右侧-->
	<div class="right_detail lf">
		<!-- 商品全称-->
		<h3>{{mb_substr($record->name,0,40)}}</h3>
		<!-- 价格部分-->
		<div class="price">
			<div id="pro_price">
				<b>学员售价：</b><span>￥{{$record->salePrice}}</span>
			</div>
			<div class="promise">
				<b>服务承诺：</b>
				<span>*退货补运费</span>
				<span>*30天无忧退货</span>
				<span>*48小时快速退款</span>
				<span>*72小时发货</span>
			</div>
		</div>
		<!-- 参数部分 客服-->
		<p class="parameter">
			<b>客服：</b>
			<span class="connect">联系客服</span>
			<img class="gif" src="{{asset("images/product_detail/kefuf.gif")}}">
		</p>
		<!-- 颜色-->
		<p class="style" id="choose_color">
			<s class="color">颜色：</s>
			<input type="button" class="i1" value="黑色" title="黑色"/>
			<input type="button" class="i2" value="灰色" title="灰色"/>
			<input type="button" class="i3" value="金色" title="金色"/>
			<input type="button" class="i4" value="白色" title="白色"/>
		</p>
		<!-- 规格-->
		<p>
			<s>规格：</s>
			<span class="avenge">15寸 15 1T</span>
			<span class="avenge">18寸 18 2T</span>
			<span class="avenge">19寸 19 3T</span>
		</p>
		<!-- 未选择规格，颜色时状态-->
		<div class="message"></div>
		<!-- 数量-->
		<p class="accountChose">
			<s>数量：</s>
			<button class="numberMinus">
			-
			</button>
			<input type="text" value="1" class="number" id="buy-num">
			<button class="numberAdd">
			+
			</button>
		</p>
		<!-- 购买部分-->
		<div class="shops">
			<a href="{{asset("cart")}}" class="buy lf" id="buy_now">
				立即购买
			</a>
			<a href="#" class="shop lf" id="add_cart">
				<img src="{{asset("images/product_detail/product_detail_img7.png")}}" alt=""/>
				加入购物车
			</a>
			<input type="hidden" name="id" value="{{$record->id}}">
			<a href="#" class="collection lf" id="collect">
				<span>收藏</span>
			</a><b>
			<img src="{{asset("images/product_detail/product_detail_img6.png")}}"                                                                       alt=""/>
			</b>
		</div>
	</div>
</div>
<!--为你推荐-->
<div id="recommended">
	<p>
		为你推荐<span>大家都在看</span>
	</p>
	<div id="demo" style="width:1000px;overflow:hidden;">
		<div id="indemo" style="float: left;width: 200%;">
			<div id="demo1" style="float:left">
				<!-- 第一个宽度显示 -->
				<div class="detail_1 lf">
					<div class="detail_img1">
						<img src="{{asset("images/product_detail/product_detail_1.png")}}" border="0">
					</div>
					<p>
						ThinkPad New S2 (20GUA00QCD)13.3英寸超霸
					</p>
				</div>
				<div class="detail_1 lf">
					<div class="detail_img1">
						<img src="{{asset("images/product_detail/product_detail_2.png")}}" border="0">
					</div>
					<p>
						戴尔 DELL燃7000 R1605S 超霸
					</p>
				</div>
				<div class="detail_1 lf">
					<div class="detail_img1">
						<img src="{{asset("images/product_detail/product_detail_3.png")}}" border="0">
					</div>
					<p>
						戴尔(DELL)魔方15MF Pro-R2505TSS灵
					</p>
				</div>
				<div class="detail_1 lf">
					<div class="detail_img1">
						<img src="{{asset("images/product_detail/product_detail_4.png")}}" border="0">
					</div>
					<p>
						联想(Lenovo) YOGA900 (YOGA4 PRO)多彩版
					</p>
				</div>
				<!--</div>-->
			</div>
			<div id="demo2" style="float:left"></div>
		</div>
		<!-- 宽度超大 -->
	</div>
	<!-- 外面大框 -->
</div>
<!--商品详情-->

<div id="iteminfo">
	<div id="tab">
		<div class="tab lf">
			<div class="cat">
				<span class="active">
				<a href="{{asset("")}}">
					商品详情
				</a></span>
				<span>
				<a href="{{asset("lookforward")}}">
					商品评价
				</a></span>
			</div>
		</div>
		<div class="cart rt">
			<img src="{{asset("images/product_detail/product_detail_img9.png")}}" alt=""/>
		</div>
	</div>
	<div class="left lf">
		{!!$record->detail!!}
	</div>

	<div class="right rt">
		<div class="aside_nav">
			<p>
				<i>
				<img src="{{asset("images/product_detail/product_detail_icon_g_1.png")}}" alt=""/>
				</i>
				<a href="{{asset("#specification_parameter")}}">
					规格参数
				</a>
			</p>
			<p>
				<i>
				<img src="{{asset("images/product_detail/product_detail_icon_t_1.png")}}" alt=""/>
				</i>
				<a href="{{asset("#product_introduction")}}">
					商品介绍
				</a>
			</p>
			<p>
				<i>
				<img src="{{asset("images/product_detail/product_detail_icon_d_1.png")}}" alt=""/>
				</i>
				<a href="{{asset("#sale_protection")}}">
					售后保障
				</a>
			</p>
			<p>
				<i>
				<img src="{{asset("images/product_detail/product_detail_icon_bao_1.png")}}" alt=""/>
				</i>
				<a href="{{asset("#sale_protect")}}">
					包装清单
				</a>
			</p>
			<p>
				<i>
				<img src="{{asset("images/product_detail/product_detail_icon_up_1.png")}}" alt=""/>
				</i>
				<a href="#">
					回到顶部
				</a>
			</p>
		</div>
	</div>
</div>
@include('includes.footer')
		<script src="{{asset("js/jquery-3.1.1.min.js")}}"></script>
		<script src="{{asset("js/index.js")}}"></script>
		<!--图片轮播悬停进入详情页效果-->
<script type="text/javascript">
var speed = 20;
var tab = document.getElementById("demo");
var tab1 = document.getElementById("demo1");
var tab2 = document.getElementById("demo2");
tab2.innerHTML = tab1.innerHTML;

function Marquee() {
	if(tab2.offsetWidth - tab.scrollLeft <= 0)
		tab.scrollLeft -= tab1.offsetWidth
	else {
		tab.scrollLeft++;
	}
}
var MyMar = setInterval(Marquee, speed);
tab.onmouseover = function() {
	clearInterval(MyMar)
};
tab.onmouseout = function() {
	MyMar = setInterval(Marquee, speed)
};</script>
		<!--添加到购物车 立即购买 收藏部分-->
<script type="text/javascript">
			$(function() {
	var nav = $("#tab"); //得到导航对象
	var aside = $(".aside_nav"); //右侧导航
	var win = $(window); //得到窗口对象
	var sc = $(document); //得到document文档对象。
	win.scroll(function() {
		if(sc.scrollTop() >= 1000) {
			nav.addClass("fixed_tab");
			aside.addClass("fixed_aside");
		} else {
			nav.removeClass("fixed_tab");
			aside.removeClass("fixed_aside");
		}
	})

	win.scroll(function() {
		if(sc.scrollTop() >= 60 && sc.scrollTop() < 1000) {
			$("#top").addClass("fixed_nav");
		} else {
			$("#top").removeClass("fixed_nav");
		}
	})
	//介绍区域右侧导航
	$("#iteminfo .right p").click(function() {
		//$(this).addClass("clic").siblings().removeClass("clic");
		$(this).css("background-color", "#0AA1ED").siblings().css("background-color", "#e8e8e8");
		$(this).find("a").css("color", "#fff").parent().siblings().find("a").css("color", "#828282")
	})
	/**选择商品进行添加 悬停效果**/
	$(".avenge").mouseover(function() {
		$(this).css({
			"border": "1px solid #0AA1ED",
			"color": "#0AA1ED"
		});
	}).mouseout(function() {
		$(this).css({
			"border": "1px solid #666",
			"color": "#666"
		})
	})

	/**添加到收藏**/
	$("#collect").click(function(e) {
		e.preventDefault();
		//如果未选择，请选择商品信息
		if(color == undefined && norms == undefined) {
			//            $("#add_cart").text("加入购物车").css({"background":"#f5f5f5","color":"#000"})
			//                $(this).parent().prev().prev().css('display','block');
		} else {
			alert("您的宝贝已经给您放好了");
			//location.href = "{{asset("myCollect")}}";
		}
		// $(this).prev().prev().addClass("animated rubberBand");

	})
	/**数量添加**/	
	var n = $("#buy-num").val() * 1; //全局变量
	$(".numberMinus").prop('disabled',true); 
	$(".numberMinus").click(function() {
		if(--n >= 1) {
			$("#buy-num").val(n);			
		} 
		if(n == 1){
			$(this).prop('disabled',true);
		}
	});
	
	$(".numberAdd").click(function() {
		$("#buy-num").val(n += 1);
		if($("#buy-num").val() > 1){
			$('.numberMinus').prop('disabled',false);
		}
	});
	
	////////////////////////////////////////
	//控制人为输入
	
	$('#buy-num').blur(function(){
		n = parseInt($(this).val());
		if(n <= 1){
			$('.numberMinus').prop('disabled',true);
		} else {
			$('.numberMinus').prop('disabled',false);
		}
	});
	
	//控制人为输入的非法数字
	$('#buy-num').keypress(function(){
		if(isNaN(parseInt($(this).val()))){
			$(this).val(n);
		}
	});
	
	////////////////////////////////////////
	/**ajax提交**/
	$(".avenge").each(function(i, item) {
		$(this).click(function(norms) {
			$(this).addClass("borderChange")
			if($(this).siblings().addClass("borderChange")) {
				$(this).siblings().removeClass("borderChange")
			}
			//规格选择
			var norms = $(this)();
			console.log(norms)
		})
	})
	//颜色选择
	$("#choose_color input").each(function(i, item) {
		$(this).click(function() {
			$(this).addClass("borderChange")
			if($(this).siblings().addClass("borderChange")) {
				$(this).siblings().removeClass("borderChange")
			}
			var color = $(this).val();
			console.log(color)
		})
	})
	//数量选择
	$(".accountChose").click(function() {
		var buyAccount = $("#buy-num").val();
		console.log(buyAccount);
	})

	/*立即购买*/
	$("#buy_now").click(function(e) {
		//如果未选择，请选择商品信息
		if(color == undefined && norms == undefined) {
			//            $("#add_cart").text("加入购物车").css({"background":"#f5f5f5","color":"#000"})
			alert("请选择商品信息");
		} else {
			location.href = "{{asset("cart ")}}";
		}
		e.preventDefault();
		var color = $("#choose_color input.borderChange").val();
		var model = $("#choose_model span.borderChange")();
		var num = $("#buy-num").val();
		// 后台需要的参数
		// var url = '/toOrder/'+${item.id}+'?&num='+num+'&itemColor='+color+'&itemModel='+model;
		//             window.location.href = url;
	})
})
</script>

{{--<script type="text/javascript">//加入购物车操作
var color;
var norms;
var buyAccount;
$("#add_cart").click(function(e) {
	e.preventDefault();
	//颜色取值
	$("#choose_color input").each(function(i, item) {
		if($(this).hasClass("borderChange")) {
			color = $(this).val();
		}
	})
	console.log(color)
	//规格取值
	$(".avenge").each(function() {
		if($(this).hasClass("borderChange")) {
			norms = $(this)();
		}
	})
	console.log(norms)
	//数量取值
	buyAccount = $("#buy-num").val();
	console.log(buyAccount);
	//如果未选择，请选择商品信息
	if(color == undefined && norms == undefined) {
		//            $("#add_cart").text("加入购物车").css({"background":"#f5f5f5","color":"#000"})
		alert("请选择商品信息");
	}
	var params = {
		itemColor: color,
		itemModel: norms,
		num: buyAccount,
		//商品id    temId:${item.id}
	};
	$.ajax({
		type: "post",
		url: "/insertToCart",
		data: params,
		success: function(data) {
			if(data == '200') {
				alert("添加购物车成功！");
			} else if(data == 500) {
				alert("添加购物车失败！");
			} else {
				alert("您还没登录呢！");
				window.location.href = data;
			}
		},
		error: function(data) {
			//              alert("系统异常！");
		}
	});
})
</script>--}}
<script>
	$('#add_cart').click(function(){
		var id = $('input[name="id"]').val() ;
		var num = $('#buy-num').val() ;
		window.location.href = "{{url('home/addCart')}}?id="+id+"&num="+num ;
	})
</script>
<!--图片效果-->
<script>$("#mImg").hover(function() {
	$(this).addClass("animated pulse");
}, function() {
	$(this).removeClass("animated pulse");
});
</script>

<script>
	$('#icon_list>li').click(function() {
	$(this).children('img').css('border', '1px solid #CECFCE');
	var address = $(this).children().attr('src');
	//console.log(address);
	//var newaddress=address.slice(0,-4);
	var bigaddress = address.replace('/n4/', '/n1/');
	$('#mImg').attr('src', bigaddress);
	$(this).siblings().children('img').css('border', '');
})</script>
</body>
</html>