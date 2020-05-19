<?php
/**
 * Plugin Name: QuickSocials
 * Plugin URI: https://www.racquick.com/
 * Description: Test WP Plugin.
 * Version: 1.0
 * Author: Jeroen Huiskes
 * Author URI: https://www.rac-software.nl
 **/
$text = 'Test';
add_action('admin_menu', 'quicksocials_plugin_setup_menu');

function quicksocials_plugin_setup_menu()
{
    add_menu_page('Quick Socials Page', 'QuickSocials', 'manage_options', 'quicksocials-plugin', 'quicksocials_init');
}

function quicksocials_init()
{
    ?>
    <div>
        <h2>footer_word Options</h2>
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options'); ?>
            <table width="510">
                <tr valign="top">
                    <th width="92" scope="row">Enter Email</th>
                    <td width="406">
                        <input name="footer_word_data" type="text" id="footer_word_data" value="<?php echo get_option('footer_word_data'); ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th width="92" scope="row">Enter Subject</th>
                    <td width="406">
                        <input name="email_subject" type="text" id="email_subject" value="<?php echo get_option('email_subject'); ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th width="92" scope="row">Enter Message</th>
                    <td width="406">
                        <input name="email_message" type="text" id="email_message" value="<?php echo get_option('email_message'); ?>" />
                    </td>
                </tr>
            </table>
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="footer_word_data" />
            <p>
                <input type="submit" value="<?php _e('Save Changes') ?>" />
            </p>
        </form>
    </div>
    <?php
}

function change_footer_admin() {
    echo get_option('footer_word_data');
}

add_filter('admin_footer_text', 'change_footer_admin');



function send_email_NP(){
     $socials = get_option('footer_word_data');
     $header = get_option('email_subject');
     $text = get_option('email_message');
    wp_mail($socials, $header, $text);

   return $post_id;
}
 add_action( 'publish_post', 'send_email_NP');

