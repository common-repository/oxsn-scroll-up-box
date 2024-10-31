<?php


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


/*
Plugin Name: OXSN Scroll Up Box
Plugin URI: https://wordpress.org/plugins/oxsn-scroll-up-box/
Description: This plugin adds helpful scroll up box code!
Author: oxsn
Author URI: https://oxsn.com/
Version: 0.0.4
*/


define( 'oxsn_scroll_up_box_plugin_basename', plugin_basename( __FILE__ ) );
define( 'oxsn_scroll_up_box_plugin_dir_path', plugin_dir_path( __FILE__ ) );
define( 'oxsn_scroll_up_box_plugin_dir_url', plugin_dir_url( __FILE__ ) );

if ( ! function_exists ( 'oxsn_scroll_up_box_settings_link' ) ) {

	add_filter( 'plugin_action_links', 'oxsn_scroll_up_box_settings_link', 10, 2 );
	function oxsn_scroll_up_box_settings_link( $links, $file ) {

		if ( $file != oxsn_scroll_up_box_plugin_basename )
		return $links;
		$settings_page = '<a href="' . menu_page_url( 'oxsn-scroll-up-box', false ) . '">' . esc_html( __( 'Settings', 'oxsn-scroll-up-box' ) ) . '</a>';
		array_unshift( $links, $settings_page );
		return $links;

	}

}


?><?php


/* OXSN Dashboard Tab */

if ( !function_exists('oxsn_dashboard_tab_nav_item') ) {

	add_action('admin_menu', 'oxsn_dashboard_tab_nav_item');
	function oxsn_dashboard_tab_nav_item() {

		add_menu_page('OXSN', 'OXSN', 'manage_options', 'oxsn-dashboard', 'oxsn_dashboard_tab' );

	}

}

if ( !function_exists('oxsn_dashboard_tab') ) {

	function oxsn_dashboard_tab() {

		if (!current_user_can('manage_options')) {

			wp_die( __('You do not have sufficient permissions to access this page.') );

		}

	?>

		<?php if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y') : ?>

			<div id="message" class="updated">

				<p><strong><?php _e('Settings saved.') ?></strong></p>

			</div>

		<?php endif; ?>
		
		<div class="wrap">
		
			<h2>OXSN / Digital Agency</h2>

			<div id="poststuff">

				<div id="post-body" class="metabox-holder columns-2">

					<div id="post-body-content" style="position: relative;">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Information</h3>

							<div class="inside">

								<p></p>

							</div>
							
						</div>

					</div>

					<div id="postbox-container-1" class="postbox-container">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Coming Soon</h3>

							<div class="inside">

								<p></p>

							</div>
							
						</div>

					</div>

				</div>

			</div>

		</div>

	<?php 

	}

}


?><?php


/* OXSN Plugin Tab */

if ( ! function_exists ( 'oxsn_scroll_up_box_plugin_tab_nav_item' ) ) {

	add_action('admin_menu', 'oxsn_scroll_up_box_plugin_tab_nav_item', 99);
	function oxsn_scroll_up_box_plugin_tab_nav_item() {

		add_submenu_page('oxsn-dashboard', 'OXSN Scroll Up Box', 'Scroll Up Box', 'manage_options', 'oxsn-scroll-up-box', 'oxsn_scroll_up_box_plugin_tab');

	}

}

if ( !function_exists('oxsn_scroll_up_box_plugin_tab') ) {

	function oxsn_scroll_up_box_plugin_tab() {

		if (!current_user_can('manage_options')) {

			wp_die( __('You do not have sufficient permissions to access this page.') );

		}

	?>

		<?php if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y') : ?>

			<div id="message" class="updated">

				<p><strong><?php _e('Settings saved.') ?></strong></p>

			</div>

		<?php endif; ?>
		
		<div class="wrap oxsn_settings_page">
		
			<h2>OXSN / Scroll Up Box Plugin</h2>

			<div id="poststuff">

				<div id="post-body" class="metabox-holder columns-2">

					<div id="post-body-content" style="position: relative;">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Information</h3>

							<div class="inside">

								<p>Coming soon.</p>

							</div>
							
						</div>

					</div>

					<div id="postbox-container-1" class="postbox-container">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Custom Project</h3>

							<div class="inside">

								<p>Want us to build you a custom project?</p>

								<p><a href="mailto:brief@oxsn.com?Subject=Custom%20Project%20Request%21&Body=Please%20answer%20the%20following%20questions%20to%20help%20us%20better%20understand%20your%20needs..%0A%0A1.%20What%20is%20the%20name%20of%20your%20company%3F%0A%0A2.%20What%20are%20the%20concepts%20and%20goals%20of%20your%20project%3F%0A%0A3.%20What%20is%20the%20proposed%20budget%20of%20this%20project%3F" class="button button-primary button-large">Email Us</a></p>

							</div>
							
						</div>

						<div class="postbox">

							<h3 class="hndle cursor_initial">Support</h3>

							<div class="inside">

								<p>Need help with this plugin? Visit the Wordpress plugin page for support..</p>

								<p><a href="https://wordpress.org/support/plugin/oxsn-scroll-up-box" target="_blank" class="button button-primary button-large">Support</a></p>

							</div>
							
						</div>

					</div>

				</div>

			</div>

		</div>

	<?php 

	}

}


?><?php


/* OXSN Include CSS */

if ( ! function_exists ( 'oxsn_scroll_up_box_inc_css' ) ) {

	add_action( 'wp_enqueue_scripts', 'oxsn_scroll_up_box_inc_css' );
	function oxsn_scroll_up_box_inc_css() {

		wp_enqueue_style( 'oxsn_scroll_up_box_css', oxsn_scroll_up_box_plugin_dir_url . 'inc/css/scroll-up-box.css', array(), '1.0.0', 'all' ); 

	}

}


?><?php


/* OXSN Include JS */

if ( ! function_exists ( 'oxsn_scroll_up_box_inc_js' ) ) {

	add_action( 'wp_enqueue_scripts', 'oxsn_scroll_up_box_inc_js' );
	function oxsn_scroll_up_box_inc_js() {

		wp_enqueue_script( 'oxsn_scroll_up_box_js', oxsn_scroll_up_box_plugin_dir_url . 'inc/js/scroll-up-box.js', array(), '1.0.0', 'all' );

	}

}


?><?php


/* OXSN Customizer */

if ( ! function_exists ( 'oxsn_scroll_up_box_customizer' ) ) {

	add_action( 'customize_register', 'oxsn_scroll_up_box_customizer' );
	function oxsn_scroll_up_box_customizer( $wp_customize ) {
	   
	   $wp_customize->add_panel( 'oxsn_plugin_panel', array(
			'priority'       => '',
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => 'OXSN Plugins',
			'description'    => '',
		) );

	   		// scroll_up_box

		   $wp_customize->add_section( 'oxsn_scroll_up_box_section' , array(
				'priority'       => '',
				'capability'     => 'edit_theme_options',
				'theme_supports' => '',
				'title'          => 'Scroll Up Box',
				'description'    => '',
				'panel'  => 'oxsn_plugin_panel',
			) );

				// scroll_up_box_icon

				$scroll_up_box_icon = '⇡';
				$wp_customize->add_setting( 'oxsn_scroll_up_box_icon_control', array(
					'type' => 'option',
					'default' => $scroll_up_box_icon,
				) );

				$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'oxsn_scroll_up_box_icon_control', array(
					'type'     => '',
					'priority' => '',
					'section'  => 'oxsn_scroll_up_box_section',
					'label'    => 'Icon',
				) ) );

	}

}


?><?php


/* OXSN Include in Footer */

if ( ! function_exists ( 'oxsn_scroll_up_box_footer_inc' ) ) {

	add_action( 'wp_footer', 'oxsn_scroll_up_box_footer_inc');
	function oxsn_scroll_up_box_footer_inc() { 

		if (get_option('oxsn_scroll_up_box_icon_control') != '') :
			$scroll_up_box_icon = get_option( 'oxsn_scroll_up_box_icon_control' );
		else :
			$scroll_up_box_icon = '⇡';
		endif;

		echo '<div class="oxsn_scroll_up_box">' . $scroll_up_box_icon . '</div>';

	}

}


?>