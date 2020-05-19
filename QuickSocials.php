<?php
/**
 * Plugin Name: QuickSocials
 * Plugin URI: https://www.racquick.com/
 * Description: Test WP Plugin.
 * Version: 1.0
 * Author: Jeroen Huiskes
 * Author URI: https://www.rac-software.nl
 **/

add_action('admin_menu', 'quicksocials_plugin_setup_menu');

function quicksocials_plugin_setup_menu()
{
    add_menu_page('Quick Socials Page', 'QuickSocials', 'manage_options', 'quicksocials-plugin', 'quicksocials_init');
}

function quicksocials_init()
{
    ?>
    <div>
        <h2>Fill Info:</h2>
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options'); ?>

            <input name="email_adress" type="text" id="email_adress" value="<?php echo get_option('email_adress'); ?>" />

            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="email_adress" />
            <p>
                <input type="submit" value="<?php _e('Save Email Addres') ?>" />
            </p>
        </form>
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options'); ?>

            <input name="email_subject" type="text" id="email_subject" value="<?php echo get_option('email_subject'); ?>" />

            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="email_subject" />
            <p>
                <input type="submit" value="<?php _e('Save Email Subject') ?>" />
            </p>
        </form>
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options'); ?>

            <input name="email_message" type="text" id="email_message" value="<?php echo get_option('email_message'); ?>" />

            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="email_message" />
            <p>
                <input type="submit" value="<?php _e('Save Email Message') ?>" />
            </p>
        </form>
    </div>
    <?php
}




function send_email_NP(){
    $socials = get_option('footer_word_data');
    $header = get_option('email_subject');
    $text = get_option('email_message');
    wp_mail($socials, $header, $text);


    return $post_id;
}

add_action( 'publish_post', 'send_email_NP');

