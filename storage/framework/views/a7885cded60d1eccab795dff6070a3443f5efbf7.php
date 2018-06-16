﻿<!DOCTYPE HTML>
<html>
<head>
<?php echo $__env->make('admin.public.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<title>删除的用户</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 删除的用户<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="selecttime(1)" id="datemin" class="input-text Wdate" style="width:150px;">
		-
		<input type="text" onfocus="selecttime(2)" id="datemax" class="input-text Wdate" style="width:150px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> </span> <span class="r">共有数据：<strong><?php echo e(count($result)); ?></strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="80">ID</th>
				<th width="100">用户名</th>
				<th width="40">性别</th>
				<th width="90">手机</th>
				<th width="150">邮箱</th>
				<th width="">地址</th>
				<th width="130">加入时间</th>
				<th width="70">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td><?php echo e($v->id); ?></td>
				<td><u style="cursor:pointer" class="text-primary" onclick="member_show('<?php echo e($v->username); ?>','<?php echo e(asset('admin/user/'.$v->id)); ?>','360','400')"><?php echo e($v->username); ?></u></td>
				<td><?php echo e($v->sex); ?></td>
				<td><?php echo e($v->phone); ?></td>
				<td><?php echo e($v->email); ?></td>
				<td class="text-l"><?php echo e($v->addr); ?></td>
				<td><?php echo e($v->addtime); ?></td>
				<td class="td-status"><span class="label label-danger radius">已删除</span></td>
				<td class="td-manage"><a style="text-decoration:none" href="<?php echo e(asset("admin/user/userRestore/".$v->id)); ?>" onClick="member_huanyuan(this,'1')" title="还原"><i class="Hui-iconfont">&#xe66b;</i></a>
					<a title="删除" href="<?php echo e(asset("admin/user/userDeleteDo/".$v->id)); ?>" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	</div>
</div>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="<?php echo e(asset("admin/lib/My97DatePicker/4.8/WdatePicker.js")); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset("admin/lib/datatables/1.10.0/jquery.dataTables.min.js")); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset("admin/lib/laypage/1.2/laypage.js")); ?>"></script>
<script type="text/javascript">
$(function(){
	$('.table-sort').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,8,9]}// 制定列不参与排序
		]
	});
});
/*用户-查看*/
function member_show(title,url,w,h){
    layer_show(title,url,w,h);
}
/*用户-还原*/
//function member_huanyuan(obj,id){
//	layer.confirm('确认要还原吗？',function(index){
//
//		$(obj).remove();
//		layer.msg('已还原!',{icon: 6,time:1000});
//	});
//}

/*用户-删除*/
//function member_del(obj,id){
//	layer.confirm('确认要删除吗？',function(index){
//		$.ajax({
//			type: 'POST',
//			url: '',
//			dataType: 'json',
//			success: function(data){
//				$(obj).parents("tr").remove();
//				layer.msg('已删除!',{icon:1,time:1000});
//			},
//			error:function(data) {
//				console.log(data.msg);
//			},
//		});
//	});
//}
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