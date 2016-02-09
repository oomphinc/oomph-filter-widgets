(function($) {
	if(!window.Oomph) window.Oomph = {};

	Oomph.FilterWidgets = {
		init: function() {
			$('#available-widgets .widget-holder p:first-child')
				.after(
					$('<p class="oomph-filter-widgets description" title="Search for widgets (Ctrl-Shift-F)"></p>').append(
						$('<label>').text(Oomph.text.filterWidgets)
						.append($('<input id="widget-search" type="text">').attr('placeholder', Oomph.text.searchForWidgets))));

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
