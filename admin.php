<?php
// create custom plugin settings menu
add_action('admin_menu', 'antirez_create_menu');

function antirez_create_menu() {
	add_menu_page('Antirez Theme Settings', 'Antirez Theme', 'administrator', __FILE__, 'antirez_settings', get_bloginfo('template_directory') . '/favicon.ico');
	add_action( 'admin_init', 'antirez_settings_function' );
}

function antirez_settings_function() {
	//register our settings
    register_setting( 'antirez_settingsgroup', 'antirez_settingTrackCode' );
    register_setting( 'antirez_settingsgroup', 'antirez_settingGurl' );
    register_setting( 'antirez_settingsgroup', 'antirez_settingTurl' );
    register_setting( 'antirez_settingsgroup', 'antirez_settingRurl' );
    register_setting( 'antirez_settingsgroup', 'antirez_settingX' );
}

function antirez_settings() {
        if ( ! isset( $_REQUEST['settings-updated'] ) )
        $_REQUEST['settings-updated'] = false;
?>

<div class="wrap">
    <h2>Antirez Theme Options</h2>
    <form method="post" action="options.php">
        <?php settings_fields('antirez_settingsgroup'); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Tracking Code</th>
                <td>
                    <textarea cols="100" rows="5" name="antirez_settingTrackCode">
                        <?php echo get_option('antirez_settingTrackCode'); ?>
                    </textarea>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Google+ URL</th>
                <td>
                    <input type="text" size="25" name="antirez_settingGurl" value="<?php echo get_option('antirez_settingGurl'); ?>">
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Twitter URL</th>
                <td>
                    <input type="text" size="25" name="antirez_settingTurl" value="<?php echo get_option('antirez_settingTurl'); ?>">
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">RSS URL</th>
                <td>
                    <input type="text" size="25" name="antirez_settingRurl" value="<?php echo get_option('antirez_settingRurl'); ?>">
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Additional link(s) to the Footer</th>
                <td>
                    <textarea cols="100" rows="5" name="antirez_settingX">
                        <?php echo get_option('antirez_settingX'); ?>
                    </textarea>
                </td>
            </tr>

        </table>
    
        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        </p>

        <?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
            <p><strong>Options saved</strong></p>
        <?php endif; ?>
        
    </form>
</div>
<?php } ?>