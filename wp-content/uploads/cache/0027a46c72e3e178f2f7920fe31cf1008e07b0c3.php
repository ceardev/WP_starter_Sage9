<?php $__env->startSection('content'); ?>
 	<?php while(have_posts()): ?> <?php (the_post()); ?>
 		<?php 
 			$fields = get_fields();
		 ?>




		<?php echo $__env->make('modules.demo_module', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


		<?php echo $__env->make('modules.demo_module', ['data' => 'firstDATA'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


		


 		
	<?php endwhile; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>