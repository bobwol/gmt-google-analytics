<?php

/* ======================================================================

	Plugin Name: Google Analytics for WP
	Plugin URI: http://cferdinandi.github.io/google-analytics/
	Description: Adds your Google Analytics script to WordPress.
	Version: 1.0
	Author: Chris Ferdinandi
	Author URI: http://gomakethings.com
	License: MIT

	Uses the optimized snippet recommended by HTML5 Boilerplate.
	http://html5boilerplate.com/

 * ====================================================================== */

// Get settings
require_once( dirname( __FILE__) . '/googanalytics-options.php' );

function googanalytics_add_google_analytics( $query ) {
	$google_analytics_id = googanalytics_get_google_analytics_id();
	if ( $google_analytics_id != '' ) {
		$script =
			"<script>
				var _gaq=[['_setAccount','" . $google_analytics_id . "'],['_trackPageview']];
				(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
				g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
				s.parentNode.insertBefore(g,s)}(document,'script'));
			</script>";
		echo $script;
	}
}
add_action('wp_footer', 'googanalytics_add_google_analytics', 30);

?>