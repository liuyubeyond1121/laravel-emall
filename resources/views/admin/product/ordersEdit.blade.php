<!DOCTYPE HTML>
<html>
<head>
@include('admin.public.meta')
<title>订单修改</title>
</head>
<body>
	<form method="post" action="" class="form form-horizontal" id="form-article-add">
		{{csrf_field()}}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>订单号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				{{--<input type="text" class="input-text" value="{{$_GET['code']}}" placeholder="" id="" name="">--}}
				<input type="hidden" class="input-text" value="{{$_GET['code']}}" placeholder="" id="" name="code">{{$_GET['code']}}
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">订单状态：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
					 <select class="form-control" name="status" >
						 @foreach($data as $v)
							 @if($v->id == $_GET['status'])
								 <option selected value="{{$v->id}}">{{$v->name}}</option>
							 @else
								 <option value="{{$v->id}}">{{$v->name}}</option>
							 @endif
						 @endforeach
					</select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<input  class="btn btn-primary radius" formtarget="_parent" type="submit" value="提交"/>
			</div>
		</div>
	</form>
</body>
</html>