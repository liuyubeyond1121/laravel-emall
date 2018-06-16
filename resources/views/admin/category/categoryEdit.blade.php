<!DOCTYPE HTML>
<html>
<head>
@include('admin.public.meta')
<script src="{{asset('admin/my/myLiandong.js')}}"></script>
<title>编辑产品分类</title>
</head>
<body>
<div class="page-container">
	<form action="{{url('admin/category').'/'.$data->id}}" method="post" class="form form-horizontal" id="form-user-add">
		{{csrf_field()}}
        {{method_field('put')}}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类名称：</label>
			<div class="formControls col-xs-6 col-sm-6">
				<input type="text" class="input-text" value="{{$data->name}}" placeholder="" id="name" name="name">
			</div>
		</div>
		<div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>排序：</label>
            <div class="formControls col-xs-6 col-sm-6">
                <input type="text" class="input-text" value="{{$data->sort}}" placeholder="排序，0到255" id="sort" name="sort">
            </div>
        </div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">商品分类：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
					 一级分类：<select id="one" name="one"></select>
					 二级分类：<select id="two" name="two"></select>
    				 三级分类：<select id="three" name="three"></select>
					{{--<input id="address" name="addr" type="hidden" value="" />--}}
					<script type="text/javascript">
							addressInit({!! $subtree !!},'one', 'two', 'three');
					</script>
				</span>
			</div>
		</div>
		<div class="row cl">
			<div class="col-9 col-offset-2">
				<input class="btn btn-primary radius" formtarget="_parent" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</div>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset("admin/lib/jquery.validation/1.14.0/jquery.validate.js")}}"></script>
<script type="text/javascript" src="{{asset("admin/lib/jquery.validation/1.14.0/validate-methods.js")}}"></script>
<script type="text/javascript" src="{{asset("admin/lib/jquery.validation/1.14.0/messages_zh.js")}}"></script>

</body>
</html>