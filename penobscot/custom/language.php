<?php
/* languages customizations
- add require_once(get_stylesheet_directory().'/custom/language.php'); to functions.php to make this work.
*/
	if ( !function_exists('eai_change_theme_text') ){
		function eai_change_theme_text( $translated_text, $text, $domain ) {
			 /* if ( is_singular() ) { */
			 	$theme_text_domain = 'flatsome';
			    switch ( $translated_text ) {
			    	case 'Return To Shop':
			    		$translated_text = __('Ok','woocommerce');
			    		break;
						case 'No products were found matching your selection.' :
							if (is_product_category()) {
								$translated_text = 'There are no '.single_term_title("", false).' scheduled. ';
								$translated_text .= 'Please inquire about a semi-private or private tutorial. ';
								$translated_text = "";
								//$translated_text .= '</br><a href="http://www.penobscot.us/tutorials/" class=" button primary">Learn More</a>';

							} else {
								$translated_text = 'There are currently no classes scheduled. Classes will be posted when the next session begins.';
							}
							break;

		            /* case 'Category' :
		                $translated_text = __( '',  $domain  );
		                break; */
		            /*case 'Type here...':
		            	$translated_text = __( 'Search...', $theme_text_domain  );
		            	break;
		            case 'BLOG CATEGORIES':
		            	$translated_text = __( 'Found in',  $theme_text_domain );
		            	break;
		            case 'Share this post:':
		            	$translated_text = __('Share', $theme_text_domain);
		            	break;
			        case 'Select treatment' :
		                $translated_text = __( 'Select Speciality', $theme_text_domain);
		                break;
		            case 'treatments':
		            	$translated_text = __( 'Specialty', $theme_text_domain);
		            	break;
		            case 'Doctors':
		            	$translated_text = __( 'Providers', $theme_text_domain);
		            	break; */
								case 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.':
								case 'This entry was posted in %1$s and tagged %2$s.':
									$translated_text = "";
									break;

		            case 'Back to services':
		            	$translated_text = __( 'All Our Services',  $theme_text_domain  );
		        }
		    /* } */

	    	return $translated_text;
		}
		add_filter( 'gettext', 'eai_change_theme_text', 20, 3 );
	}

?>
