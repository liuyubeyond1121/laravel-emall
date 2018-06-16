<!DOCTYPE HTML>
<html>
<head>
@include('admin.public.meta')
	<script type="text/javascript" src="{{asset("admin/my/geo.js")}}"></script>
<title>添加用户 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body onload="setup();preselect('湖北省');">
<article class="page-container">
	<form action="{{asset('admin/user')}}" enctype="multipart/form-data" method="post" class="form form-horizontal" id="form-member-add">
		{{csrf_field()}}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"  placeholder="" id="username" name="username">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>昵称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"  placeholder="" id="nick" name="nick">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text"  placeholder="" id="password" name="password">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text"  placeholder="" id="repassword" name="password_confirmation">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="radio-box">
					<input  type="radio" value="1" id="sex-1" name="sex" checked>
					<label for="sex-1">男</label>
				</div>
				<div class="radio-box">
					<input type="radio" value="2" id="sex-2" name="sex">
					<label for="sex-2">女</label>
				</div>
				<div class="radio-box">
					<input type="radio" value="3" id="sex-3" name="sex">
					<label for="sex-3">保密</label>
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="" id="mobile" name="phone">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="@" name="email" id="email">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">添加图片：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="btn-upload form-group">
			<input class="input-text upload-url" type="text"  id="uploadfile" readonly nullmsg="请添加附件！" style="width:200px">
			<a href="javascript:void(0);" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
					<!--<input type="file" multiple name="file-2" class="input-file">-->
			<input type="file" name="image" class="input-file"></span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">所在城市：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
					<select name="province" id="s1"> <option></option></select>
					<select name="city" id="s2"> <option></option>  </select>
					<select name="town" id="s3"> <option></option>  </select>
					<input id="address" name="addr" type="hidden" value="" />
					<!--<input onclick="promptinfo();alert(document.getElementById('address').value); return false;" type="submit" value="提交" />-->
					<script charset="UTF-8" type="text/javascript">
						//这个函数是必须的，因为在geo.js里每次更改地址时会调用此函数
						function promptinfo(){
							var address = document.getElementById('address');
							var s1 = document.getElementById('s1');
							var s2 = document.getElementById('s2');
							var s3 = document.getElementById('s3');
							address.value = s1.value + s2.value + s3.value;
						}
					</script>
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">个性签名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="signature" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" onKeyUp="$.Huitextarealength(this,100)"></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
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
			},
            password:{
                required:true,
            },
            password_confirmation:{
                required:true,
                equalTo: "#password"
            },
			
		},
//		onkeyup:false,
//		focusCleanup:true,
//		success:"valid",
//		submitHandler:function(form){
//			//$(form).ajaxSubmit();
//			var index = parent.layer.getFrameIndex(window.name);
//			//parent.$('.btn-refresh').click();
//			parent.layer.close(index);
//		}
	});
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>