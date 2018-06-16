<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>阿甲学子商城学习用品类目页</title>
    <link href="{{asset("css/header.css")}}" rel="Stylesheet"/>
    <link href="{{asset("css/footer.css")}}" rel="Stylesheet"/>
    <link href="{{asset("css/animate.css")}}" rel="Stylesheet"/>
    <link href="{{asset("css/itemCat.css")}}" rel="Stylesheet"/>
    <link rel="stylesheet" href="{{asset("css/slide.css")}}"/>
    </head>
<body>
@include('includes.header')
<!-- banner部分-->
<div class="ck-slide">
    <ul class="ck-slide-wrapper">
        <li>
            <a href="{{asset("product_details")}}"><img src="{{asset("images/itemCat/itemCat_banner1.png")}}" alt=""></a>
        </li>
        <li style="display:none">
            <a href="{{asset("product_details")}}"><img src="{{asset("images/itemCat/itemCat_banner2.png")}}" alt=""></a>
        </li>
        <li style="display:none">
            <a href="{{asset("product_details")}}"><img src="{{asset("images/itemCat/itemCat_banner3.png")}}" alt=""></a>
        </li>
        <li style="display:none">
            <a href="{{asset("product_details")}}"><img src="{{asset("images/itemCat/itemCat_banner4.png")}}" alt=""></a>
        </li>
        <li style="display:none">
            <a href="{{asset("product_details")}}"><img src="{{asset("images/itemCat/itemCat_banner1.png")}}" alt=""></a>
        </li>
    </ul>
    <a href="javascript:void(0)" class="ctrl-slide ck-prev">上一张</a> <a href="javascript:void(0)" class="ctrl-slide ck-next">下一张</a>
    <div class="ck-slidebox">
        <div class="slideWrap">
            <ul class="dot-wrap">
                <li class="current"><em>1</em></li>
                <li><em>2</em></li>
                <li><em>3</em></li>
                <li><em>4</em></li>
                <li><em>5</em></li>
            </ul>
        </div>
    </div>
</div>
<!--/*楼梯1f*/-->
<h2 class="stair"><span><img src="{{asset("images/itemCat/computer_icon.png")}}" alt=".stair"/></span> {{$electricrecords->name}} /1F</h2>

<div class="lf1">
    <div class="lf1_top">
        <!-- 上面部分左侧区域-->
        <div class="left lf">
            <div class="left_pro lf">
                <p class="top_ys1">灵越 燃7000系列</p>

                <p class="top_ys2">
                    酷睿双核i5处理器|256GB SSD| 8GB内存
                    </br>
                    英特尔HD显卡620含共享显卡内存
                </p>

                <p class="top_ys3">￥4999.00</p>

                <p class="top_ys4 color_2"><a href="{{asset("product_details")}}">查看详情</a></p>
            </div>
            <span><img src="{{asset("images/itemCat/study_computer_img1.png")}}" alt=""/></span>
        </div>
        <!-- 上面部分右侧区域-->
        <div class="right lf">
            <div class="right_pro lf">
                <p class="top_ys1">颜值 框不住</p>

                <p class="top_ys2">
                    酷睿双核i5处理器|256GB SSD| 8GB内存
                    </br>
                    英特尔HD显卡620含共享显卡内存
                </p>

                <p class="top_ys3">￥6888.00</p>

                <p class="top_ys4 color_2"><a href="{{asset("product_details")}}">查看详情</a></p>
            </div>
            <span><img src="{{asset("images/itemCat/study_computer_img2.png")}}" alt=""/></span>
        </div>
    </div>
    <div class="lf1_bottom">
        <div class="item_cat lf">
            <div class="cat_header color_2">
                <span><img src="{{asset("images/itemCat/computer_icon1.png")}}" alt=""/> {{$electricrecords->name}}/1F</span>
            </div>
            <div class="item_cat_all">
            	@foreach($electricrecords->children as $electricrecord)
            	<p>{{$electricrecord->name}}</p>
            	<ul>
            		@foreach($electricrecord->children as $subitem)
            		<li><a href="{{asset('home/study/studyarticle-list-'.$subitem->id)}}" target="_blank">{{$subitem->name}}</a></li>
            		@endforeach
            	</ul>               
                @endforeach
            </div>
        </div>
        <div class="item_msg lf">
            <img src="{{asset("images/itemCat/study_computer_img3.png")}}" alt=""/>

            <p class="bottom_ys2">戴尔(DELL)XPS13-9360-R1609 13.3英寸微边框笔记本电脑</p>

            <p class="bottom_ys3">￥4600.00</p>

            <p class="bottom_ys4 color_2"><a href="{{asset("product_details")}}">查看详情</a></p>
        </div>
        <div class="item_msg lf">
            <img src="{{asset("images/itemCat/study_computer_img4.png")}}" alt=""/>

            <p class="bottom_ys2">14.8mm超轻薄笔记本电脑  航海王版 13.3英寸微边框笔记本电脑</p>

            <p class="bottom_ys3">￥5600.00</p>

            <p class="bottom_ys4 color_2"><a href="{{asset("product_details")}}">查看详情</a></p>
        </div>
        <div class="item_msg lf">
            <img src="{{asset("images/itemCat/study_computer_img5.png")}}" alt=""/>

            <p class="bottom_ys2">联想(Lenovo) YOGA900 多彩版 13.3英寸微边框笔记本电脑</p>

            <p class="bottom_ys3">￥6600.00</p>

            <p class="bottom_ys4 color_2"><a href="{{asset("product_details")}}">查看详情</a></p>
        </div>
    </div>
</div>
<!--楼梯2f-->
<h2 class="stair"><span><img src="{{asset("images/itemCat/stationery_icon.png")}}" alt=".stair"/></span>{{$computerecords->name}}/2F</h2>

<div class="lf1">
    <div class="lf1_top">
        <!-- 上面部分左侧区域-->
        <div class="left lf">
            <div class="left_ys1 lf"><img src="{{asset("images/itemCat/study_stationery_img1.png")}}" alt=""/></div>
            <div class="left_pro lf">
                <p class="top_ys1">雅致布面年历本</p>

                <p class="top_ys2">
                    有色更有范！变色PU皮，撞色搭配，绚丽色彩，张扬个性，点亮生活新时尚！
                </p>

                <p class="top_ys3 price_ys3">仅售 ￥49.00</p>

                <p class="top_ys4 color_1"><a href="{{asset("product_details")}}">查看详情</a></p>
            </div>
        </div>
        <!-- 上面部分右侧区域-->
        <div class="right lf">
            <div class="left_ys2 lf"><img src="{{asset("images/itemCat/study_stationery_img2.png")}}" alt=""/></div>
            <div class="right_ys rt">
                <p class="top_ys1">透视网格拉链袋</p>
                <p class="top_ys2">
                    韩国创意卡通 丛林物语网格文件袋
                </p>
                <p class="top_ys3 price_ys3">仅售 ￥28.00</p>

                <p class="top_ys4 color_1"><a href="{{asset("product_details")}}">查看详情</a></p>
            </div>
        </div>
    </div>
    <div class="lf1_bottom">
        <div class="item_cat lf">
            <div class="cat_header color_1">
                <span>
                    <img src="{{asset("images/itemCat/stationery_icon1.png")}}" alt=""/> {{$computerecords->name}}/2F</span>
            </div>
            <div class="item_cat_all item_color">
            	@foreach($computerecords->children as $computerecord)
            	<p>{{$computerecord->name}}</p>
            	<ul>
            		@foreach($computerecord->children as $subitem)
            		<li><a href="{{asset('home/study/studyarticle-list-'.$subitem->id)}}" target="_blank">{{$subitem->name}}</a></li>
            		@endforeach
            	</ul>               
                @endforeach
            </div>
        </div>
        <div class="item_msg lf">
            <img src="{{asset("images/itemCat/study_stationery_img3.png")}}" alt=""/>

            <p class="bottom_ys2">得力（deli）1548A商务办公桌面计算器 太阳能双电源</p>

            <p class="bottom_ys3 price_ys3">￥58.00</p>

            <p class="bottom_ys4 color_1"><a href="{{asset("product_details")}}">查看详情</a></p>
        </div>
        <div class="item_msg lf">
            <img src="{{asset("images/itemCat/study_stationery_img4.png")}}" alt=""/>

            <p class="bottom_ys2">施耐德（Schneider） K15 经典款圆珠笔 </p>

            <p class="bottom_ys3 price_ys3">￥12.00</p>

            <p class="bottom_ys4 color_1"><a href="{{asset("product_details")}}">查看详情</a></p>
        </div>

        <div class="item_msg lf">
            <a href="{{asset("product_details")}}">
            <img src="{{asset("images/itemCat/study_stationery_img5.png")}}" alt=""/>
            <p class="bottom_ys2">齐心皮面日程本子2017.1-2018.6计划记事本效率手册</p>
            <p class="bottom_ys3 price_ys3">￥23.00</p>
            <p class="bottom_ys4 color_1"><a href="{{asset("product_details")}}" id="iii">查看详情</a></p>
            </a>
        </div>

    </div>
</div>
@include('includes.footer')
<script src="{{asset("js/jquery-3.1.1.min.js")}}"></script>
<script src="{{asset("js/index.js")}}"></script>
<script src="{{asset("js/slide.js")}}"></script>
<script>
    $('.ck-slide').ckSlide({
        autoPlay: true,//默认为不自动播放，需要时请以此设置
        dir: 'x',//默认效果淡隐淡出，x为水平移动，y 为垂直滚动
        interval:3000//默认间隔2000毫秒
    });
</script>
<script>
    $("#iii").click(function(){
        location.href="{{asset("product_details")}}";
    })
</script>
</body>
</html>