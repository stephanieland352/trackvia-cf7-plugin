<?php
/**
 * @author Stephanie Land
 * @license http://www.gnu.org/licenses/agpl-3.0.html
 */

/*
Plugin Name: Contact Form 7 TrackVia integration
Plugin URI: https://royalshell.com
Description: Submit contact form 7 to an external TrackVia
Version: 1.0.0
Author: Stephanie Land
Author URI: https://royalshell.com
Text Domain: ccontact-form-7-trackvia-integration
*/

define( 'CF7_TRACKVIA__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'CF7_TRACKVIA__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( CF7_TRACKVIA__PLUGIN_DIR . 'cf7_trackvia_settings.php' );
require_once( CF7_TRACKVIA__PLUGIN_DIR . '/lib/Api.php' );
use Trackvia\Api;

if ( is_admin() ) {
    require_once( CF7_TRACKVIA__PLUGIN_DIR . 'cf7_trackvia_admin.php' );
    add_action( 'init', array( 'cf7_trackvia_admin', 'init' ) );
}

// add_filter( 'wpcf7_contact_form_properties', 'contact_form_properties');
add_action('wpcf7_before_send_mail', 'cf7_trackvia_before_send_mail');

define("BASE_URL",'https://go.trackvia.com/'); //don't forget that trailing slash
define("USER", cf7_trackvia_settings::getUserName());
define("PASS", cf7_trackvia_settings::getUserPassword());
define("USER_KEY", cf7_trackvia_settings::getUserKey());

function cf7_trackvia_before_send_mail($contact_form) {
    $formid = cf7_trackvia_settings::getContactFormID(); // id of the contact form we want to track
    $contactid = $contact_form->id();

    if ($formid == $contactid) {

    $viewid = cf7_trackvia_settings::getTrackviaViewID(); // id of the rsrs referral form on trackvia
    $username = USER;
    $userpassword = PASS;
    $apikey = USER_KEY;

    $api = new Api(USER, PASS, USER_KEY);

    $submission = WPCF7_Submission::get_instance();
    $submittedData = $submission->get_posted_data();
    $data = array();
    foreach($submittedData as $key => $val) {
        if (strpos($key, '_wpcf7') === false){
            if (is_array($val) ) {
                $val = implode(", ", $val);
            }
            $data[$key] = $val;
        }

    }
        /*
            * example of json data to send
            $newRecord = ['data'=>array(
                [
                    'Customer'=>'Acme',
                    'License'=>7654321,
                    'Maintenance'=>1234567,
                    'State'=>'CO',
                    'Account Manager'=>'Joe',
                    'Close Date'=> 2014-09-19
                ]
            )];
              */
    $data = array("data" => array($data));
    $record = $api->createRecord($viewid, $data);

    }
    return;
}








/*
function contact_form_properties($properties) {

    if (!isset($properties['trackvia'])) {
        $properties['trackvia'] = array(
            'enable' => false,
            'entity' => '1'
        );
    }
    return $properties;
}
*/