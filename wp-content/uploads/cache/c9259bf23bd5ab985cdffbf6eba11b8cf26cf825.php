<footer class="footer" data-component="footer">
	<div class="container">
		<div class="row">
			
			Footer Container 

			<nav class="site-nav">
				<?php
					$footer_menu_defaults = array(
						'theme_location'  => '',
						'menu'            => 'Footer Menu',
						'container'       => '',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => '',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'         => ''
					);
					wp_nav_menu( $footer_menu_defaults );
				?>
			</nav>

			<p><?php bloginfo('name'); ?> - &copy; <?php echo date('Y'); ?></p>


		</div>
	</div>
</footer>
