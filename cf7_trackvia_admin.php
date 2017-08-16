<?php
/**
 * @author Stephanie Land
 * @license http://www.gnu.org/licenses/agpl-3.0.html
 */

class cf7_trackvia_admin {
    const NONCE = 'cf7_trackvia_admin';


    protected static $initiated = false;

    public static function init() {
        if (!self::$initiated) {
            self::$initiated = true;
            add_action( 'admin_menu', array( 'cf7_trackvia_admin', 'admin_menu' ) );
            //add_action( 'admin_enqueue_scripts', array('cf7_trackvia_admin', 'admin_enqueue_scripts') );
           // add_action( 'wpcf7_save_contact_form', array('cf7_trackvia_admin', 'save_contact_form'));
           // add_filter( 'wpcf7_editor_panels', array('cf7_trackvia_admin', 'panels'));
        }
    }

    public static function admin_menu() {
        add_options_page( __('trackvia Settings', 'contact-form-7-trackvia-integration'), __('trackvia Settings', 'contact-form-7-trackvia-integration'), 'manage_options', 'cf7_trackvia_admin', array( 'cf7_trackvia_admin', 'display_page' ) );
    }

    public static function get_page_url( $page = 'config' ) {

        $args = array( 'page' => 'cf7_trackvia_admin' );
        $url = add_query_arg( $args, admin_url( 'options-general.php' ) );

        return $url;
    }

    public static function display_page() {
        $user_name = cf7_trackvia_settings::getUserName();
        $user_password = cf7_trackvia_settings::getUserPassword();
        $trackvia_view_id = cf7_trackvia_settings::getTrackviaViewID();
        $user_key = cf7_trackvia_settings::getUserKey();
        $contact_form_id = cf7_trackvia_settings::getContactFormID();

        if (isset($_POST['user_name'])) {
            cf7_trackvia_settings::setUserName($_POST['user_name']);
        }
        if (isset($_POST['user_password'])) {
            cf7_trackvia_settings::setUserPassword($_POST['user_password']);
        }

        if (isset($_POST['trackvia_view_id'])) {
            cf7_trackvia_settings::setTrackviaViewID($_POST['trackvia_view_id']);
        }
        if (isset($_POST['user_key'])) {
            cf7_trackvia_settings::setUserKey($_POST['user_key']);
        }
        if (isset($_POST['contact_form_id'])) {
            cf7_trackvia_settings::setContactFormID($_POST['contact_form_id']);
        }

        cf7_trackvia_admin::view( 'settings', compact(  'user_name', 'user_password', 'trackvia_view_id', 'user_key', 'contact_form_id') );
    }

    public static function view( $name, array $args = array() ) {
        $args = apply_filters( 'cf7_trackvia_view_arguments', $args, $name );

        foreach ( $args AS $key => $val ) {
            $$key = $val;
        }

        load_plugin_textdomain( 'contact-form-7-trackvia-integration' );

        $file = CF7_TRACKVIA__PLUGIN_DIR . 'views/'. $name . '.php';

        include( $file );
    }

    /**
     * Add a TrackVia setting panel to the contact form admin section.
     *
     * @param array $panels
     * @return array
     */

    /*
    public static function panels($panels) {
        $panels['contact-form-7-trackvia-integration'] = array(
            'title' => __( 'TrackVia', 'contact-form-7-trackvia-integration' ),
            'callback' => array('cf7_trackvia_admin', 'trackvia_panel'),
        ) ;
        return $panels;
    }

    public static function trackvia_panel($post) {
        $trackvia = $post->prop('trackvia' );
        cf7_trackvia_admin::view('trackvia_panel', array('post' => $post, 'trackvia' => $trackvia));
    }

    public static function save_contact_form($contact_form) {
        $properties = $contact_form->get_properties();
        $trackvia = $properties['trackvia'];

        $trackvia['enable'] = true;



        if ( isset( $_POST['trackvia-entity'] ) ) {
            $trackvia['entity'] = trim( $_POST['trackvia-entity'] );
        }


        $properties['trackvia'] = $trackvia;
        $contact_form->set_properties($properties);
    }

    public static function admin_enqueue_scripts($hook_suffix) {
        if ( false === strpos( $hook_suffix, 'wpcf7' ) ) {
            return;
        }

        wp_enqueue_script( 'cf7_trackvia-admin',
            CF7_TRACKVIA__PLUGIN_URL. 'js/admin.js',
            array( 'jquery', 'jquery-ui-tabs' )
        );
    }
*/

}