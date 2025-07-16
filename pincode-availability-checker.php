<?php
/**
 * Plugin Name: Pincode Availability Checker
 * Description: A dynamic Gutenberg block that lets users enter their pincode and checks delivery availability based on a list defined by the site admin. The entered pincode is saved in the browser cookie and auto-checked on future visits.
 * Version: 1.0.0
 * Author: Rajdeep Singh Gaur
 * License: GPLv2 or later
 * Text Domain: pincode-checker
 * Version:           0.1.0
 * Requires at least: 6.7
 * Requires PHP:      7.4
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       pincode-availability-checker
 *
 * @package CreateBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require_once __DIR__ . '/includes/render.php';
require_once __DIR__ . '/includes/class-settings-page.php';
require_once __DIR__ . '/includes/api.php';

new PC_Settings_Page();

/**
 * Registers the block using a `blocks-manifest.php` file, which improves the performance of block type registration.
 * Behind the scenes, it also registers all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://make.wordpress.org/core/2025/03/13/more-efficient-block-type-registration-in-6-8/
 * @see https://make.wordpress.org/core/2024/10/17/new-block-type-registration-apis-to-improve-performance-in-wordpress-6-7/
 */
function create_block_pincode_availability_checker_block_init() {
	$manifest_data = require __DIR__ . '/build/blocks-manifest.php';
	foreach ( array_keys( $manifest_data ) as $block_type ) {
		register_block_type( __DIR__ . "/build/{$block_type}", [
			'render_callback' => 'pc_render_block',
		] );
	}
}
add_action( 'init', 'create_block_pincode_availability_checker_block_init' );

add_action('rest_api_init', 'pc_register_rest_api');

