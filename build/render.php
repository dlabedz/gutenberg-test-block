<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<div <?php echo get_block_wrapper_attributes(); ?>>
	<?php esc_html_e( 'Gutenberg Test Block – hello from a dynamic block!', 'gutenberg-test-block' ); ?>
	<div class="">This is a test.</div>
</div>

