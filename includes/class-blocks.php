<?php
/**
 * CNP Core Gutenberg Blocks
 *
 * @package CNP
 */

namespace CNP\Core;

/**
 * Blocks class
 */
class Blocks {

	/**
	 * Array of block names
	 *
	 * @var array
	 */
	public $blocks;

	/**
	 * Custom blocks script handle
	 *
	 * @var string
	 */
	public $editor_script = 'cnp-core-blocks-editor-script';

	/**
	 * Custom block edit style handle
	 *
	 * @var string
	 */
	public $editor_style = 'cnp-core-blocks-editor-style';

	/**
	 * Custom blocks style handle
	 *
	 * @var string
	 */
	public $style = 'cnp-core-blocks-style';

	/**
	 * Plugin version for file enqueue versioning
	 *
	 * @var string
	 */
	public $version;

	/**
	 * Gutenberg_Blocks constructor
	 */
	public function __construct() {

		$this->version = CNP_CORE_BLOCKS_VERSION;

		\add_action( 'init', array( $this, 'register_block_assets' ) );

	}

	/**
	 * Add a block to register
	 *
	 * @param string $name Name of block to be registered.
	 */
	public function add_block( $name ) {

		array_push( $this->blocks, $name );

	}

	/**
	 * Register block assets
	 */
	public function register_block_assets() {

		if ( null === $this->blocks ) {
			return;
		}

		// Register block script.
		wp_register_script(
			$this->editor_script,
			plugins_url( '/blocks/dist/blocks.build.js', __FILE__ ),
			array( 'wp-blocks', 'wp-element', 'wp-editor' ),
			$this->version,
			true
		);

		// Register block CSS.
		wp_register_style(
			$this->style,
			plugins_url( '/blocks/dist/blocks.style.build.css', __FILE__ ),
			array( 'wp-blocks' ),
			$this->version,
			true
		);

		// Register block edit CSS.
		if ( is_admin() ) {

			wp_register_style(
				$this->editor_style,
				plugins_url( '/blocks/dist/blocks.editor.build.css', __FILE__ ),
				array( 'wp-edit-blocks' ),
				$this->version,
				true
			);

		}

		foreach ( $this->blocks as $block ) {
			$this->register_block( $block );
		}

	}

	/**
	 * Register custom block
	 *
	 * @param string $name Block name.
	 */
	public function register_block( $name ) {

		\register_block_type(
			$name,
			array(
				'editor_script' => $this->editor_script,
				'editor_style'  => $this->editor_style,
				'style'         => $this->style,
			)
		);

	}

}
