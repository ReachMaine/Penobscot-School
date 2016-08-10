<?php
/**
 * List View Template
 * The wrapper template for a list of events. This includes the Past Events and Upcoming Events views
 * as well as those same views filtered to a specific category.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list.php
 *
 * @package TribeEventsCalendar
 *
 */
/* 12jan15 - zig add category description to top of page */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

do_action( 'tribe_events_before_template' );
?>
<!-- list view -->
<?php  /* zig added */ 
	echo '<div id="tribe-events-cat-desc">';
 	echo term_description();
 	echo '</div>';
 ?> 

	<!-- Tribe Bar -->
<?php tribe_get_template_part( 'modules/bar' ); ?>

	<!-- Main Events Content -->
<?php tribe_get_template_part( 'list/content' ); ?>

	<div class="tribe-clear"></div>

<?php
do_action( 'tribe_events_after_template' );
