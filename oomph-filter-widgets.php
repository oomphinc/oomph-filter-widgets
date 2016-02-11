<?php
/*
Plugin Name: Oomph Filter Widgets
Plugin URI: http://www.thinkoomph.com/plugins-modules/oomph-filter-widgets/
Description: Add a search screen to the widget list to allow for filtering of long widget lists.
Author: Ben Doherty @ Oomph, Inc.
Version: 0.2
Author URI: http://www.thinkoomph.com/thinking/author/ben-doherty/
License: GPLv2 or later
Text Domain: oomph-filter-widgets

		Copyright © 2016 Oomph, Inc. <http://oomphinc.com>

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

/**
 * @package Oomph Filter Widgets
 */
class Oomph_Filter_Widgets {
	/**
	 * Register da hooks.
	 */
	function __construct(  ) {
		add_filter( 'admin_head', array( $this, 'the_one_css_rule' ), 0 );
		add_filter( 'admin_enqueue_scripts', array( $this, 'enqueue_script' ) );
	}

	/**
	 * Because should we really enqueue for a tiny rule?
	 *
	 * @action admin_head
	 */
	function the_one_css_rule() {
		global $pagenow;

		if( $pagenow != 'widgets.php' ) {
			return;
		}

		echo "\n<style>.oomph-filter-widgets input { width: 100%; }</style>\n";
	}

	/**
	 * Enqueue the one script.
	 *
	 * @action admin_enqueue_scripts
	 */
	function enqueue_script() {
		global $pagenow;

		if( $pagenow != 'widgets.php' ) {
			return;
		}

		wp_enqueue_script( 'oomph-filter-widgets', plugins_url( 'oomph-filter-widgets.js', __FILE__ ) );
		wp_localize_script( 'oomph-filter-widgets', 'Oomph', array(
			'text' => array(
				'filterWidgets' => __( 'Filter Widgets', 'oomph-filter-widgets' ),
				'searchForWidgets' => __( 'Search for Widgets (Ctrl-Shift-F)', 'oomph-filter-widgets' )
			)
		) );
	}
}

// Make it happen.
$GLOBALS['Oomph_Filter_Widgets'] = new Oomph_Filter_Widgets();

