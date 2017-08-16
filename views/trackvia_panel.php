<?php
/**
 * @author Stephanie Land
 * @license http://www.gnu.org/licenses/agpl-3.0.html
 */
?>
<h3><?php echo esc_html( __( 'TrackVia Settings', 'contact-form-7-trackvia-integration' ) ); ?></h3>

<div class="contact-form-editor-box-trackvia">

    <p><label for="enable-trackvia"><input type="checkbox" id="enable-trackvia" name="enable-trackvia" class="toggle-form-table" value="1"<?php echo ( ! empty( $trackvia['enable'] ) ) ? ' checked="checked"' : ''; ?> /> <?php echo esc_html( __( 'Enable trackvia processing', 'contact-form-7-trackvia-integration' ) ); ?></label></p>

    <fieldset>

        <legend><?php echo esc_html( __( "Fill in a trackvia API entity and action. E.g. Entity: Contact, action: create. Use parameters to add additional api parameters e.g. contact_type=Individual&source=wordpress", 'contact-form-7-trackvia-integration' ) ); ?></legend>

        <table class="form-table">
            <tbody>

            <tr>
                <th scope="row">
                    <label for="entity"><?php echo esc_html( __( 'Entity', 'contact-form-7-trackvia-integration' ) ); ?></label>
                </th>
                <td>
                    <input type="text" id="trackvia-entity" name="trackvia-entity" class="large-text code" size="70" value="<?php echo esc_attr( $trackvia['entity'] ); ?>" />
                </td>
            </tr>


            </tbody>
        </table>

    </fieldset>

</div>