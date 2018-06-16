﻿<!DOCTYPE HTML>
<html>
<head>
@include('admin.public.meta')
<title>图片列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 图片管理 <span class="c-gray en">&gt;</span> 轮播图列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="selecttime(1)" id="datemin" class="input-text Wdate" style="width:150px;">
		-
		<input type="text" onfocus="selecttime(2)" id="datemax" class="input-text Wdate" style="width:150px;">
		<input type="text" name="" id="" placeholder=" 图片名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜图片</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
		<i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
		<a class="btn btn-primary radius" onclick="picture_add('添加图片','{{asset('admin/slider/create')}}')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加图片</a></span>
		<span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="40"><input name="" type="checkbox" value=""></th>
					<th width="80">ID</th>
					<th width="60">排序</th>
					<th width="100">图片</th>
					<th width="150">描述</th>
					<th width="150">友情链接</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
			@foreach($data as $v)
				<tr class="text-c">
					<td><input name="" type="checkbox" value=""></td>
					<td>{{$v->id}}</td>
					<td>{{$v->orders}}</td>
					<td><img width="120px" class="picture-thumb" src="{{asset("admin/upload").'/'.$v->image}}"></td>
					<td>{{$v->title}}</td>
					<td>{{$v->href}}</td>
					<td class="td-manage">
						<a style="text-decoration:none" class="ml-5" onClick="picture_edit('轮播图编辑','{{asset('admin/slider/'.$v->id.'/edit')}}')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
						<a style="text-decoration:none" class="ml-5" onClick="picture_del(this,'{{$v->id}}')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset("admin/lib/My97DatePicker/4.8/WdatePicker.js")}}"></script>
<script type="text/javascript" src="{{asset("admin/lib/datatables/1.10.0/jquery.dataTables.min.js")}}"></script>
<script type="text/javascript" src="{{asset("admin/lib/laypage/1.2/laypage.js")}}"></script>
<script type="text/javascript">
$('.table-sort').dataTable({
	"aaSorting": [[ 2, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
//	  {"orderable":false,"aTargets":[0,8]}// 制定列不参与排序
	]
});
/*图片-编辑*/
function picture_edit(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
function picture_add(title,url,w,h){
    layer_show(title,url,w,h);
}

/*图片-删除*/
function picture_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'delete',
			url: "{{asset('admin/slider/'.$v->id)}}",
			dataType: 'json',
            data: {'_token':'{{csrf_token()}}'},
			success: function(data){
			    if(data){
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
				}else{
                    layer.msg('删除失败!',{icon: 1,time:1000});
                }
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
        layer.close(index) ;
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