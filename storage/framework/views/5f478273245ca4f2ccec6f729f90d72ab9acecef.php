<header id="top">
    <div id="logo" class="lf">
        <img class="animated jello" src="<?php echo e(asset("images/header/logo.png")); ?>" alt="logo"/>
    </div>
    <div id="top_input" class="lf">
        <input id="input" type="text" placeholder="请输入您要搜索的内容"/>
        <div class="seek" tabindex="-1">
            <div class="actived" ><span>分类搜索</span> <img src="<?php echo e(asset("images/header/header_normal.png")); ?>" alt=""/></div>
            <div class="seek_content" >
                <div id="shcy" >生活餐饮</div>
                <div id="xxyp" >学习用品</div>
                <div id="srdz" >私人订制</div>
            </div>
        </div>
        <a href="<?php echo e(asset("")); ?>" class="rt"><img id="search" src="<?php echo e(asset("images/header/search.png")); ?>" alt="搜索"/></a>
    </div>
    <div class="rt">
        <ul class="lf">
            <li><a href="<?php echo e(asset("home/myCollect")); ?>" title="我的收藏"><img src="<?php echo e(asset("images/header/care.png")); ?>" alt=""/></a><b>|</b></li>
            <li><a href="<?php echo e(asset("home/myOrder")); ?>" title="我的订单"><img  src="<?php echo e(asset("images/header/order.png")); ?>" alt=""/></a><b>|</b></li>
            <li><a href="<?php echo e(asset("home/cart")); ?>" title="我的购物车"><img  src="<?php echo e(asset("images/header/shop_car.png")); ?>" alt=""/></a><b>|</b></li>
            <?php if(empty(session('user'))): ?>
                <li><a href="<?php echo e(asset("home/login")); ?>">登录</a></li>
                <li><a href="<?php echo e(asset("home/register")); ?>">注册</a></li>
            <?php else: ?>
                <li>欢迎您，<a href="#"><?php echo e(session('user')->username); ?></a></li>
                <li><a href="<?php echo e(asset("home/logout")); ?>">注销</a></li>
            <?php endif; ?>
            <li><a href="<?php echo e(asset("admin/index")); ?>">后台主页</a></li>
        </ul>
    </div>
</header>
<!-- nav主导航-->
<nav id="nav">
    <ul>
        <li><a href="<?php echo e(asset("/")); ?>">首页</a></li>
        <li><a href="<?php echo e(asset("home/food/foodarticle")); ?>">生活餐饮</a></li>
        <li><a href="<?php echo e(asset("home/study/studyarticle")); ?>">学习用品</a></li>
        <li><a href="<?php echo e(asset("lookforward")); ?>">私人定制</a></li>
    </ul>
</nav>
<script src="<?php echo e(asset("js/jquery-3.1.1.min.js")); ?>"></script>
<script src="<?php echo e(asset("js/index.js")); ?>"></script>