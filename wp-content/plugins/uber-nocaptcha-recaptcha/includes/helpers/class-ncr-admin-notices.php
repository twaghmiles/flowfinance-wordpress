<?php
/**
 * The class that handles the display of admin notices in the WordPress back-end.
 */


/**
 * Function that loads the class responsible for generating the display of the
 * admin notices on the back-end.
 *
 * Gets called only if the reCaptcha site / secret key fields are empty
 *
 * @since   1.0.0
 *
 */
function construct_uncr_admin_notices(){

    $plugin_option = get_option('uncr_settings');

    if( $plugin_option['public_key_text'] === '' || $plugin_option['private_key_text'] === '' ) { // check if site / secret key have values in them

            // instantiate the class & load everything else
            new NCR_admin_notices();
    }
}

add_action('init', 'construct_uncr_admin_notices');

class NCR_admin_notices {

    /**
     * Initialize the class and set its properties.
     */
        public function __construct() {

            add_action('admin_notices', array( $this, 'uncr_admin_notice') );
        }

    /**
     * Function that handles the display of the admin notice
     *
     * @since   1.0.0
     */
        public function uncr_admin_notice() {
            global $current_user ;
            global $pagenow;

            // check to see if it's a custom menu page and if it is, don't show the nagging message :)
            if($pagenow !== 'admin.php') {
   

                echo '<div class="notice updated is-dismissible"><p>';
                echo __('Site / Secrete key for Uber reCaptcha haven\'t yet been completed. Please go <a href="admin.php?page=uber-ncr-settings">here</a> and enter them so the plugin can function.', 'uncr_translate');
                echo "</p></div>";
                
            }
        }

}

