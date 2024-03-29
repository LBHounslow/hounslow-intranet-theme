<?php
//------------------------------------------------------------------------------------
if (!function_exists('hounslow_intranet_hide_duplicate_content')) :
	/**
	 * Hide duplicate content from search engines
	 */
	function hounslow_intranet_hide_duplicate_content()
	{

		$robot_tag = '';
		if (is_home()) {
			$robot_tag = 'noindex';
		} elseif (is_author()) {
			$robot_tag = 'noindex';
		} elseif (is_category()) {
			$robot_tag = 'noindex';
		} elseif (is_tag()) {
			$robot_tag = 'noindex';
		} elseif (is_date()) {
			$robot_tag = 'noindex';
		} elseif (is_search()) {
			$robot_tag = 'noindex';
		} elseif (is_attachment()) {
			$robot_tag = 'noindex';
		} elseif (is_paged()) {
			$robot_tag = 'noindex';
		}

		if (!empty($robot_tag)) {
			echo '<meta name="robots" content="' . $robot_tag . '" />';
		}
	}
endif; // oystershell_hide_duplicate_content

add_action('wp_head', 'hounslow_intranet_hide_duplicate_content');
