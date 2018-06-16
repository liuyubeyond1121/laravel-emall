<!DOCTYPE HTML>
<html>
<head>
<include file="Public/meta"/>
<title>用户查看</title>
</head>
<body>
<div class="pd-20">
	<table class="table">
		<tbody>
			<tr>
				<th class="text-r">产品ID：</th>
				<td>{$arr.id}</td>
			</tr>
			<tr>
				<th class="text-r">产品名称：</th>
				<td>{$arr.prodname}</td>
			</tr>
			<tr>
				<th class="text-r">产品类型：</th>
				<td>{$arr.type}</td>
			</tr>
			<tr>
				<th class="text-r">原价：</th>
				<td>{$arr.origprice}</td>
			</tr>
			<tr>
				<th class="text-r">现价：</th>
				<td>{$arr.price}</td>
			</tr>
			<tr>
				<th class="text-r">毛重：</th>
				<td>{$arr.weight}</td>
			</tr>
			<tr>
				<th class="text-r">库存：</th>
				<td>{$arr.num}</td>
			</tr>
			<tr>
				<th class="text-r">产地：</th>
				<td>{$arr.place}</td>
			</tr>
			<tr>
				<th class="text-r">生产日期：</th>
				<td>{$arr.proddate}</td>
			</tr>
			<tr>
				<th class="text-r">保质期：</th>
				<td>{$arr.expiredate}</td>
			</tr>
			<tr>
				<th class="text-r">上架时间：</th>
				<td>{$arr.shelvedate}</td>
			</tr>
			<tr>
				<th class="text-r">产品描述：</th>
				<td>{$arr.contents}</td>
			</tr>
			<tr>
				<th class="text-r">产品状态：</th>
				<td>{$arr.status}</td>
			</tr>
			<tr>
				<th class="text-r">产品图片：</th>
				<td>
					<foreach name="images" item="v">
						<img height="80px" width="100px" src="{{asset("admin/my/upload/{$v.image}")}}"/></span>
					</foreach>
				</td>
			</tr>
		</tbody>


	</table>
</div>
<!--请在下方写此页面业务相关的脚本-->
</body>
</html>