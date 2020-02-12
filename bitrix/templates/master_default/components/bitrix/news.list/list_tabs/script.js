$(document).ready(function () {

	/* разделы */
	var $newslist = $('.js-newslist');

	/* если раздел указан в адресе, открываем */
	if (window.location.hash) {
		var filter = window.location.hash.split('#')[1];
		var section_button = $newslist.find('[data-filter="' + filter  + '"]')[0];

		if (filter) {
			$newslist
				.find('.panel')
				.show()
				.not('[data-section="' + filter  + '"]')
				.hide()
		}

		$(section_button)
			.removeClass('btn-default')
			.addClass('btn-primary')
			.siblings('.btn-primary')
			.removeClass('btn-primary')
			.addClass('btn-default')
	}

	$newslist.find('[data-filter]').on('click', function (e) {
		e.preventDefault();
		var filter = $(this).data('filter');

		if (filter) {
			$newslist
				.find('.panel')
				.show()
				.not('[data-section="' + filter  + '"]')
				.hide()

			window.location.hash = filter;
		}

		$(this)
			.removeClass('btn-default')
			.addClass('btn-primary')
			.siblings('.btn-primary')
			.removeClass('btn-primary')
			.addClass('btn-default')
	});

});
