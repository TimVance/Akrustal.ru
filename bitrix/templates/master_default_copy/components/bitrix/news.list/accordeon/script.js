RS.Application().ready(function () {
  var $items = $('.js-items');

  if (window.location.hash) {
    $items.find('.collapsed[href="#collapse_' + window.location.hash.split('#')[1] + '"]').click();
  }

  $('#items_accordion').on('shown.bs.collapse', function () {
      var $active = $items.find('.collapse.in').closest('.panel');
      window.location.hash = $active.data('code');
  });

  $items.find('[data-filter]').on('click', function (e) {
    e.preventDefault();

    var filter = $(this).data('filter');

    if (filter) {
      $items
        .find('.panel')
        .show()
        .not('[data-type="' + filter  + '"]')
        .hide()

      $items.find('.panel:visible:eq(0) a.collapsed').click();
    } else {
      $items.find('.panel').show();
    }

    $(this)
    .removeClass('btn-default')
      .addClass('btn-primary')
      .siblings('.btn-primary')
        .removeClass('btn-primary')
        .addClass('btn-default')
  });
});
