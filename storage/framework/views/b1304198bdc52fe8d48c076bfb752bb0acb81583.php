<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>阿甲商城购物车</title>
    <link rel="stylesheet" href="<?php echo e(asset("css/header.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset("css/footer.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset("css/cart.css")); ?>"/>
</head>
<body>
<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="modal" style="display:none">
    <div class="modal_dialog">
        <div class="modal_header">
            删除提醒
        </div>
        <div class="modal_information">
            <img src="<?php echo e(asset("images/model/model_img2.png")); ?>" alt=""/>
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
            <img src="<?php echo e(asset("images/model/model_img1.png")); ?>" alt="" class="rt close"/>
        </div>
        <div class="modal_information">
            <img src="<?php echo e(asset("images/model/model_img2.png")); ?>" alt=""/>
            <span>请选择商品</span>
        </div>
    </div>
</div>
<div class="big">
    <?php if($shop): ?>
    <form  name="" action="" method="">
    
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
                                <img src="<?php echo e(asset("images/cart/product_normal.png")); ?>" alt=""/>
                            </span>  <input type="hidden" name="" value="">全选
                        </div>
                    </div>
                    <div class="pudc_top">商品</div>
                    <div class="pices_top">单价(元)</div>
                    <div class="num_top">数量</div>
                    <div class="totle_top">金额</div>
                    <div class="del_top">操作</div>
                </div>

                <?php $__currentLoopData = $shop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="imfor" id="imfor<?php echo e($v['productInfo']->id); ?>">
                    <div class="check">
                        <div class="Each">
                            <span class="normal">
                                <img src="<?php echo e(asset("images/cart/product_normal.png")); ?>" alt=""/>
                            </span>
                            <input type="hidden" name="" value="">
                        </div>
                    </div>
                    <div class="pudc">
                        <div class="pudc_information" id="<?php echo e($v['productInfo']->id); ?>">
                            <img src="<?php echo e(asset("emall/n4").'/'.$v['productInfo']->defaultImage->imagePath); ?>" class="lf"/>
                            <input type="hidden" name="" value="">
                        <span class="des lf">
                            <?php echo e($v['productInfo']->name); ?>

                              <input type="hidden" name="" value="">
                        </span>
                            
                        </div>
                    </div>
                    <div class="pices">
                        <p class="pices_des">阿甲专享价</p>
                        <p class="pices_information"><b>￥</b><span><?php echo e($v['productInfo']->salePrice); ?><input type="hidden" name="" value=""></span></p>
                    </div>
                    <div class="num">
                        <span class="reduc" id="reduc" ids="<?php echo e($v['productInfo']->id); ?>">&nbsp;-&nbsp;</span>
                        <input type="text" id="myUse" value="<?php echo e($v['num']); ?>" buyUrl="<?php echo e(url("home/orderConfirm")); ?>" delsUrl="<?php echo e(url('home/delCartItems')); ?>"  url="<?php echo e(url('home/changeCartNum')); ?>" token="<?php echo e(csrf_token()); ?>" delUrl="<?php echo e(url('home/delCartItem')); ?>">
                        <span id="add" class="add" ids="<?php echo e($v['productInfo']->id); ?>">&nbsp;+&nbsp;</span></div>
                    <div class="totle">
                        <span>￥</span>
                        <span class="totle_information"></span>
                    </div>
                 
                    <div class="del">
                        <!-- <div>
                            <img src="<?php echo e(asset("img/true.png")); ?>" alt=""/>
                            <span>已移入收藏夹</span>
                        </div>
                         <a href="javascript:void(0)" class="del_yr">移入收藏夹</a>
                        -->
                        <a href="javascript:void(0)" class="del_d">删除</a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <div class="foot">
                <div class="foot_check">
                    <div class="all">
                        <span class="normal">
                                <img src="<?php echo e(asset("images/cart/product_normal.png")); ?>" alt=""/>
                            </span>  <input type="hidden" name="" value="">全选
                    </div>
                </div>
                <a href="javascript:void(0)" class="foot_del">删除</a>
                <!--<a href="javascript:void(0)" class="foot_yr">移入收藏夹</a>-->
                <div class="foot_qk">清空失效商品</div>
                <div class="foot_cash" id="go-buy">去结算</div>
                
                <div class="foot_tol"><span>合计(不含运费):</span><span  class="foot_pices susumOne">0.00</span><span class='foot_des'>元</span></div>
                <div class="foot_selected">
                    已选<span class="totalOne color">0</span>件商品
                </div>
            </div>
        </div>
    </section>

    </form>
    <?php else: ?>
    
        
        
        
            
            
            
            
        

    
        <div>
            <h1 align="center" style="color: red">您的购物车竟然还是空哒( ⊙ o ⊙ ),<a href="<?php echo e(url('/')); ?>">请购物！</a></h1>
        </div>
<?php endif; ?>
</div>
<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="<?php echo e(asset("js/jquery-3.1.1.min.js")); ?>"></script>
<script src="<?php echo e(asset("js/cart.js")); ?>"></script>
<script src="<?php echo e(asset("js/index.js")); ?>"></script>
<script>
    <!-- 显示空购物车页面-->
    $(function(){
        if(!$(".imfor")) {
            $('#section').hide();
//            $('.none').show();
        }
    });
    
        
    
</script>
</body>
</html>