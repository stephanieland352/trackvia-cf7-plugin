<div class="wrap">

  <h2><?php esc_html_e( 'TrackVia Settings' , 'contact-form-7-trackvia-integration');?></h2>


  <div class="postbox-container" style="">
    <div id="normal-sortables" class="meta-box-sortables ui-sortable">
      <div id="referrers" class="postbox ">
        <div class="handlediv" title="Click to toggle"><br></div>
        <h3 class="hndle" style="padding: 10px;"><span><?php esc_html_e( 'Settings' , 'contact-form-7-trackvia-integration');?></span></h3>
        <form name="cf7_trackvia_admin" id="cf7_trackvia_admin" action="<?php echo esc_url( cf7_trackvia_admin::get_page_url() ); ?>" method="POST">
          <div class="inside">
            <table cellspacing="0">
              <tbody>

              <tr>
                  <th width="20%" align="left" scope="row"><?php esc_html_e('TrackVia UserName', 'contact-form-7-trackvia-integration');?></th>
                  <td width="5%"/>
                  <td align="left">
                      <span><input id="user_name" name="user_name" type="text" size="15" value="<?php echo esc_attr( cf7_trackvia_settings::getUserName() ); ?>" class="regular-text code"></span>
                  </td>
              </tr>

              <tr>
                  <th width="20%" align="left" scope="row"><?php esc_html_e('TrackVia Password', 'contact-form-7-trackvia-integration');?></th>
                  <td width="5%"/>
                  <td align="left">
                      <span><input id="user_password" name="user_password" type="password" size="15" value="<?php echo esc_attr( cf7_trackvia_settings::getUserPassword() ); ?>" class="regular-text code"></span>
                  </td>
              </tr>


              <tr>
                <th width="20%" align="left" scope="row"><?php esc_html_e('TrackVia User Key', 'contact-form-7-trackvia-integration');?></th>
                <td width="5%"/>
                <td align="left">
                  <span><input id="user_key" name="user_key" type="text" size="15" value="<?php echo esc_attr( cf7_trackvia_settings::getUserKey() ); ?>" class="regular-text code"></span>
                </td>
              </tr>



              </tbody>

            </table>
          </div>
            <div style="padding: 10px;">
                <small>** When setting up your contact form and trackvia table the key name(Contact form 7) and field name (Trackvia) must match exactly

                    <p><small>Example Trackvia Field Names: your-name, your-email not "Your Name" or "Your Email" </small></p></small>
            </div>
          <div id="major-publishing-actions">
            <?php wp_nonce_field(cf7_trackvia_admin::NONCE) ?>
            <div id="publishing-action">
              <input type="hidden" name="action" value="enter-key">
              <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php esc_attr_e('Save Changes', 'contact-form-7-trackvia-integration');?>">

            </div>
            <div class="clear"></div>
          </div>
        </form>
       <!-- <table>
            <tr>
                <th>
                    This user can view
                </th>
                <td>
                    <?php // getAvailableViews(); ?>
                </td>
            </tr>
        </table> -->

      </div>
    </div>
  </div>

</div>