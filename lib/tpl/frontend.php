<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head><?php wp_head(); ?></head>
    <body <?php body_class('body-padding-top'); ?>>
		<header>
			<div id="sv_bb_sub_nav" class="container-fluid bg-black">
				<div class="container header-widget-bar text-white">
				<?php if (is_active_sidebar($this->get_module_name())){ ?>
					<div id="header_widgets" class="widget-area font-size-sm">
						<ul>
							<?php dynamic_sidebar($this->get_module_name()); ?>
						</ul>
					</div>
				<?php } ?>
				</div>
			</div>
			<div id="sv_bb_main_nav" class="container mega-container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 header-navigation-primary">
						<?php echo do_shortcode('[sv_navigation_primary inline="1"]'); ?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 header-navigation-logo" style="width:140px">
						<a href="<?php echo home_url(); ?>"><img src="<?php echo $GLOBALS['sv_100']->get_url('lib/modules/sv_common/lib/img/logo_mit_schrift.svg'); ?>" /></a>
					</div>
				</div>
			</div>
		</header>