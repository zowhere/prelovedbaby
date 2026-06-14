
$(function () {
  function goSearch(term) {
    term = (term || '').trim();
    if (!term) {
      return;
    }

    window.location.href = 'shop-grid-left-sidebar.php?q=' + encodeURIComponent(term);
  }

  $('.site-search-form').on('submit', function (e) {
    e.preventDefault();
    goSearch($(this).find('[name="q"]').val());
  });

  $('.site-search-keyword').on('click', function () {
    goSearch($(this).data('q'));
  });

  $('.nav-search form').on('submit', function (e) {
    e.preventDefault();
    goSearch($(this).find('.nav-search-control').val());
  });

  var params = new URLSearchParams(window.location.search);
  var query = params.get('q');

  if (query) {
    $('[name="q"], .nav-search-control, #siteSearchInput').val(query);

    if ($('.product-card--listing').length) {
      var needle = query.toLowerCase();
      var visible = 0;

      $('.product-card--listing').each(function () {
        var match = $(this).text().toLowerCase().indexOf(needle) !== -1;
        $(this).closest('.col').toggle(match);

        if (match) {
          visible++;
        }
      });

      $('.shop-results-count').text(visible);
    }
  }
});
