<!DOCTYPE HTML>
<html>
<head>
@include('admin.public.meta')
<title>收货地址</title>
</head>
<body>
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<tr class="text-c">
			<td>收件人：</td>
			<td>{{$data->sname}}</td>
		</tr>
		<tr class="text-c">
			<td>电话：</td>
			<td>{{$data->stel}}</td>
		</tr>
		<tr class="text-c">
			<td>所在省市：</td>
			<td>{{$data->addr}}</td>
		</tr>
		<tr class="text-c">
			<td>详细信息：</td>
			<td>{{$data->addrinfo}}</td>
		</tr>
		<tr class="text-c">
			<td>邮箱：</td>
			<td>{{$data->email}}</td>
		</tr>
	</table>
</body>
</html>