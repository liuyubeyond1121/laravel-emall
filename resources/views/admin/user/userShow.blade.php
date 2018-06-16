<!DOCTYPE HTML>
<html>
<head>
@include('admin.public.meta')
<title>用户查看</title>
</head>
<body>
<div class="cl pd-20" style=" background-color:#5bacb6">
	<img class="avatar size-XL l" src="{{asset("admin/my/images/user/$result->image")}}">
	<dl style="margin-left:80px; color:#fff">
		<dt>
			<span class="f-18">{{$result->username}}</span>
			<span class="pl-10 f-12">等级：{{$result->level}}</span>
		</dt>
		<dd class="pt-10 f-12" style="margin-left:0">{{$result->signature}}</dd>
	</dl>
</div>
<div class="pd-20">
	<table class="table">
		<tbody>
			<tr>
				<th class="text-r" width="80">性别：</th>
				<td>{{$result->sex}}</td>
			</tr>
			<tr>
				<th class="text-r">手机：</th>
				<td>{{$result->phone}}</td>
			</tr>
			<tr>
				<th class="text-r">邮箱：</th>
				<td>{{$result->email}}</td>
			</tr>
			<tr>
				<th class="text-r">地址：</th>
				<td>{{$result->addr}}</td>
			</tr>
			<tr>
				<th class="text-r">注册时间：</th>
				<td>{{$result->addtime}}</td>
			</tr>
			<tr>
				<th class="text-r">积分：</th>
				<td>{{$result->userexp}}</td>
			</tr>
		</tbody>
	</table>
</div>
<!--请在下方写此页面业务相关的脚本-->
</body>
</html>