<!DOCTYPE HTML>
<html>
<head>
<?php echo $__env->make('admin.public.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<title>产品列表</title>
<link rel="stylesheet" href="<?php echo e(asset("admin/lib/zTree/v3/css/zTreeStyle/zTreeStyle.css")); ?>" type="text/css">
<link rel="stylesheet" href="<?php echo e(asset("css/bootstrap.css")); ?>" type="text/css">
</head>
<body class="pos-r">


<div>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 产品列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="page-container">
		<div class="text-c"> 日期范围：
			<input type="text" onfocus="selecttime(1)" id="datemin" class="input-text Wdate" style="width:150px;">
			-
			<input type="text" onfocus="selecttime(2)" id="datemax" class="input-text Wdate" style="width:150px;">
			<input type="text" name="" id="" placeholder=" 产品名称" style="width:250px" class="input-text">
			<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜产品</button>
		</div>
		<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
			<i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
			<a class="btn btn-primary radius" onclick="product_add('添加产品','<?php echo e(asset('admin/product/create')); ?>')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加产品</a></span>
			<span class="r">共有数据：<strong><?php echo e($total); ?></strong> 条</span> </div>
		<div class="mt-20">
			<table class="table table-border table-bordered table-bg table-hover table-sort">
				<thead>
					<tr class="text-c">
						<th width="40"><input name="" type="checkbox" value=""></th>
						<th width="50">ID</th>
						<th width="60">缩略图</th>
						<th width="160">产品名称</th>
						<th>描述</th>
						<th width="80">现价</th>
						<th width="70">是否上架</th>
						<th width="60">是否推荐</th>
						<th width="80">操作</th>
					</tr>
				</thead>
				<tbody>
				<?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr class="text-c va-m">
						<td><input name="" type="checkbox" value=""></td>
						<td><?php echo e($v->id); ?></td>
						<td><a onClick="product_show('<?php echo e($v->name); ?>','<?php echo e(asset('admin/product/'.$v->id)); ?>','<?php echo e($v->id); ?>')" href="javascript:;"><img width="60" class="product-thumb" <?php if($v->defaultImage): ?> src="<?php echo e(asset('emall/n4/'.$v->defaultImage->imagePath)); ?>" <?php else: ?> src="<?php echo e(asset('emall/notImage.png')); ?>" <?php endif; ?>></a></td>
						<td class="text-l"><a style="text-decoration:none" onClick="product_show('<?php echo e($v->name); ?>','<?php echo e(asset('admin/product/'.$v->id)); ?>','<?php echo e($v->id); ?>')" href="javascript:;">
							<?php echo e($v->name); ?></a></td>
						<td class="text-l"><?php echo e($v->abstract); ?></td>
						<td><span class="price"><?php echo e($v->salePrice); ?></span></td>
						<?php if($v->isSale == 1): ?>
							<td class="td-status"><span class="label label-success radius">上架</span></td>
						<?php else: ?>
							<td class="td-status"><span class="label label-defaunt radius">下架</span></td>
						<?php endif; ?>
						<?php if($v->isRecommend == 1): ?>
							<td class="td-status"><span class="label label-success radius">推荐</span></td>
						<?php else: ?>
							<td class="td-status"><span class="label label-defaunt radius">不推荐</span></td>
						<?php endif; ?>
						<td class="td-manage"><a style="text-decoration:none" onClick="product_stop(this,'<?php echo e($v->id); ?>')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>
							<a style="text-decoration:none" class="ml-5" onClick="product_edit('产品编辑','<?php echo e(asset('admin/product/'.$v->id.'/edit')); ?>','<?php echo e($v->id); ?>')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
							<a style="text-decoration:none" class="ml-5" onClick="product_del(this,'<?php echo e($v->id); ?>')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<tr align="center" >
					<td colspan="9"><div class="pagination" style="clear: both" ><?php echo e($result->links()); ?></div></td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="<?php echo e(asset("admin/lib/zTree/v3/js/jquery.ztree.all-3.5.min.js")); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset("admin/lib/My97DatePicker/4.8/WdatePicker.js")); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset("admin/lib/datatables/1.10.0/jquery.dataTables.min.js")); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset("admin/lib/laypage/1.2/laypage.js")); ?>"></script>
<script type="text/javascript">
/*var setting = {
	view: {
		dblClickExpand: false,
		showLine: false,
		selectedMulti: false
	},
	data: {
		simpleData: {
			enable:true,
			idKey: "id",
			pIdKey: "pid",
			rootPId: ""
		},
        key : {
            name : "typename" //如果命名就是"name"，此处可以不写
        },
    },
	async: {
        enable: true,
        url: "__MODULE__/Product/zTree",
        autoParam: ["id"]
    },
	callback: {
		beforeClick: function(treeId, treeNode) {
			var zTree = $.fn.zTree.getZTreeObj("tree");
			if (treeNode.isParent) {
				zTree.expandNode(treeNode);
				return false;
			} else {
				//demoIframe.attr("src",treeNode.file + ".html");
				return true;
			}
		}
	}
};

$(document).ready(function(){
    //ajax提交数据，请求后台PHP处理返回出目录结构json数据
    $.ajax({
        url:"__MODULE__/Product/zTree",
        type: "get",
        async: false,
        dataType:"json",
        success: function (data) {
            zNodes=data;    //将请求返回的数据存起来
            var t = $("#treeDemo");
            $.fn.zTree.init(t, setting, zNodes);
            //demoIframe = $("#testIframe");
            //demoIframe.on("load", loadReady);
            //var zTree = $.fn.zTree.getZTreeObj("tree");
            //zTree.selectNode(zTree.getNodeByParam("id",'11'));
        },
        error: function (){
            alert('请求失败');
        }
    })
});*/
/*$('.table-sort').dataTable({
    "aLengthMenu": [3,4,5,6,7,8,10,15,20, 25, 50, 100],
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
    "info": false,
	"aoColumnDefs": [
	  {"orderable":false,"aTargets":[0,7]}// 制定列不参与排序
	]
});*/
/*产品-添加*/
function product_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*产品-查看*/
function product_show(title,url,id){
//	var index = layer.open({
//		type: 2,
//		title: title,
//		content: url
//	});
//	layer.full(index);
	layer_show(title,url)
}
/*产品-审核*/
function product_shenhe(obj,id){
	layer.confirm('审核文章？', {
		btn: ['通过','不通过'],
		shade: false
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="product_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布', {icon:6,time:1000});
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="product_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
		$(obj).remove();
    	layer.msg('未通过', {icon:5,time:1000});
	});
}
/*产品-下架*/
function product_stop(obj,id){
	layer.confirm('确认要下架吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
		$(obj).remove();
		layer.msg('已下架!',{icon: 5,time:1000});
	});
}

/*产品-发布*/
function product_start(obj,id){
	layer.confirm('确认要发布吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布!',{icon: 6,time:1000});
	});
}

/*产品-申请上线*/
function product_shenqing(obj,id){
	$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
	$(obj).parents("tr").find(".td-manage").html("");
	layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
}

/*产品-编辑*/
function product_edit(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/*产品-删除*/
function product_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}
function selecttime(flag){
    if(flag==1){
        var endTime = $("#countTimeend").val();
        if(endTime != ""){
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',maxDate:endTime})}else{
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})}
    }else{
        var startTime = $("#countTimestart").val();
        if(startTime != ""){
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:startTime})}else{
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})}
    }
}
</script>
</body>
</html>