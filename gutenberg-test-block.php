<?php
/**
 * Plugin Name:       Gutenberg Test Block
 * Plugin URI:        https://www.debbielabedz.com
 * Description:       Test Gutenberg block.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Debbie Labedz
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       gutenberg-test-block
 *
 * @package           gutenberg-test-block
 */

 //Pull in Admin setup
require_once( dirname( __FILE__ ) . '/inc/admin.php' );

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function gutenberg_test_block_gutenberg_test_block_block_init() {
	register_block_type(__DIR__ . '/build', array(
        // Add a render_callback to handle dynamic rendering of block with PHP
        'render_callback' => 'gutenberg_test_block_dynamic_rendering_output'
    ));
}
add_action( 'init', 'gutenberg_test_block_gutenberg_test_block_block_init' );

/**
 * Server-side rendering function for the `create-block/dynamic-rendering` block.
 * Requests a random user from external API using the values saved in the block attributes
 *
 * @see https://developer.wordpress.org/apis/handbook/making-http-requests/getting-data-from-an-external-service/
 */
function gutenberg_test_block_dynamic_rendering_output()
{
	if( !is_admin() ) {
		wp_enqueue_script( 'book_data', plugin_dir_url( __FILE__ ) . '/build/frontend.js');
		wp_enqueue_style( 'book_data', plugin_dir_url( __FILE__ ) . '/build/frontend.css');
	  }

	//get API url from plugin settings page
	$api_url = get_option('gutenberg_test_block_api_list');

	if ($api_url) {
		$fetch_url = $api_url;
	}
	else{
		$fetch_url = 'https://api.nytimes.com/svc/books/v3/lists/best-sellers/history.json?';
	}

    $response = wp_remote_get("https://api.nytimes.com/svc/books/v3/lists/best-sellers/history.json?api-key=6GdJO2GI6gD3oNT8pCJCIXsdsdklKl8S");

	$body = wp_remote_retrieve_body( $response );

	$data = json_decode( $body );

	ob_start(); ?>

	<div class="book-list-frontend">
	  	<div class="data">
			<pre>
				<?php echo wp_json_encode( $data ) ?>
			</pre>
		</div>
		<div class="book-wrapper">
			<h3>New York Times Bestsellers</h3>
			<div class="book-container">
				<div class="section-title">Book 1</div>
				<p class="title">Title:&nbsp;<span id="title-text-0"><span></p>
				<p class="author">Author:&nbsp;<span id="author-text-0"><span></p>
				<p class="description">Description:&nbsp;<span id="description-text-0"><span></p>
			</div>
			<div class="book-container">
				<div class="section-title">Book 2</div>
				<p class="title">Title:&nbsp;<span id="title-text-1"><span></p>
				<p class="author">Author:&nbsp;<span id="author-text-1"><span></p>
				<p class="description">Description:&nbsp;<span id="description-text-1"><span></p>
			</div>
			<div class="book-container">
				<div class="section-title">Book 3</div>
				<p class="title">Title:&nbsp;<span id="title-text-2"><span></p>
				<p class="author">Author:&nbsp;<span id="author-text-2"><span></p>
				<p class="description">Description:&nbsp;<span id="description-text-2"><span></p>
			</div>
			<div class="book-container">
				<div class="section-title">Book 4</div>
				<p class="title">Title:&nbsp;<span id="title-text-3"><span></p>
				<p class="author">Author:&nbsp;<span id="author-text-3"><span></p>
				<p class="description">Description:&nbsp;<span id="description-text-3"><span></p>
			</div>
		</div>

	</div>

	<?php return ob_get_clean();

}
