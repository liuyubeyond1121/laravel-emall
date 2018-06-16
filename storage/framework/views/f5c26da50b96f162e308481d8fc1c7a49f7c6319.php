<!DOCTYPE HTML>
<html>
<head>
<?php echo $__env->make('admin.public.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<title>添加产品分类</title>
</head>
<body>
<div class="page-container">
	<form action="<?php echo e(asset('admin/category')); ?>" method="post" class="form form-horizontal" id="form-user-add">
		<?php echo e(csrf_field()); ?>

		<input type="hidden" name="parentId" value="<?php echo $_GET['parentId']??0 ; ?>">
		<input type="hidden" name="parentIdPath" value="<?php  echo $_GET['parentIdPath']??0  ?>">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类名称：</label>
			<div class="formControls col-xs-6 col-sm-6">
				<input type="text" class="input-text" value="" placeholder="" id="name" name="name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>排序：</label>
			<div class="formControls col-xs-6 col-sm-6">
				<input type="text" class="input-text" value="" placeholder="排序，0到255" id="sort" name="sort">
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
<script type="text/javascript" src="<?php echo e(asset("admin/lib/jquery.validation/1.14.0/jquery.validate.js")); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset("admin/lib/jquery.validation/1.14.0/validate-methods.js")); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset("admin/lib/jquery.validation/1.14.0/messages_zh.js")); ?>"></script>
<script type="text/javascript">
$(function(){
	
});
</script>
</body>
</html>