<!DOCTYPE HTML>
<html>
<head>
@include('admin.public.meta')
<title>编辑评论 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form action="{{asset('admin/comment')}}"  method="post" class="form form-horizontal" id="form-member-add">
		{{csrf_field()}}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>星级：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"  placeholder="数字1到5代表对应星级" id="star" name="star" value="{{$data->star}}">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">评论：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="text" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" onKeyUp="$.Huitextarealength(this,100)">{{$data->text}}</textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">对应用户：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
					<select name="uid">
						@foreach($user as $v)
							@if($v->id == $data->uid)
							<option value="{{$v->id}}" selected>{{$v->username}}</option>
							@else
							<option value="{{$v->id}}">{{$v->username}}</option>
							@endif
						@endforeach
					</select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">对应产品：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
					<select name="gid">
						@foreach($product as $v)
							@if($v->id == $data->gid)
								<option value="{{$v->id}}" selected>{{$v->name}}</option>
							@else
								<option value="{{$v->id}}">{{$v->name}}</option>
							@endif
						@endforeach
					</select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" onclick="promptinfo();" formtarget="_parent" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>


<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="{{asset("admin/lib/My97DatePicker/4.8/WdatePicker.js")}}"></script>
<script type="text/javascript" src="{{asset("admin/lib/jquery.validation/1.14.0/jquery.validate.js")}}"></script>
<script type="text/javascript" src="{{asset("admin/lib/jquery.validation/1.14.0/validate-methods.js")}}"></script>
<script type="text/javascript" src="{{asset("admin/lib/jquery.validation/1.14.0/messages_zh.js")}}"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-member-add").validate({
		rules:{
			username:{
				required:true,
				minlength:2,
				maxlength:16
			},
			sex:{
				required:true,
			},
			mobile:{
				required:true,
				isMobile:true,
			},
			email:{
				required:true,
				email:true,
			},
			uploadfile:{
				required:true,
			}
		}
	});
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>