<?php
/**
 * @author Stephanie Land
 * @license http://www.gnu.org/licenses/agpl-3.0.html
 */
?>
<h3><?php echo esc_html( __( 'TrackVia Settings', 'contact-form-7-trackvia-integration' ) ); ?></h3>

<div class="contact-form-editor-box-trackvia">

    <p><label for="allow-trackvia"><input type="checkbox" id="allow-trackvia" name="allow-trackvia" class="toggle-form-table" value="1"<?php echo ( ! empty( $trackvia['allow'] ) ) ? ' checked="checked"' : ''; ?> /> <?php echo esc_html( __( 'Enable trackvia processing', 'contact-form-7-trackvia-integration' ) ); ?></label></p>

    <fieldset>

        <legend><?php echo esc_html( __( "Fill in a trackvia API entity and action. E.g. Entity: Contact, action: create. Use parameters to add additional api parameters e.g. contact_type=Individual&source=wordpress", 'contact-form-7-trackvia-integration' ) ); ?></legend>

        <table class="form-table">
            <tbody>
          <tr>
                <th scope="row">
                    <label for="tviewid"><?php echo esc_html( __( 'TrackVia View ID', 'contact-form-7-trackvia-integration' ) ); ?></label>
                </th>
                <td>
                    <input type="text" id="trackvia-tviewid" name="trackvia-tviewid" class="large-text code" value="<?php echo $trackvia['tviewid']; ?>" />
                </td>

          </tr>


            </tbody>
        </table>

    </fieldset>

</div>