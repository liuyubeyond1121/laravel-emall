<!DOCTYPE HTML>
<html>
<head>
@include('admin.public.meta')
<title>分类管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 分类中心 <span class="c-gray en">&gt;</span> 分类管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="selecttime(1)" id="datemin" class="input-text Wdate" style="width:150px;">
		-
		<!--<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">-->
		<!--函数的参数导致与模板的花括号冲突-->
		<input type="text" onfocus="selecttime(2)" id="datemax" class="input-text Wdate" style="width:150px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜分类</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
			<a href="javascript:;" onclick="member_add('添加分类','{{asset('admin/category/create')}}','','510')" class="btn btn-primary radius">
			<i class="Hui-iconfont">&#xe600;</i> 添加分类</a></span> <span class="r">共有数据：<strong id="count">{{count($data)}}</strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="35">ID</th>
				<th width="180">分类名</th>
				<th width="50">分类级别</th>
				<th width="25">排序值</th>
				<th width="50">添加子类</th>
				<th width="50">操作</th>
			</tr>
		</thead>
		<tbody>
		@foreach($data as $v)
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>{{$v->id}}</td>
				<td style="text-align: left;">{{str_repeat('|==',$v->level-1)}}{{$v->name}}</td>
				<td>{{$v->level}}级分类</td>
				<td>{{$v->sort}}</td>
{{--				<td><a href="{{asset('admin/category/create')}}?parentId={{$v->id}}&parentIdPath={{$v->parentIdPath}}_{{$v->id}}">添加子类</a></td>--}}
				{{--@if($v->level>2)--}}
				{{--<td><a href="javascript:;" class="btn btn-info radius"><i class="Hui-iconfont">&#xe600;</i> 添加子类</a></td>--}}
				{{--@else--}}
				<td><a href="javascript:;" onclick="member_add('添加子类','{{asset('admin/category/create')}}?parentId={{$v->id}}&parentIdPath={{$v->parentIdPath}}_{{$v->id}}','','510')" class="btn btn-info radius"><i class="Hui-iconfont">&#xe600;</i> 添加子类</a></td>
				{{--@endif--}}
				<td>
					<a title="编辑" href="javascript:;" onclick="member_edit('编辑','{{asset('admin/category/'.$v->id.'/edit')}}','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
					<a title="删除"  href="javascript:;" onclick="member_del('{{url('admin/category').'/'.$v->id}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
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
$(function(){
	$('.table-sort').dataTable({
//        "lengthMenu":false,//显示数量选择
//        "bFilter": false,//过滤功能
//        "bPaginate": false,//翻页信息
//        "bInfo": false,//数量信息
        "aLengthMenu": [8,5,6,7,8,10,15,20, 25, 50, 100],
//		"aaSorting": [[ 2, "asc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
//		  {"orderable":false,"aTargets":[0]}// 制定列不参与排序
		]
	});
});
/*分类-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*分类-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$.ajax({
			type: 'get',
			url: '{{asset('admin/category/userStop')}}/'+id,
			dataType: 'json',
			success: function(data){
			    if(data == true){
                    $(obj).parents("tr").find(".td-manage").prepend("<a style='text-decoration:none' Onclick='member_start(this,\"{{$v->id}}\")' href='javascript:;' title='启用'><i class='Hui-iconfont'>&#xe6e1;</i></a>");
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
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

/*分类-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$.ajax({
			type: 'get',
			url: '{{asset('admin/category/userStart')}}/'+id ,
			dataType: 'json',
			success: function(data){
			    if(data==true){
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
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
/*分类-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*密码-修改*/
function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);	
}
/*分类-删除*/
function member_del(url){
	layer.confirm('确认要删除吗？',function(index){
		//可以用post方法模拟delete
		$.post(url,{'_token':'{{csrf_token()}}','_method':'delete'},function(data){
			if(data){
			    location.reload() ;
			}
        }) ;
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