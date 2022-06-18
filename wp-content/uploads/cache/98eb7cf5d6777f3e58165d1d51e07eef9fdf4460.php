<?php $__env->startSection('content'); ?>
    <?php if(!have_posts()): ?>
        <div class="alert alert-warning">
          <?php echo e(__('Sorry, no results were found.', 'sage')); ?>

        </div>
        <?php echo get_search_form(false); ?>

    <?php endif; ?>
		
	
		<?php if(is_home()): ?>
			<?php echo $__env->make('pages.content-posts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php else: ?>
	    <?php while(have_posts()): ?> <?php (the_post()); ?>
	        <?php echo $__env->make('pages.content-page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	    <?php endwhile; ?>
	  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>