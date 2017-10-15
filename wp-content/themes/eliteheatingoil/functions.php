<?php

function register_main_menu() {
  register_nav_menu('main-menu',__( 'Main Menu' ));
}
add_action( 'init', 'register_main_menu' );

add_action('add_meta_boxes', 'yoast_is_toast', 99);
function yoast_is_toast(){
    //capability of 'manage_plugins' equals admin, therefore if NOT administrator
    //hide the meta box from all other roles on the following 'post_type' 
    //such as post, page, custom_post_type, etc
    remove_meta_box('wpseo_meta', 'post', 'normal');
    remove_meta_box('wpseo_meta', '', 'normal');
    remove_meta_box('wpseo_meta', 'oil_price', 'normal');
}