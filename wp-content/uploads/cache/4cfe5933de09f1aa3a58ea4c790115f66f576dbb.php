<?php $primary_navigation = getNavWithChilds('primary_navigation', 0); ?>

<header class="header" data-component="header">
	<div class="container header__container">
		<div class="d-none d-lg-block">
			<?php echo $__env->make('components.header-links', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
		<div class="row justify-content-between align-items-center">
			<div class="col-auto">
				<a class="header__logo fadeIn" href="<?= esc_url(home_url('/')); ?>"><img src="https://fakeimg.pl/300/" alt="LogoName" width="230" height="58" class="logo">LOGO</a>
			</div>
			<div class="col-auto">
				<button type="button" class="toggle-menu js-toggle-menu">
					<span class="toggle-menu__bar"></span>
				</button>
				<nav class="nav-primary">
					<div class="nav-primary__inner">
						<div class="menu-main-menu-container">

							<ul id="menu-main-menu" class="nav">
								</li>
								<?php foreach ($primary_navigation as $key => $value) : ?>
										<li id="menu-item-<?=$primary_navigation[$key]->ID ?>" class="menu-item menu-item-type-post_type menu-item-object-page page_item page-item-<?=$primary_navigation[$key]->object_id?> menu-item-48 <?=($primary_navigation[$key]->child_items)? " menu-item-has-children" : "" ?> <?=$primary_navigation[$key]->classes[0] ?>">
											<a href="<?=$primary_navigation[$key]->url ?>" aria-current="page">
												<?=$primary_navigation[$key]->title ?>
											</a>
										

										<?php if($primary_navigation[$key]->child_items): ?>
											<ul class="sub-menu">
												<div class="sub-menu-all">
													<span class="letter"><?=$primary_navigation[$key]->title[0] ?></span>
													<div class="link">
														<a href="<?=$primary_navigation[$key]->url ?>">
															
															<?php if($primary_navigation[$key]->title[0] == 'T'): ?>
																	<?= __('Voir toutes les') ?> 
															<?php else: ?>
																	<?= __('Voir tous les') ?> 
															<?php endif; ?>
															<?=$primary_navigation[$key]->title ?> 
																<span class="icon">
																	<?php echo $__env->make('svgs.icon-arrow', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
																</span>
															</a>
														
													</div>
												</div>
												<div class="list_submenu">
													<?php $child_items = $primary_navigation[$key]->child_items ;  ?>
													<?php foreach ($child_items as $key => $value) : ?>
															<li id="menu-item-<?=$child_items[$key]->ID ?>" class="menu-item menu-item-type-post_type menu-item-object-therapy menu-item-<?=$child_items[$key]->ID ?>">
																<a href="<?=$child_items[$key]->url ?>">
																	<?=$child_items[$key]->title ?>			
																</a>
															</li>
															

													<?php endforeach; ?>
												</div>
											</ul>
										<?php endif; ?>
										</li>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="d-lg-none">
							<?php echo $__env->make('components.header-links', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							<!-- <?php echo $__env->make('components.header-links-mobile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> -->
						</div>
					</div>					
			    </nav>
		    </div>
	    </div>
    </div>
</header>
