<?php

/**
 * Plugin Name: Google Analytics for WP
 * Plugin URI: https://github.com/cferdinandi/google-analytics/
 * Description: Adds your Google Analytics script to WordPress. Add your Google Analytics ID under <a href="options-general.php?page=googanalytics_theme_options">Settings &rarr; Google Analytics</a>.
 * Version 1.2.0
 * Author: Chris Ferdinandi
 * Author URI: http://gomakethings.com
 * License: MIT
 *
 * Uses the optimized snippet recommended by HTML5 Boilerplate.
 * http://html5boilerplate.com/
 */

	// Get settings
	require_once( dirname( __FILE__) . '/googanalytics-options.php' );

	function googanalytics_add_google_analytics( $query ) {
		$google_analytics_id = googanalytics_get_google_analytics_id();
		if ( $google_analytics_id != '' && !googanalytics_get_ignore_admin() ) {
			$script = "
				<script>
					(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
					function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
					e=o.createElement(i);r=o.getElementsByTagName(i)[0];
					e.src='//www.google-analytics.com/analytics.js';
					r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
					ga('create','" . $google_analytics_id . "');ga('send','pageview');
				</script>";
			echo $script;
		}
	}
	add_action('wp_footer', 'googanalytics_add_google_analytics', 30);
