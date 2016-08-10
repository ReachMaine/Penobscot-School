<?php 
/* woocommerce hooks & filters here */
	

	// remove sku from product details.
	add_filter( 'wc_product_sku_enabled', '__return_false' );
	
	// remove ordering from product archive page.
	// flatsome uses it's own actions for ordering & filtering
	function reach_woo_setup() {
		// remove "showing all 10 results" & default sorting
		remove_action( 'ux_woocommerce_navigate_products', 'woocommerce_result_count', 20 );
 		remove_action( 'ux_woocommerce_navigate_products', 'woocommerce_catalog_ordering', 30 );
 		
	}

	// remove additional information tab
	add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
	function woo_remove_product_tabs( $tabs ) {

		unset( $tabs['additional_information'] );  	// Remove the additional information tab
		return $tabs;

	}

	// hide count from category 
	add_filter( 'woocommerce_subcategory_count_html', 'woo_remove_category_products_count' );
	function woo_remove_category_products_count() {
		return;
	}

	// single product, move price farther down the page (not 2nd)
 	//woocommerce_template_single_price	
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 25 );


   // change the add to cart text....

	add_filter( 'woocommerce_product_add_to_cart_text' , 'custom_woocommerce_product_add_to_cart_text' );

	/**
	 * custom_woocommerce_template_loop_add_to_cart
	*/
	function custom_woocommerce_product_add_to_cart_text() {
		global $product;
		
		$product_type = $product->product_type;
		
		switch ( $product_type ) {
			case 'external':
				return __( 'Buy product', 'woocommerce' );
			break;
			case 'grouped':
				return __( 'View products', 'woocommerce' );
			break;
			case 'simple':
				return __( 'Register', 'woocommerce' ); // was 'add to cart'
			break;
			case 'variable':
				return __( 'Register', 'woocommerce' ); // was 'Select options'
			break;
			default:
				return __( 'Read more', 'woocommerce' );
		}
		
	}