<?php
 /*
	Plugin Name: Simple Social Link Widget
	Plugin URI: http://zourbuth.com/simple-social-link-widget
	Description:  This widget is a imple social link widget that shows user profile link with icon. Full features social widget with 16 site supported. Just enter your link and have fun. 
	Version: 1.0
	Author: zourbuth
	Author URI: http://zourbuth.com
	License: Under GPL2
*/
 
/*  
	Copyright 2011 zourbuth (email : zourbuth@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* Launch the plugin. */
add_action( 'plugins_loaded', 'z_simple_social_link_widget_plugins_loaded' );

/* Initializes the plugin and it's features. */
function z_simple_social_link_widget_plugins_loaded() {

	/* Set constant path to the members plugin directory. */
	define( Z_SIMPLE_SOCIAL_LINK_WIDGET_DIR, plugin_dir_path( __FILE__ ) );

	/* Set constant path to the members plugin directory. */
	define( Z_SIMPLE_SOCIAL_LINK_WIDGET_URL, plugin_dir_url( __FILE__ ) );

	/* Loads and registers the new widgets. */
	add_action( 'widgets_init', 'zsocial_load_widgets' );
}

/* Register the extra widgets. Each widget is meant to replace or extend the current default  */
function zsocial_load_widgets() {

	/* Load widget file. */
	require_once( Z_SIMPLE_SOCIAL_LINK_WIDGET_DIR . 'z-simple-social-link.php' );

	/* Register widget. */
	register_widget( 'Z_Simple_Social_Link_Widget' );
}

?>