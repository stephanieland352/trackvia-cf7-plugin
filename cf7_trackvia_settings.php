<?php
/**
 * @author Stephanie Land
 * @license http://www.gnu.org/licenses/agpl-3.0.html
 */

class cf7_trackvia_settings {
//User Name
    public static function getUserName() {
        return get_option('cf7_trackvia_user_name');
    }

    public static function setUserName($key)
    {
        update_option('cf7_trackvia_user_name', $key);
    }

    //User Password
    public static function getUserPassword() {
        return get_option('cf7_trackvia_user_password');
    }

    public static function setUserPassword($key)
    {
        update_option('cf7_trackvia_user_password', $key);
    }
// Trackvia View Id
  public static function getTrackviaViewID() {
    return get_option('cf7_trackvia_trackvia_view_id');
  }

  public static function setTrackviaViewID($key) {
    update_option( 'cf7_trackvia_trackvia_view_id', $key );
  }
// User Key
  public static function getUserKey() {
    return get_option('cf7_trackvia_user_key');
  }

  public static function setUserKey($key) {
    update_option( 'cf7_trackvia_user_key', $key );
  }

    // User Key
    public static function getContactFormID() {
        return get_option('cf7_trackvia_contact_form_id');
    }

    public static function setContactFormID($key) {
        update_option( 'cf7_trackvia_contact_form_id', $key );
    }

}