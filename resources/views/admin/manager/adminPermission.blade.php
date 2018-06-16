﻿<!DOCTYPE HTML>
<html>
<head>
@include('admin.public.meta')
<title>权限管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 权限管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="{{asset("admin/javascript:location.replace(location.href);")}}" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		<form class="Huiform" method="post" action="" target="_self">
			<input type="text" class="input-text" style="width:250px" placeholder="权限名称" id="" name="">
			<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜权限节点</button>
		</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
		<i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
		<a href="javascript:;" onclick="admin_permission_add('添加权限节点','__MODULE__/Admin/adminPermissionAdd/pattern/1','','310')" class="btn btn-primary radius">
			<i class="Hui-iconfont">&#xe600;</i> 添加权限节点</a></span>
		<span class="r">共有数据：<strong>{{count($result)}}</strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="7">权限节点</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="200">权限名称</th>
				<th>权限说明</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
		@foreach($result as $v)
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>{{$v->id}}</td>
				<td>{{$v->name}}</td>
				<td>{{$v->description}}</td>
				<td><a title="编辑" href="javascript:;" onclick="admin_permission_edit('编辑权限节点','__MODULE__/Admin/adminPermissionAdd/pattern/0/id/{$v.id}','{$v.id}','','310')" class="ml-5" style="text-decoration:none">
					<i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="admin_permission_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset("admin/lib/datatables/1.10.0/jquery.dataTables.min.js")}}"></script>
<script type="text/javascript">
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-权限-添加*/
function admin_permission_add(title,url,w,h) {
    layer_show(title, url, w, h);
}

/*管理员-权限-编辑*/
function admin_permission_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
//    layui.use('layer', function () {
//        layer.open({          // 普通信息弹窗
//            type:1,
//            title:'修改节点',
//            content:$("#upd"),
//            shadeClose:true,
//            area:['600px','300px'],
//            btn:['确定','取消'],
//            btn1: function (index) {
//                $.post('__MODULE__/Admin/adminPermissionSave','id='+id+'&title='+$('#title').val()+'&url='+$('#url').val(), function (data) {
//                    layer.msg('修改成功',{icon:6,time:500}, function (){
//                        location.href = location.href;
//                    });
//                    layer.close(index);
//                })
//            },
//            btn2: function () {
//                layer.msg('取消修改',{icon:7,time:2000})
//            }
//
//        });
//    })
}

/*管理员-权限-删除*/
function admin_permission_del(obj,id){
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
</script>
</body>
</html>