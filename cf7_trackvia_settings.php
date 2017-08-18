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
// User Key
  public static function getUserKey() {
    return get_option('cf7_trackvia_user_key');
  }

  public static function setUserKey($key) {
    update_option( 'cf7_trackvia_user_key', $key );
  }


}