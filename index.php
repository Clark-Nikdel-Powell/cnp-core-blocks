<?php
/**
 * CNP Core Blocks plugin
 *
 * @link https://cnpagency.com
 * @since 1.0.0
 * @package CNP
 *
 * @wordpress-plugin
 * Plugin Name:       CNP Core Blocks
 * Plugin URI:        https://cnpagency.com
 * Description:       Custom Gutenberg blocks.
 * Version:           1.0.0
 * Author:            CNP
 * Author URI:        https://cnpagency.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cnp-core-blocks
 * Domain Path:       /languages
 */

use CNP\Core\Blocks;

define( 'CNP_CORE_BLOCKS_VERSION', '1.0.0' );
define( 'CNP_CORE_BLOCKS_PATH', __FILE__ );

require_once 'includes/class-blocks.php';

$cnp_core_blocks = new Blocks();
$cnp_core_blocks->add_block( 'cnp/speedbump' );
