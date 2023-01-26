<?php
/*
Plugin Name: Link Social Media
Plugin URI: #
Description: A brief description of the Plugin.
Version: 1.0
Author: Your name
Author URI: http://example.com
License: GPL2?
*/


//enque scripts 
function social_hook_plugin_enqueue_styles() {
	
	wp_register_style( 'social_css', plugins_url( '/assets/css/style.css', __FILE__ ) );
	wp_enqueue_style( 'social_css' );
	
}
add_action( 'wp_enqueue_scripts', 'social_hook_plugin_enqueue_styles' );



function tutsplus_link_social_media($atts,$content = null) { 
	$atts = shortcode_atts( array(
		'text for facebook' => 'this is facebook link',				//these are default values if user dont enter anything this will display.
		'facebook' => '#',
        'text for twitter' => 'this is twitter link',
        'twitter' => '#'
	), $atts, '[social]' );
	ob_start();
	?>
	
	<div class="shortcode_social">
		<?php echo '<a href="' .$atts['facebook']. '">'.$atts['text for facebook'].'</a>' ?>
	</div>
    <div class="shortcode_social">
		<?php echo '<a href="' .$atts['twitter']. '">'.$atts['text for twitter'].'</a>' ?>
	</div>
	
	<?php 
	return ob_get_clean();
		
}
add_shortcode( 'social', 'tutsplus_link_social_media' );
