<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>我的订单 - 阿甲学子商城</title>
    <link href="{{asset("css/myOrder.css")}}" rel="Stylesheet"/>
    <link href="{{asset("css/header.css")}}" rel="Stylesheet"/>
    <link href="{{asset("css/footer.css")}}" rel="Stylesheet"/>
</head>
<body>
@include('includes.header')
<!-- 我的订单导航栏-->
<div id="nav_order">
    <ul>
        <li><a href="{{asset("/")}}">首页<span>&gt;</span>订单管理</a></li>
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
            <!-- 商品信息标题-->
            <table id="order_list_title"  cellpadding="0" cellspacing="0" >
                <tr>
                    <th width="345">商品</th>
                    <th width="82">单价（元）</th>
                    <th width="50">数量</th>
                    <th width="82">售后</th>
                    <th width="100">实付款（元）</th>
                    <th width="90">交易状态</th>
                    <th width="92">操作</th>
                </tr>
            </table>
            <!-- 订单列表项 -->
            @foreach($udataAll as $v)
            <div id="orderItem">
              <p class="orderItem_title">
                 <span id="order_id">
                     &nbsp;&nbsp;订单编号:<a href="#">{{$v->code}}</a>
                 </span>
                  &nbsp;&nbsp;成交时间：{{$v->addtime}}&nbsp;&nbsp;
                 <span>
                     <a href="#" class="servie">
                        联系客服<img src="{{asset("images/myOrder/kefuf.gif")}}"/>
                      </a>
                 </span>
              </p>
            </div>
            <div id="orderItem_detail">
                  <ul>
                      <li class="product">
                          <b><a href="#"><img width="84px" src="{{asset("emall/n4/".$v->getDefaultImage($v->getProduct->imageId))}}" /></a></b>
                          <b class="product_name lf" >
                              <a href="{{asset("")}}">{{$v->getProduct->name}}</a>
                              <br/>
                          </b>
                          <b class="product_color ">
                              颜色：深空灰
                          </b>
                      </li>
                      <li class="unit_price">
                          专属价
                          <br/>
                          ￥{{$v->getProduct->salePrice}}
                      </li>
                      <li class="count">
                          {{$v->num}}件
                      </li>
                      <li class="sale_support">
                          退款/退货
                          <br/>
                          我要维权
                      </li>
                      <li class=" payments_received">
                          ￥{{$v->price}}
                      </li>
                      <li class="trading_status">
                          <img src="{{asset("images/myOrder/car.png")}}" alt=""/>已发货
                          <br/>
                          <a href="{{asset("orderInfo.html")}}">订单详情</a>
                          <br/>
                          <a href="#" class="view_logistics">查看物流</a>
                      </li>
                      <li class="operate">
                          <a href="#">确认收货</a>
                      </li>
                  </ul>
              </div>
            @endforeach



<!--分页器-->
            <div class="tcdPageCode"></div>

        </div>
    </div>

@include('includes.footer')
</body>
<script type="text/javascript" src="{{asset("js/jquery-3.1.1.min.js")}}"></script>
<script src="{{asset("js/index.js")}}"></script>
<script src="{{asset("js/jquery.page.js")}}"></script>
<script type="text/javascript" src="{{asset("js/order.js")}}"></script>

<script type="text/javascript" src="{{asset("admin/lib/jquery/1.9.1/jquery.min.js")}}"></script>
<script type="text/javascript" src="{{asset("admin/lib/layer/2.4/layer.js")}}"></script>
<script type="text/javascript" src="{{asset("admin/static/h-ui/js/H-ui.min.js")}}"></script>
<script type="text/javascript" src="{{asset("admin/static/h-ui.admin/js/H-ui.admin.js")}}"></script>

<script>
/*用户-查看*/
function member_show(title,url,w,h){
    layer_show(title,url,w,h);
}
</script>
</html>