<!doctype html>
<html <?php (language_attributes()); ?>>
    <?php echo $__env->make('core.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <body <?php (body_class()); ?>>
    <?php (do_action('get_header')); ?>
    <?php echo $__env->make('components.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="wrap" role="document">
            <div class="content">
                <main class="main">
                <?php echo $__env->yieldContent('content'); ?>
                </main>
            </div>
        </div>
    <?php (do_action('get_footer')); ?>
    <?php echo $__env->make('components.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php (wp_footer()); ?>
    <?php echo $__env->yieldContent('after_scripts'); ?>
    </body>
</html>
