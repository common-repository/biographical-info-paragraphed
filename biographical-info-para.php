<?php
/*
Plugin Name: Biographical Info Paragraphed
Plugin URI: http://devkamrul.com/biographical-info-paragraphed/
Description: Enables some html tags like p, br, rel="author" etc. in your Wordpress author profiles Biographical Info.
Author: Kamrul Hasan
Version: 1.1
Author URI: http://devkamrul.com/
*/

// ##### ---------- NOTHING USER-CONFIGURABLE AFTER HERE ------------

//disable WordPress sanitization to allow more than just $allowedtags from /wp-includes/kses.php
remove_filter('pre_user_description', 'wp_filter_kses');
//add a little flexible sanitization.
add_filter( 'pre_user_description', 'wp_filter_profiledesc_kses');

$allowedtagsforuserdes = array(
		'a' => array(
			'href' => true,
			'title' => true,
			'rel' => true,
			'target' => true,
		),
		'abbr' => array(
			'title' => true,
		),
		'acronym' => array(
			'title' => true,
		),
		'b' => array(),
		'blockquote' => array(
			'cite' => true,
		),
		'br' => array (
			'class' => true,
		),
		'p' => array(
			'class' => true,
			'align' => true,
			'dir' => true,
			'style' => true,
		),
		'cite' => array(),
		'code' => array(),
		'del' => array(
			'datetime' => true,
		),
		//	'dd' => array(),
		//	'dl' => array(),
		//	'dt' => array(),
		'em' => array (), 'i' => array (),
		//	'ins' => array('datetime' => array(), 'cite' => array()),
		//	'li' => array(),
		//	'ol' => array(),
		//	'p' => array(),
		'q' => array(
			'cite' => true,
		),
		'strike' => array(),
		'strong' => array(),
		//	'sub' => array(),
		//	'sup' => array(),
		//	'u' => array(),
		//	'ul' => array(),
	);

/**
 * Sanitize content for allowed HTML tags for profile description.
 *
 * 
 * @uses $allowedtagsforuserdes
 *
 * @param string $data Post content to filter, expected to be escaped with slashes
 * @return string Filtered post content with allowed HTML tags and attributes intact.
 */
function wp_filter_profiledesc_kses($data) {
	global $allowedtagsforuserdes;
	return addslashes ( wp_kses(stripslashes( $data ), $allowedtagsforuserdes) );
}

?>
