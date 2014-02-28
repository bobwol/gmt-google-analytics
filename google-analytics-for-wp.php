<?php

/* ======================================================================

	Plugin Name: Google Analytics for WP
	Plugin URI: https://github.com/cferdinandi/google-analytics/
	Description: Adds your Google Analytics script to WordPress. Add your Google Analytics ID under <a href="options-general.php?page=googanalytics_theme_options">Settings &rarr; Google Analytics</a>.
	Version: 1.2
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
	if ( $google_analytics_id != '' && !googanalytics_get_ignore_admin() ) {
		$script = "
			<script>
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