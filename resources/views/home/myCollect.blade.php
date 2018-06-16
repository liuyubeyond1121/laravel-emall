<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>阿甲商城收藏夹</title>
    <link rel="stylesheet" href="{{asset("css/header.css")}}"/>
    <link rel="stylesheet" href="{{asset("css/myCollect.css")}}"/>
    <link rel="stylesheet" href="{{asset("css/footer.css")}}"/>
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
<!-- nav主导航-->
<nav id="nav">
    <ul>
        <li><a href="{{asset("index.html")}}" class="active">首页</a></li>
        <li><a href="{{asset("item_food.html")}}">生活餐饮</a></li>
        <li><a href="{{asset("studyarticle.html")}}">学习用品</a></li>
        <li><a href="{{asset("lookforward.html")}}">私人定制</a></li>
    </ul>
</nav>
<div class="modal" style="display:none">
    <div class="modal_dialog">
        <div class="modal_header">
            删除提醒
        </div>
        <div class="modal_information">
            <img src="{{asset("images/model/model_img2.png")}}" alt=""/>
            <span>确定删除您的这个宝贝吗？</span>

        </div>
        <div class="yes"><span>删除</span></div>
        <div class="no"><span>不删除</span></div>
    </div>
</div>
<div class="modalNo" style="display:none">
    <div class="modal_dialog">
        <div class="modal_header">
            删除提示
            <img src="{{asset("images/model/model_img1.png")}}" alt="" class="rt close"/>
        </div>
        <div class="modal_information">
            <img src="{{asset("images/model/model_img2.png")}}" alt=""/>
            <span>请选择商品</span>

        </div>

    </div>
</div>

<div class="modalAdd" style="display:none">
    <div class="modal_dialog">
        <div class="modal_header">
            添加提示
            <img src="{{asset("images/model/model_img1.png")}}" alt="" class="rt close"/>
        </div>
        <div class="modal_information">
            <img src="{{asset("images/model/model_img2.png")}}" alt=""/>
            <span>请选择商品</span>

        </div>

    </div>
</div>

<div class="big">
    <form  name="" action="" method="post" >
        <section id="section" >
            <div id="title">
                <b>收藏商品</b>&nbsp;&nbsp;&nbsp;&nbsp;<span>|</span>&nbsp;&nbsp;
                <b class="store">收藏店家</b>
            </div>
            <div id="box" >
                <div class="imfor_top">
                    <div class="manage">
                        <span class="normal">管理收藏夹</span>

                    </div>
                    <div class="check_top">
                        <div class="all">
                            <span class="normal"> <img src="{{asset("images/myCollect/product_normal.png")}}" alt=""/></span>全选
                        </div>
                        <div class="del">删除</div>
                        <div class="allAdd">加入购物车</div>
                        <div class="sure" style="display: none">
                            <img src="{{asset("images/myCollect/product_true.png")}}" alt=""/>
                            <span>已移入购物车</span>
                        </div>
                    </div>
                    <div class="foot_qk">清空失效商品</div>
                </div>
                <div id="content_box" >
                    <div class="lf" id="d1">
                        <div class="img">
                            <img src="{{asset("images/myCollect/product_img1.png")}}" alt=""/>
                        </div>
                        <div class="describe">
                            <p>DELL燃7000&nbsp;14.0英寸微边框(i5-7200u&nbsp;
                                8GB&nbsp;256GB&nbsp;SSD&nbsp;HD620&nbsp;Win10)银</p>
                            <span class="price"><b>￥</b><span class="priceContent">4000.00</span></span>
                            <span class="addCart">加入购物车</span>
                            <span class="succee" style="display: none">
                                 <img src="{{asset("images/myCollect/product_true.png")}}" alt=""/>
                                 <span>已移入购物车</span>
                            </span>
                        </div>
                        <div class="mask" style="display: none">
                            <div class="maskNormal">
                                <img src="{{asset("images/myCollect/product_normal_big.png")}}" alt=""/>
                            </div>
                        </div>
                    </div>
                    <div class="lf" id="d2">
                        <div class="img">
                            <img src="{{asset("images/myCollect/product_img2.png")}}" alt=""/>
                        </div>
                        <div class="describe">
                            <p>DELL燃7000&nbsp;14.0英寸微边框(i5-7200u&nbsp;
                                8GB&nbsp;256GB&nbsp;SSD&nbsp;HD620&nbsp;Win10)银</p>
                            <span class="price"><b>￥</b><span class="priceContent">4000.00</span></span>
                            <span class="addCart">加入购物车</span>
                             <span class="succee" style="display: none">
                                 <img src="{{asset("images/myCollect/product_true.png")}}" alt=""/>
                                 <span>已移入购物车</span>
                            </span>
                        </div>
                        <div class="mask" style="display: none">
                            <div class="maskNormal">
                                <img src="{{asset("images/myCollect/product_normal_big.png")}}" alt=""/>
                            </div>
                        </div>
                    </div>
                    <div class="lf" id="d3">
                        <div class="img">
                            <img src="{{asset("images/myCollect/product_img3.png")}}" alt=""/>
                        </div>
                        <div class="describe">
                            <p>DELL燃7000&nbsp;14.0英寸微边框(i5-7200u&nbsp;
                                8GB&nbsp;256GB&nbsp;SSD&nbsp;HD620&nbsp;Win10)银</p>
                            <span class="price"><b>￥</b><span class="priceContent">4000.00</span></span>
                            <span class="addCart">加入购物车</span>
                             <span class="succee" style="display: none">
                                 <img src="{{asset("images/myCollect/product_true.png")}}" alt=""/>
                                 <span>已移入购物车</span>
                            </span>
                        </div>
                        <div class="mask" style="display: none">
                            <div class="maskNormal">
                                <img src="{{asset("images/myCollect/product_normal_big.png")}}" alt=""/>
                            </div>
                        </div>
                    </div>
                    <div class="lf" id="d4">
                        <div class="img">
                            <img src="{{asset("images/myCollect/product_img4.png")}}" alt=""/>
                        </div>
                        <div class="describe">
                            <p>DELL燃7000&nbsp;14.0英寸微边框(i5-7200u&nbsp;
                                8GB&nbsp;256GB&nbsp;SSD&nbsp;HD620&nbsp;Win10)银</p>
                            <span class="price"><b>￥</b><span class="priceContent">4000.00</span></span>
                            <span class="addCart">加入购物车</span>
                             <span class="succee" style="display: none">
                                 <img src="{{asset("images/myCollect/product_true.png")}}" alt=""/>
                                 <span>已移入购物车</span>
                            </span>
                        </div>
                        <div class="mask" style="display: none">
                            <div class="maskNormal">
                                <img src="{{asset("images/myCollect/product_normal_big.png")}}" alt=""/>
                            </div>
                        </div>
                    </div>
                    <div class="lf" id="d5">
                        <div class="img">
                            <img src="{{asset("images/myCollect/product_img5.png")}}" alt=""/>
                        </div>
                        <div class="describe">
                            <p>DELL燃7000&nbsp;14.0英寸微边框(i5-7200u&nbsp;
                                8GB&nbsp;256GB&nbsp;SSD&nbsp;HD620&nbsp;Win10)银</p>
                            <span class="price"><b>￥</b><span class="priceContent">4000.00</span></span>
                            <span class="addCart">加入购物车</span>
                             <span class="succee" style="display: none">
                                 <img src="{{asset("images/myCollect/product_true.png")}}" alt=""/>
                                 <span>已移入购物车</span>
                            </span>
                        </div>
                        <div class="mask" style="display: none">
                            <div class="maskNormal">
                                <img src="{{asset("images/myCollect/product_normal_big.png")}}" alt=""/>
                            </div>
                        </div>
                    </div>
                    <div class="lf" id="d6">
                        <div class="img">
                            <img src="{{asset("images/myCollect/product_img6.png")}}" alt=""/>
                        </div>
                        <div class="describe">
                            <p>DELL燃7000&nbsp;14.0英寸微边框(i5-7200u&nbsp;
                                8GB&nbsp;256GB&nbsp;SSD&nbsp;HD620&nbsp;Win10)银</p>
                            <span class="price"><b>￥</b><span class="priceContent">4000.00</span></span>
                            <span class="addCart">加入购物车</span>
                             <span class="succee" style="display: none">
                                 <img src="{{asset("images/myCollect/product_true.png")}}" alt=""/>
                                 <span>已移入购物车</span>
                            </span>
                        </div>
                        <div class="mask" style="display: none">
                            <div class="maskNormal">
                                <img src="{{asset("images/myCollect/product_normal_big.png")}}" alt=""/>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="foot" >
                    <div class="manage">
                        <span class="normal">管理收藏夹</span>
                    </div>
                    <div class="check_top">
                        <div class="all">
                            <span class="normal"> <img src="{{asset("images/myCollect/product_normal.png")}}" alt=""/></span>全选
                        </div>
                        <div class="del">删除</div>
                        <div class="allAdd">加入购物车</div>
                        <div class="sure" style="display: none">
                            <img src="{{asset("images/myCollect/product_true.png")}}" alt=""/>
                            <span>已移入购物车</span>
                        </div>
                    </div>
                </div>


                </div>
        </section>

    </form>
    <div class="none" style="display: none">
        <div class="none_content">
            <img src="{{asset("images/model/model_img3.png")}}" alt="" class="lf"/>
            <p class="lf">您的收藏夹竟然还是空哒( ⊙ o ⊙ )</p>
            <span class="lf">赶快去收藏商品吧！</span>
            <a href="#" class="lf">去购物>></a>
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
<script src="{{asset("js/collect.js")}}"></script>
<script>
    $(function(){
        if(!$(".imfor")) {
            $('#section').hide();
            $('.none').show();
        }
    })
    //搜索下拉
    $('.seek').focus(function(){

        if($(this).hasClass('clickhover')){

            $(this).removeClass('clickhover');
            $(this).find('.seek_content').hide();
            $(this).find('img').attr('src','../images/header/header_normal.png');

        }else{
            $(this).addClass('clickhover');
            $(this).find('.seek_content').show();
            $(this).find('img').attr('src','../images/header/header_true.png');
        }
    })
    $('.seek_content>div').click(function(){
        $('.seek').removeClass('clickhover');
        var text=$(this).html();
        $('.seek span').html(text);
        $(this).parent().hide();
        $('.seek').find('img').attr('src','../images/header/header_normal.png');
        $('.seek').blur();

    })

    $('.seek').blur(function(){

        $('.seek').removeClass('clickhover');
        $('.seek_content').hide();

        $('.seek').find('img').attr('src','../images/header/header_normal.png');
        console.log(1);
    })
    $(".care").hover(function(){
        $(this).attr('src',"../images/header/care1.png");
    },function(){
        $(this).attr('src',"../images/header/care.png");
    });
    $(".order").hover(function(){
        $(this).attr('src',"../images/header/order1.png");
    },function(){
        $(this).attr('src',"../images/header/order.png");
    });
    $(".shopcar").hover(function(){
        $(this).attr('src',"../images/header/shop_car1.png");
    },function(){
        $(this).attr('src',"../images/header/shop_car.png");
    });
</script>
</body>
</html>