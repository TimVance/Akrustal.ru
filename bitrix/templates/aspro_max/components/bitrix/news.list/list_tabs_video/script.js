$(function () {

    /* разделы */
    var $newslist = $('.js-newslist');

    if (window.location.hash) {
        $newslist.find('.collapsed[href="#collapse_' + window.location.hash.split('#')[1] + '"]').click();
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

            $newslist.find('.panel:visible:eq(0)').click();
        } else {
            $newslist.find('.panel').show();
        }

        $(this)
            .removeClass('btn-default')
            .addClass('btn-primary')
            .siblings('.btn-primary')
            .removeClass('btn-primary')
            .addClass('btn-default')
    });

});
