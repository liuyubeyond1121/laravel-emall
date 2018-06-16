<!DOCTYPE HTML>
<html>
<head>
@include('admin.public.meta')
<title>轮播图编辑</title>
<link href="{{asset("admin/lib/webuploader/0.1.5/webuploader.css")}}" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="page-container">
	<form class="form form-horizontal" id="form-article-add" method="post" action="{{asset('admin/slider').'/'.$data->id}}">
		{{csrf_field()}}
		{{method_field('put')}}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">排序值：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$data->orders}}" placeholder="值越大越靠前" id="" name="orders">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">友情链接：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$data->href}}" placeholder="" id="" name="href">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">轮播图摘要：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="title" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100"  onKeyUp="$.Huitextarealength(this,200)">{{$data->title}}</textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
			</div>
		</div>
		{{--<input type="hidden" name="image" value="{{$data->image}}"/>--}}
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				{{--<button onClick="article_save_submit();" class="btn btn-primary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</button>--}}
				<input class="btn btn-primary radius" type="submit" value="保存并提交审核">
				<button onClick="article_save();" class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存草稿</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</div>
</body>
</html>