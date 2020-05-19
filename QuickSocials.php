<?php
/**
 * Plugin Name: QuickSocials
 * Plugin URI: https://www.racquick.com/
 * Description: Test WP Plugin.
 * Version: 1.0
 * Author: Jeroen Huiskes
 * Author URI: https://www.rac-software.nl
 **/

//Simple plugin wich send an email to named emails
 function test_socials(){
     $socials = 'jeoma@rac-software.nl';
     wp_mail($socials, 'Test', 'Beste Lezer, ik heb een nieuwe post gemaakt voor je op: https://racquick.com/');

     return $post_id;
 }
 add_action( 'publish_post', 'test_socials');

 //Plugin
