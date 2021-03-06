<?php
/**
 * @author Stephanie Land
 * @license http://www.gnu.org/licenses/agpl-3.0.html
 */

/*
Plugin Name: Contact Form 7 TrackVia integration
Plugin URI: https://royalshell.com
Description: Submit contact form 7 to an external TrackVia
Version: 1.1.0
Author: Stephanie Land
Author URI: https://royalshell.com
Text Domain: contact-form-7-trackvia-integration
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

 add_filter( 'wpcf7_contact_form_properties', 'trackvia_contact_form_properties');
add_action('wpcf7_before_send_mail', 'cf7_trackvia_before_send_mail');

define("BASE_URL",'https://go.trackvia.com/'); //don't forget that trailing slash
define("USER", cf7_trackvia_settings::getUserName());
define("PASS", cf7_trackvia_settings::getUserPassword());
define("USER_KEY", cf7_trackvia_settings::getUserKey());

function cf7_trackvia_before_send_mail($contact_form) {
    $properties = $contact_form->get_properties();
    $formid = $properties['trackvia']['tviewid']; // id of the contact form we want to track

    if ($properties['trackvia']['allow'] == false) {
        return;
    }
    if (empty($formid) || empty(USER) || empty(PASS) || empty(USER_KEY)) {
        return;
    }


    $api = new Api(USER, PASS, USER_KEY);
    $wpcf7      = WPCF7_ContactForm::get_current();
    $mail         = $wpcf7->prop('mail');

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


        $record = $api->createRecord($formid, $data);
        $response = $record['message'];
        $responseName = $record['name'];

        if($response) {


            $mail['body'] .= '<div style="border:2px dotted red;padding:10px;"> <p><h2 style="color:red">There was a problem sending this to Trackvia</h2></p><p><b>Response Name:</b> '.$responseName.'</p><p><b>Error:</b> '.$response.'</p></div>';

        } else {
            $mail['body'] .= '<p><b style="color:green">This Submission was Successfully Transferred to Trackvia!</b></p>';
        }
    $wpcf7->set_properties(array(
        "mail" => $mail
    ));
    return $wpcf7;



}

// Available Views
function getAvailableViews () {
    $user_name = cf7_trackvia_settings::getUserName();
    $user_password = cf7_trackvia_settings::getUserPassword();
    $user_key = cf7_trackvia_settings::getUserKey();

    if( empty($user_name) || empty($user_password) || empty($user_key)) {

        return;
    } else {
        $api = new Api(USER, PASS, USER_KEY);
        $views = $api->getViewList();
        echo "<table><tbody><thead><th>List Name</th><th>ViewID</th></thead>";
        foreach ($views as $view) {
            echo '<tr><th>'.$view['name'].'</th><td>'.$view['id'].'</td></tr>';
        }
        echo '</tbody></table>';
    }

}


function trackvia_contact_form_properties($properties) {

    if (!isset($properties['trackvia'])) {
        $properties['trackvia'] = array(
            'allow' => false,
            'tviewid' => '1'
        );
    }
    return $properties;
}
