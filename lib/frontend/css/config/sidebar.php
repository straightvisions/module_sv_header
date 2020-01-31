<?php
$has_sidebar				= ( $script->get_parent()->get_module( 'sv_sidebar' )
								&& ! empty( $script->get_parent()
												   ->get_module( 'sv_sidebar' )
												   ->load( array( 'id' => $script->get_parent()->get_module_name(), ) ) ) )
	? true : false;

if($has_sidebar) {
	?>
	/* Widgets */
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget a,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_archive li,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_categories li,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_meta li,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_recent_entries li,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_pages li,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_archive li a,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_categories li a,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_meta li a,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_recent_entries li a,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_pages li a,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul > li {
	color: rgba(<?php echo $text_color; ?>);
	}

	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget a:hover,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul.menu > li.menu-item-has-children:hover > a,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul.menu > li.menu-item-has-children:focus > a,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul.sub-menu > li:hover > a,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul.sub-menu > li:focus > a {
	color: rgba(<?php echo $highlight_color; ?>);
	}

	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_archive li,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_categories li,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_meta li,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_recent_entries li,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_pages li,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul.menu > li {
	color: rgba(<?php echo $text_color_sub; ?>);
	background-color: <?php echo $text_bg_active_sub ? 'rgba(' . $text_bg_color_sub . ')' : 'transparent'; ?>
	}

	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_archive li:hover,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_archive li:focus,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_categories li:hover,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_categories li:focus,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_meta li:hover,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_meta li:focus,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_recent_entries li:hover,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_recent_entries li:focus,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_pages li:hover,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_pages li:focus,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul.menu > li:hover,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul.menu > li:focus {
	background-color: <?php echo $text_bg_active_sub_hover ? 'rgba(' . $text_bg_color_sub_hover . ')' : 'transparent'; ?>;
	}

	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_archive li:hover > a,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_archive li:focus > a,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_categories li:hover > a,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_categories li:focus > a,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_meta li:hover > a,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_meta li:focus > a,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_recent_entries li:hover > a,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_recent_entries li:focus > a,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_pages li:hover > a,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_pages li:focus > a,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul.menu > li:hover > a,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul.menu > li:focus > a {
	color: rgba(<?php echo $text_color_sub_hover; ?>);
	}

	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_archive select,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_categories select,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_search input[type="search"],
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_search input::placeholder {
	color: rgba(<?php echo $text_color_sub; ?>);
	border-bottom-color: rgba(<?php echo $text_color_sub; ?>);
	}

	/* Sidebar - Alignment */
	<?php
	if (count($script->get_parent()->get_module('sv_sidebar')->get_sidebars($script->get_parent())) > 0) {
		foreach ($script->get_parent()->get_module('sv_sidebar')->get_sidebars($script->get_parent()) as $sidebar) {
			$value = $script->get_parent()->get_setting($sidebar['id'])->run_type()->get_data();

			switch ($value) {
				case 'left':
					$value = 'flex-start';
					break;
				case 'right':
					$value = 'flex-end';
					break;
			}

			echo '.' . $sidebar['id'] . '{';
			echo 'align-items: ' . $value . ';';
			echo '}';
		}
	}

}
?>