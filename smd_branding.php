<?php
/*
Plugin Name: Sean Michael Design
Plugin URI: http://www.seanmichael.me
Description: Personal Admin customization for Sean Michael Design
Version: 1.0
Author: Sean Michael
Author URI: http://www.seanmichael.me
License: SMD1
*/


//----------------------------------------------- Backend Customization 

// Custom WordPress Login Logo

function login_css() {
    wp_enqueue_style( 'login_css', plugins_url ('css/login.css', __FILE__), false, SMD);
}

add_action('login_head', 'login_css');

function my_custom_login_url() {
  return "http://www.seanmichael.me";
}
add_filter( 'login_headerurl', 'my_custom_login_url', 10, 4 );

// Custom WordPress Footer

function remove_footer_admin () {
    echo '&copy; 2012 - <a href="http://www.seanmichael.me">Sean Michael Design</a>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

// Add a widget in WordPress Dashboard
function wpc_dashboard_widget_function() {
	
	echo "<ul>
	<li>Cell: 518-859-2981</li>
	<li>Email: seankmichael@gmail.com</li>
	<li>Website: <a href='http://www.wordpress.org'>Sean Michael Design</a></li>
	<li>Online Support: <a href='http://wordpress.org/support/'>WordPress Documentation</a></li>
	</ul>";
}
function wpc_add_dashboard_widgets() {
	wp_add_dashboard_widget('wp_dashboard_widget', 'Support For Your Website', 'wpc_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'wpc_add_dashboard_widgets' );

//Remove Widgets From Dashboard
function wpc_dashboard_widgets() {
	global $wp_meta_boxes;
	// Today widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	// Incoming links
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	// Plugins
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	// Welcome
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}
add_action('wp_dashboard_setup', 'wpc_dashboard_widgets');
