<?php
	require_once(get_stylesheet_directory().'/custom/language.php');
	require_once(get_stylesheet_directory().'/custom/woocommerce.php');

	// add shortcode for current year, used in copyright footer.
	function year_shortcode() {
	    $year = date('Y');
	    return $year;
	}
	add_shortcode('current_year', 'year_shortcode');

	add_action('after_setup_theme', 'ea_setup');
	/**  ea_setup
	*  init stuff that we have to init after the main theme is setup.
	*
	*/
	function ea_setup() {
	 /* do stuff ehre. */
	 reach_woo_setup(); // woocommerce stuff that overrides flatsome.

		remove_action( 'flatsome_after_header', 'flatsome_html_after_header', 1 );
		add_action( 'reach_after_header', 'flatsome_html_after_header', 1 );
		function reach_after_header() {
			if ( get_theme_mod( 'html_after_header' ) && is_front_page() ) {
				// AFTER HEADER HTML BLOCK.
				echo '<div class="header-block block-html-after-header z-1 zzz" style="position:relative;top:-1px;">';
				echo do_shortcode( get_theme_mod( 'html_after_header' ) );
				echo '</div>';
			}
		}
	}

	add_image_size('reach_featured_image', 750, 350, false);
	function ea_custom_sizes( $sizes ) {
	    return array_merge( $sizes, array(
	        'reach_featured_image' => __( 'Reach Blog Featured' ),
	    ) );
	}
	add_filter('widget_text', 'do_shortcode'); // make text widget do shortcodes....

	/* image size for facebook */
	add_image_size( 'facebook_share', 470, 246, true );
	add_image_size('facebook_share_vert', 246, 470, true);
	add_filter('wpseo_opengraph_image_size', 'mysite_opengraph_image_size');
	function mysite_opengraph_image_size($val) {
		return 'facebook_share';
	}

		// contact form 7 fallback for date field
	add_filter( 'wpcf7_support_html5_fallback', '__return_true' );

	/*****  change the login screen logo ****/
	function my_login_logo() { ?>
		<style type="text/css">
			body.login div#login h1 a {
				background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/admin-img.png);
				padding-bottom: 30px;
				background-size: contain;
				margin-left: 0px;
				margin-bottom: 0px;
				margin-right: 0px;
				height: 60px;
				width: 100%;
			}
		</style>
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );
?>
