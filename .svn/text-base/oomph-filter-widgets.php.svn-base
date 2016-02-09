<?php
/*
Plugin Name: Oomph Filter Widgets
Plugin URI: http://www.thinkoomph.com/plugins-modules/oomph-filter-widgets/
Description: Add a search screen to the widget list to allow for filtering of long widget lists.
Author: Ben Doherty @ Oomph, Inc.
Version: 0.1
Author URI: http://www.thinkoomph.com/thinking/author/ben-doherty/
License: GPLv2 or later

		Copyright © 2013 Oomph, Inc. <http://oomphinc.com>

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
	function __construct(  ) {
		add_filter( 'admin_head', array( $this, 'filter_script'  )  );
	}

	function filter_script() {
		global $pagenow;

		if( $pagenow != 'widgets.php' ) 
			return;
?>
<script>
(function($) {
	if(!window.Oomph) window.Oomph = {};

	Oomph.FilterWidgets = {
		init: function() {
			$('#available-widgets .widget-holder p:first-child')
				.after('<p class="description" title="Search for widgets (Ctrl-Shift-F)"><label>Filter widgets: <input id="widget-search" type="text" placeholder="Search widget names..." /></label></p>');

			var $search = $('#widget-search');
			var $widget_list = $('#widget-list');

			$('body').on('keyup', function(ev) {
				if(ev.keyCode == 70 && ev.ctrlKey)
					$search.focus();
			});

			$search.on('click', function(ev) {
				ev.stopPropagation();
			}).on('keyup', function(ev) {
				var searchBox = this;
				$widget_list
					.find('.widget').show()
					.find('.widget-title').filter(function() { 
						return $(this).text().toLowerCase().indexOf(searchBox.value.toLowerCase()) == -1; 
					}).parents('.widget').hide();
			});
		}
	}

	$(Oomph.FilterWidgets.init);
})(jQuery);
</script>
<?php
	}
}

$GLOBALS['Oomph_Filter_Widgets'] = new Oomph_Filter_Widgets();

