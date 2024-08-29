<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

//add menu page
add_action( 'admin_menu', 'gutenberg_test_block_page' );
function gutenberg_test_block_page() {
	add_menu_page(
		__( 'Gutenberg Test Block Settings', 'gutenberg-block' ),
		__( 'Gutenberg Block Settings', 'gutenberg-block' ),
		'administrator',
		'gutenberg-test-block-settings',
		'gutenberg_test_block_settings_page',
		'dashicons-book',
		25
	);
}

//register API URL settings
add_action( 'admin_init', 'register_gutenberg_test_block_settings' );
function register_gutenberg_test_block_settings() {
	register_setting( 'gutenberg_test_block_settings', 'gutenberg_test_block_api_list' );
}


function gutenberg_test_block_settings_page() {
	?>
	<div class="wrap">
	<h1>Gutenberg Test Block Settings</h1>

	<form method="post" action="options.php">
		<?php settings_fields( 'gutenberg_test_block_settings' ); ?>
		<?php do_settings_sections( 'gutenberg_test_block_settings' ); ?>
		<table class="form-table">
			<tr valign="top">
			<th scope="row">API URL</th>
			<td><input type="text" name="gutenberg_test_block_api_list" value="<?php echo esc_attr( get_option('gutenberg_test_block_api_list') ); ?>" /></td>
			</tr>
		</table>
		<?php submit_button(); ?>
	</form>
	</div>
<?php } ?>
