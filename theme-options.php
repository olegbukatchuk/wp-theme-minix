<?php
add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );
function theme_options_init(){
register_setting( 'simplenotes_options', 'simplenotes_theme_options', 'theme_options_validate' );
}
function theme_options_add_page() {
add_theme_page( __( 'Theme Options', 'simplenotes' ), __( 'Theme Options', 'simplenotes' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}
function theme_options_do_page() {
if ( ! isset( $_REQUEST['settings-updated'] ) )
$_REQUEST['settings-updated'] = false;
?>
<div class="wrap">
<?php echo "<h2>" . wp_get_theme() . __( ' Theme Options', 'simplenotes' ) . "</h2>"; ?>
<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
<div class="updated fade"><p><strong><?php _e( 'Options saved', 'simplenotes' ); ?></strong></p></div>
<?php endif; ?>
<form method="post" action="options.php">
<?php settings_fields( 'simplenotes_options' ); ?>
<?php $options = get_option( 'simplenotes_theme_options' ); ?>
<table class="form-table">

<!-- start checkbox option (tagline) -->
<tr valign="top" style="background-color:#FFFFFF;border:1px solid #E5E5E5;">
	<th scope="row" style="background-color:#FBFBFB;border-right:1px solid #E5E5E5;padding:15px;vertical-align:middle;text-align:right;">
		<label class="" for="simplenotes_theme_options[option_tagline]"><?php _e( 'Show blog tagline:', 'simplenotes' ); ?></label>
	</th>
	<td style="padding:15px;vertical-align:middle;text-align:left;">
		<input id="simplenotes_theme_options[option_tagline]" name="simplenotes_theme_options[option_tagline]" type="checkbox" value="1" <?php checked( '1', $options['option_tagline'] ); ?> />
	</td>
</tr>
<!-- end checkbox option (tagline) -->

<!-- start checkbox option (search) -->
<tr valign="top" style="background-color:#FFFFFF;border:1px solid #E5E5E5;">
	<th scope="row" style="background-color:#FBFBFB;border-right:1px solid #E5E5E5;padding:15px;vertical-align:middle;text-align:right;">
		<label class="" for="simplenotes_theme_options[option_search]"><?php _e( 'Show search bar:', 'simplenotes' ); ?></label>
	</th>
	<td style="padding:15px;vertical-align:middle;text-align:left;">
		<input id="simplenotes_theme_options[option_search]" name="simplenotes_theme_options[option_search]" type="checkbox" value="1" <?php checked( '1', $options['option_search'] ); ?> />
	</td>
</tr>
<!-- end checkbox option (search) -->

<!-- start checkbox option (social) -->
<tr valign="top" style="background-color:#FFFFFF;border:1px solid #E5E5E5;">
	<th scope="row" style="background-color:#FBFBFB;border-right:1px solid #E5E5E5;padding:15px;vertical-align:middle;text-align:right;">
		<label class="" for="simplenotes_theme_options[option_social]"><?php _e( 'Show social networks:', 'simplenotes' ); ?></label>
	</th>
	<td style="padding:15px;vertical-align:middle;text-align:left;">
		<input id="simplenotes_theme_options[option_social]" name="simplenotes_theme_options[option_social]" type="checkbox" value="1" <?php checked( '1', $options['option_social'] ); ?> />
	</td>
</tr>
<!-- end checkbox option (social) -->

<!-- start text input option (facebook) -->
<tr valign="top" style="background-color:#FFFFFF;border:1px solid #E5E5E5;">
	<th scope="row" style="background-color:#FBFBFB;border-right:1px solid #E5E5E5;padding:15px;vertical-align:middle;text-align:right;">
		<label class="" for="simplenotes_theme_options[facebook_url]"><?php _e( 'Facebook username(optional):', 'simplenotes' ); ?></label>
	</th>
	<td style="padding:15px;vertical-align:middle;text-align:left;">
		<input id="simplenotes_theme_options[facebook_url]" class="regular-text" type="text" name="simplenotes_theme_options[facebook_url]" value="<?php echo $options['facebook_url']; ?>" />
	</td>
</tr>
<!-- end text input option (facebook) -->

<!-- start text input option (linkedin) -->
<tr valign="top" style="background-color:#FFFFFF;border:1px solid #E5E5E5;">
	<th scope="row" style="background-color:#FBFBFB;border-right:1px solid #E5E5E5;padding:15px;vertical-align:middle;text-align:right;">
		<label class="" for="simplenotes_theme_options[linkedin_url]"><?php _e( 'Linkedin username(optional):', 'simplenotes' ); ?></label>
	</th>
	<td style="padding:15px;vertical-align:middle;text-align:left;">
		<input id="simplenotes_theme_options[linkedin_url]" class="regular-text" type="text" name="simplenotes_theme_options[linkedin_url]" value="<?php echo $options['linkedin_url']; ?>" />
	</td>
</tr>
<!-- end text input option (linkedin) -->

<!-- start text input option (twitter) -->
<tr valign="top" style="background-color:#FFFFFF;border:1px solid #E5E5E5;">
	<th scope="row" style="background-color:#FBFBFB;border-right:1px solid #E5E5E5;padding:15px;vertical-align:middle;text-align:right;">
		<label class="" for="simplenotes_theme_options[twitter_url]"><?php _e( 'Twitter username(optional):', 'simplenotes' ); ?></label>
	</th>
	<td style="padding:15px;vertical-align:middle;text-align:left;">
		<input id="simplenotes_theme_options[twitter_url]" class="regular-text" type="text" name="simplenotes_theme_options[twitter_url]" value="<?php echo $options['twitter_url']; ?>" />
	</td>
</tr>
<!-- end text input option (twitter) -->

<!-- start text input option (instagram) -->
<tr valign="top" style="background-color:#FFFFFF;border:1px solid #E5E5E5;">
	<th scope="row" style="background-color:#FBFBFB;border-right:1px solid #E5E5E5;padding:15px;vertical-align:middle;text-align:right;">
		<label class="" for="simplenotes_theme_options[instagram_url]"><?php _e( 'Instagram username(optional):', 'simplenotes' ); ?></label>
	</th>
	<td style="padding:15px;vertical-align:middle;text-align:left;">
		<input id="simplenotes_theme_options[instagram_url]" class="regular-text" type="text" name="simplenotes_theme_options[instagram_url]" value="<?php echo $options['instagram_url']; ?>" />
	</td>
</tr>
<!-- end text input option (instagram) -->

</table>
<p class="submit"><input type="submit" class="button-primary" value="<?php _e( 'Save', 'simplenotes' ); ?>" /></p>
</form>
</div>
<?php
}
function theme_options_validate( $input ) {
if ( ! isset( $input['option_tagline'] ) )
$input['option_tagline'] = null;
$input['option_tagline'] = ( $input['option_tagline'] == 1 ? 1 : 0 );
if ( ! isset( $input['option_search'] ) )
$input['option_search'] = null;
$input['option_search'] = ( $input['option_search'] == 1 ? 1 : 0 );
if ( ! isset( $input['option_social'] ) )
$input['option_social'] = null;
$input['option_social'] = ( $input['option_social'] == 1 ? 1 : 0 );
$input['facebook_url'] = wp_filter_nohtml_kses( $input['facebook_url'] );
$input['linkedin_url'] = wp_filter_nohtml_kses( $input['linkedin_url'] );
$input['twitter_url'] = wp_filter_nohtml_kses( $input['twitter_url'] );
$input['instagram_url'] = wp_filter_nohtml_kses( $input['instagram_url'] );
return $input;
}