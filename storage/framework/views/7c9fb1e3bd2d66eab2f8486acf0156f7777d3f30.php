<!DOCTYPE HTML>
<html>
<head>
<?php echo $__env->make('admin.public.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<title>用户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="selecttime(1)" id="datemin" class="input-text Wdate" style="width:150px;">
		-
		<!--<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">-->
		<!--函数的参数导致与模板的花括号冲突-->
		<input type="text" onfocus="selecttime(2)" id="datemax" class="input-text Wdate" style="width:150px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
		<a href="javascript:;" onclick="member_add('添加用户','<?php echo e(asset('admin/user/create')); ?>','','510')" class="btn btn-primary radius">
			<i class="Hui-iconfont">&#xe600;</i> 添加用户</a></span> <span class="r">共有数据：<strong id="count"><?php echo e(count($result)); ?></strong> 条</span> </div>
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
				<td><u style="cursor:pointer" class="text-primary" onclick="member_show('<?php echo e($v->username); ?>','<?php echo e(asset('admin/user/'.$v->id)); ?>','<?php echo e($v->id); ?>','360','400')"><?php echo e($v->username); ?></u></td>
				<td><?php echo e($v->getSex->sex); ?></td>
				<td><?php echo e($v->phone); ?></td>
				<td><?php echo e($v->email); ?></td>
				<td class="text-l"><?php echo e($v->addr); ?></td>
				<td><?php echo e($v->addtime); ?></td>
				<?php if($v->status==1): ?>
					<td class="td-status"><span class="label label-success radius" onClick="member_stop(this,'<?php echo e($v->id); ?>')"><?php echo e($v->getStatus->status); ?></span></td>
				
				<?php else: ?>
					<td class="td-status"><span class="label label-defaunt radius" Onclick='member_start(this,"<?php echo e($v->id); ?>")'><?php echo e($v->getStatus->status); ?></span></td>
				<?php endif; ?>
				<td class="td-manage">
					<?php if($v->status==1): ?>
						<a style="text-decoration:none" onclick="member_stop(this,'<?php echo e($v->id); ?>')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>
					<?php else: ?>
						<a style='text-decoration:none' onclick='member_start(this,"<?php echo e($v->id); ?>")' href='javascript:;' title='启用'><i class='Hui-iconfont'>&#xe6e1;</i></a>
					<?php endif; ?>
					<a title="编辑" href="javascript:;" onclick="member_edit('编辑','<?php echo e(asset('admin/user/'.$v->id.'/edit')); ?>','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
					<a style="text-decoration:none" class="ml-5" onClick="change_password('修改密码','<?php echo e(asset('admin/user/changePwd/'.$v->id)); ?>','10001','600','270')" href="javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a>
					<a title="删除"  href="javascript:;" onclick="member_del(this,'<?php echo e($v->id); ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
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
//        "lengthMenu":false,//显示数量选择
//        "bFilter": false,//过滤功能
//        "bPaginate": false,//翻页信息
//        "bInfo": false,//数量信息
        "aLengthMenu": [5,6,7,8,10,15,20, 25, 50, 100],
		"aaSorting": [[ 2, "asc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,8,9]}// 制定列不参与排序
		]
	});
});
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*用户-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$.ajax({
			type: 'get',
			url: '<?php echo e(asset('admin/user/userStop')); ?>/'+id,
			dataType: 'json',
			success: function(data){
			    if(data == true){
                    $(obj).parents("tr").find(".td-manage").prepend("<a style='text-decoration:none' Onclick='member_start(this,\"<?php echo e($v->id); ?>\")' href='javascript:;' title='启用'><i class='Hui-iconfont'>&#xe6e1;</i></a>");
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius" Onclick=\'member_start(this,"<?php echo e($v->id); ?>")\'>已停用</span>');
                    $(obj).remove();
                    layer.msg('已停用!',{icon: 5,time:1000});
				}else{
                    layer.msg('停用失败!',{icon: 5,time:1000});
				}
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
		layer.close(index) ;
	});
}

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$.ajax({
			type: 'get',
			url: '<?php echo e(asset('admin/user/userStart')); ?>/'+id ,
			dataType: 'json',
			success: function(data){
			    if(data==true){
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius" onClick="member_stop(this,id)">已启用</span>');
                    $(obj).remove();
                    layer.msg('已启用!',{icon: 6,time:1000});
				}else{
                    layer.msg('启用失败!',{icon: 6,time:1000});
				}
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
		layer.close(index) ;
	});
}
/*用户-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*密码-修改*/
function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);	
}
/*用户-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'delete',
			url: '<?php echo e(asset("admin/user")); ?>/'+id,
//			dataType: 'json',
			data: {'_token':'<?php echo e(csrf_token()); ?>'},
			success: function(data){
			    if (data==true){
			        var count = Number($('#count').html()) ;
                    $('#count').html(--count) ;
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
				}else {
                    layer.msg('删除失败!',{icon:1,time:1000});
				}
			},
			error:function(data) {
				console.log(data.msg);
			}
		});
		layer.close(index) ;
	});
}
function selecttime(flag){
    if(flag==1){
        var endTime = $("#countTimeend").val();
        if(endTime != ""){
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss',maxDate:endTime})}else{
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})}
    }else{
        var startTime = $("#countTimestart").val();
        if(startTime != ""){
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss',minDate:startTime})}else{
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})}
    }
}
</script> 
</body>
</html>