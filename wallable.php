<?php
/*
Plugin Name: wallable
Plugin URI: http://www.wordpress.org
Description: wallable - Wall social page
Version: 1.1 
Author: VTGroup
Author URI: http://www.vt-group.vn
License: Under Copy Rigth Licence
*/ 
/**
 * Backend requests
 */
if (is_admin()){
}
/**
 * Front-end requests
 */
else
{
}
/**
 * Both loading
 */
add_action('widgets_init', array(&$wallable_controller, 'load_languages'));
?>