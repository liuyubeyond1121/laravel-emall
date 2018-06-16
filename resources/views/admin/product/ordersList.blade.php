<!DOCTYPE HTML>
<html>
<head>
@include('admin.public.meta')
<title>订单管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 订单中心 <span class="c-gray en">&gt;</span> 订单管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="selecttime(1)" id="datemin" class="input-text Wdate" style="width:150px;">
		-
		<!--<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">-->
		<!--函数的参数导致与模板的花括号冲突-->
		<input type="text" onfocus="selecttime(2)" id="datemax" class="input-text Wdate" style="width:150px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜订单</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
		<a href="javascript:;" onclick="member_add('添加订单','{{asset('admin/comment/create')}}','','510')" class="btn btn-primary radius">
			<i class="Hui-iconfont">&#xe600;</i> 添加订单</a></span> <span class="r">共有数据：<strong id="count">  </strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="15"><input type="checkbox" name="" value=""></th>
				<th width="200">订单号</th>
				<th width="150">用户</th>
				<th width="130">收货人</th>
				<th width="130">订单时间</th>
				<th width="150">状态</th>
				<th width="150">修改状态</th>
			</tr>
		</thead>
		<tbody>
		@foreach($data as $key=>$v)
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td><a href="{{url('admin/ordersDetail').'?code='.$v->code}}">{{$v->code}}</a></td>
				<td><a href="javascript:;" onclick="member_show('{{$v->getUsername->username}}','{{asset('admin/user/'.$v->id)}}','360','400')">{{$v->getUsername->username}}</a></td>
				<td><a href="javascript:;" onclick="member_show('{{$v->getRecName->sname}}','{{asset('admin/ordersAddress?id='.$v->getRecName->id)}}','500','400')">{{$v->getRecName->sname}}</a></td>
				<td>{{$v->addtime}}</td>
				<td>{{$v->getStatus->name}}</td>
				<td>
					@if($v->status == 6)
						<a href="javascript:;" >修改状态</a>
					@else
						<a href="javascript:;" onclick="member_show('订单状态修改','{{url('admin/ordersEdit?status='.$v->status.'&code='.$v->code)}}','400','300')">修改状态</a>
					@endif
				</td>
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
        "aLengthMenu": [6,2,3,4,5,6,7,8,10,15,20, 25, 50, 100],
		"aaSorting": [[ 1, "asc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
//		"aoColumnDefs": [
//		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
//		  {"orderable":false,"aTargets":[0,8,9]}// 制定列不参与排序
//		]
	});
});
/*订单-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*订单-查看*/
function member_show(title,url,w,h){
	layer_show(title,url,w,h);
}
/*订单-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*订单-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'delete',
			url: '{{asset("admin/comment")}}/'+id,
//			dataType: 'json',
			data: {'_token':'{{csrf_token()}}'},
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