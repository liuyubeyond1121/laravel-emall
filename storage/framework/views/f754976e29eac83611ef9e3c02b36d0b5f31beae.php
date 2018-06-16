<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<title></title>
	<link href="<?php echo e(asset("css/header.css")); ?>" rel="Stylesheet">
	<link rel="stylesheet" href="<?php echo e(asset("css/footer.css")); ?>">
	<link href="<?php echo e(asset("css/studyarticle.css")); ?>" rel="stylesheet">
	<link href="<?php echo e(asset("css/bootstrap.css")); ?>" rel="stylesheet">
</head>
<body>
<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div id="studyarticle-wrapper">
	<ul class="studyarticle-container clear">	
		<?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<li class="gl-item">
			
			<div class="gl-i-wrap">
				<div class="p-img"><a href="<?php echo e(asset('home/study/studyarticle-details-' . $record->id)); ?>" target="_blank"><img <?php if($record->defaultImage): ?> src="<?php echo e(asset('emall/n7/'.$record->defaultImage->imagePath)); ?>" <?php else: ?> src="<?php echo e(asset('emall/notImage.png')); ?>" <?php endif; ?> alt=""></a></div>
				<div class="p-price"><span>￥</span><i><?php echo e($record->salePrice); ?></i></div>
				<div class="p-name"><a href="<?php echo e(asset('home/study/studyarticle-details-' . $record->id)); ?>" target="_blank"><?php echo e($record->name); ?></a></div>
			</div>
		</li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
	</ul>
	<div class="pagination" style="clear: both"><?php echo e($records->links()); ?></div>
</div>
<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>