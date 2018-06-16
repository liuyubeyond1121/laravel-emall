<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>阿甲商城购物车</title>
    <link rel="stylesheet" href="{{asset("css/header.css")}}"/>
    <link rel="stylesheet" href="{{asset("css/footer.css")}}"/>
    <link rel="stylesheet" href="{{asset("css/cart.css")}}"/>
</head>
<body>
@include('includes.header')
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
<div class="big">
    @if($shop)
    <form  name="" action="" method="">
    {{--{{csrf_field()}}--}}
    <section id="section" >
        <div id="title">
            <b>购物车</b>
            <p>
                已选<span class="total color">0</span>件商品<span class="interval"></span>合计(不含运费):<span class="totalPrices color susum">0.00</span><span class="unit color">元</span>
            </p>
        </div>
        <div id="box" >
            <div id="content_box">
                <div class="imfor_top">
                    <div class="check_top">
                        <div class="all">
                            <span class="normal">
                                <img src="{{asset("images/cart/product_normal.png")}}" alt=""/>
                            </span>  <input type="hidden" name="" value="">全选
                        </div>
                    </div>
                    <div class="pudc_top">商品</div>
                    <div class="pices_top">单价(元)</div>
                    <div class="num_top">数量</div>
                    <div class="totle_top">金额</div>
                    <div class="del_top">操作</div>
                </div>

                @foreach($shop as $v)

                <div class="imfor" id="imfor{{$v['productInfo']->id}}">
                    <div class="check">
                        <div class="Each">
                            <span class="normal">
                                <img src="{{asset("images/cart/product_normal.png")}}" alt=""/>
                            </span>
                            <input type="hidden" name="" value="">
                        </div>
                    </div>
                    <div class="pudc">
                        <div class="pudc_information" id="{{$v['productInfo']->id}}">
                            <img src="{{asset("emall/n4").'/'.$v['productInfo']->defaultImage->imagePath}}" class="lf"/>
                            <input type="hidden" name="" value="">
                        <span class="des lf">
                            {{$v['productInfo']->name}}
                              <input type="hidden" name="" value="">
                        </span>
                            {{--<p class="col lf"><span>颜色：</span><span class="color_des">深空灰  <input type="hidden" name="" value=""></span></p>--}}
                        </div>
                    </div>
                    <div class="pices">
                        <p class="pices_des">阿甲专享价</p>
                        <p class="pices_information"><b>￥</b><span>{{$v['productInfo']->salePrice}}<input type="hidden" name="" value=""></span></p>
                    </div>
                    <div class="num">
                        <span class="reduc" id="reduc" ids="{{$v['productInfo']->id}}">&nbsp;-&nbsp;</span>
                        <input type="text" id="myUse" value="{{$v['num']}}" buyUrl="{{url("home/orderConfirm")}}" delsUrl="{{url('home/delCartItems')}}"  url="{{url('home/changeCartNum')}}" token="{{csrf_token()}}" delUrl="{{url('home/delCartItem')}}">
                        <span id="add" class="add" ids="{{$v['productInfo']->id}}">&nbsp;+&nbsp;</span></div>
                    <div class="totle">
                        <span>￥</span>
                        <span class="totle_information"></span>
                    </div>
                 {{--   <script>
                        $('#add').click(function(){
                            num = Number($(this).prev().val()) ;
                            $(this).prev().val(++num) ;

                           // alert($(this).attr('ids')) ;
                        }) ;
                        $('#reduc').click(function(){
                            num = Number($(this).next().val()) ;
                            $(this).next().val(--num) ;
                        })
                    </script>--}}
                    <div class="del">
                        <!-- <div>
                            <img src="{{asset("img/true.png")}}" alt=""/>
                            <span>已移入收藏夹</span>
                        </div>
                         <a href="javascript:void(0)" class="del_yr">移入收藏夹</a>
                        -->
                        <a href="javascript:void(0)" class="del_d">删除</a>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="foot">
                <div class="foot_check">
                    <div class="all">
                        <span class="normal">
                                <img src="{{asset("images/cart/product_normal.png")}}" alt=""/>
                            </span>  <input type="hidden" name="" value="">全选
                    </div>
                </div>
                <a href="javascript:void(0)" class="foot_del">删除</a>
                <!--<a href="javascript:void(0)" class="foot_yr">移入收藏夹</a>-->
                <div class="foot_qk">清空失效商品</div>
                <div class="foot_cash" id="go-buy">去结算</div>
                {{--<input type="submit" value="去结算" class="foot_cash"/>--}}
                <div class="foot_tol"><span>合计(不含运费):</span><span  class="foot_pices susumOne">0.00</span><span class='foot_des'>元</span></div>
                <div class="foot_selected">
                    已选<span class="totalOne color">0</span>件商品
                </div>
            </div>
        </div>
    </section>

    </form>
    @else
    {{--<div class="none" style="display: none">--}}
        {{--<p class="none_title">购物车</p>--}}
        {{--<div class="none_top"></div>--}}
        {{--<div class="none_content">--}}
            {{--<img src="{{asset("images/30.png")}}" alt="" class="lf"/>--}}
            {{--<p class="lf">您的购物车竟然还是空哒( ⊙ o ⊙ )</p>--}}
            {{--<span class="lf">赶快去下单吧！</span>--}}
            {{--<a href="#" class="lf">去购物>></a>--}}
        {{--</div>--}}

    {{--</div>--}}
        <div>
            <h1 align="center" style="color: red">您的购物车竟然还是空哒( ⊙ o ⊙ ),<a href="{{url('/')}}">请购物！</a></h1>
        </div>
@endif
</div>
@include('includes.footer')
<script src="{{asset("js/jquery-3.1.1.min.js")}}"></script>
<script src="{{asset("js/cart.js")}}"></script>
<script src="{{asset("js/index.js")}}"></script>
<script>
    <!-- 显示空购物车页面-->
    $(function(){
        if(!$(".imfor")) {
            $('#section').hide();
//            $('.none').show();
        }
    });
    {{--$("#go-buy").click(function(){--}}
        {{--window.location.href="{{url("home/orderConfirm")}}";--}}
    {{--})--}}
</script>
</body>
</html>