<!DOCTYPE HTML>
<html>
<head>
<?php echo $__env->make('admin.public.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<title>订单修改</title>
</head>
<body>
	<form method="post" action="" class="form form-horizontal" id="form-article-add">
		<?php echo e(csrf_field()); ?>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>订单号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				
				<input type="hidden" class="input-text" value="<?php echo e($_GET['code']); ?>" placeholder="" id="" name="code"><?php echo e($_GET['code']); ?>

			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">订单状态：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
					 <select class="form-control" name="status" >
						 <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							 <?php if($v->id == $_GET['status']): ?>
								 <option selected value="<?php echo e($v->id); ?>"><?php echo e($v->name); ?></option>
							 <?php else: ?>
								 <option value="<?php echo e($v->id); ?>"><?php echo e($v->name); ?></option>
							 <?php endif; ?>
						 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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