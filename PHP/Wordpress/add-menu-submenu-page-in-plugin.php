<?php

class Menu_page{
	function __construct(){
		add_action('admin_menu', array($this, 'plugin_menu_page'));
	}

	function plugin_menu_page(){
		//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
		//function name cane be 'myplugin/plugin-admin-page.php' in which case the page display code should
		//be at myplugin/myplugin-admin-page.php file
		add_menu_page('Custom Page Title', 'Custom Menu Title', 'activate_plugins', 'custom-menu-slug', array($this, 'function_that_will_be_used'), plugin_url('myplugin/images/icon.png'), 6  );
		//add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
		add_submenu_page('custom-menu-slug', 'Custom Submenu Page title', 'Custom Sub Menu Title', 'activate_plugins', 'custom-submenu-slug-or-same-as-parent', array($this, 'function_for_submenu') );
	}

	function function_that_will_be_used(){
		?>
			<div class="wrap">
				<h3><?php _e('Text to be displayed', 'plugin-textdomain'); ?></h3>
			</div>
		<?php
	}

	function function_for_submenu(){
		echo "My custom Sub Menu page";
	}
}