$(function () {
  var $slider = $('#slider-range');
  var $minInput = $('#min_price');
  var $maxInput = $('#max_price');
  var $listings = $('.product-card--listing[data-price]');

  if (!$slider.length || !$listings.length) {
    return;
  }

  var sliderMin = parseInt($slider.data('min'), 10);
  var sliderMax = parseInt($slider.data('max'), 10);

  if (isNaN(sliderMin)) {
    sliderMin = 0;
  }

  if (isNaN(sliderMax) || sliderMax < sliderMin) {
    sliderMax = sliderMin;
  }

  var searchQuery = (new URLSearchParams(window.location.search)).get('q');
  if (searchQuery) {
    searchQuery = searchQuery.toLowerCase();
  }

  function matchesSearch($card) {
    if (!searchQuery) {
      return true;
    }

    return $card.text().toLowerCase().indexOf(searchQuery) !== -1;
  }

  function applyPriceFilter() {
    var minPrice = parseInt($minInput.val(), 10);
    var maxPrice = parseInt($maxInput.val(), 10);
    var visible = 0;

    if (isNaN(minPrice)) {
      minPrice = sliderMin;
    }

    if (isNaN(maxPrice)) {
      maxPrice = sliderMax;
    }

    $listings.each(function () {
      var $card = $(this);
      var price = parseFloat($card.data('price'));
      var inRange = price >= minPrice && price <= maxPrice;
      var show = inRange && matchesSearch($card);

      $card.closest('.shop-listing-col, .col').toggle(show);

      if (show) {
        visible++;
      }
    });

    $('.shop-results-count').text(visible);
  }

  function syncSliderValues(minValue, maxValue) {
    if (minValue > maxValue) {
      maxValue = minValue;
      $maxInput.val(maxValue);
    }

    $slider.slider('values', [minValue, maxValue]);
    applyPriceFilter();
  }

  $slider.slider({
    range: true,
    orientation: 'horizontal',
    min: sliderMin,
    max: sliderMax,
    values: [sliderMin, sliderMax],
    step: 100,
    slide: function (event, ui) {
      if (ui.values[0] === ui.values[1]) {
        return false;
      }

      $minInput.val(ui.values[0]);
      $maxInput.val(ui.values[1]);
    },
    stop: function (event, ui) {
      $minInput.val(ui.values[0]);
      $maxInput.val(ui.values[1]);
      applyPriceFilter();
    }
  });

  $minInput.val(sliderMin);
  $maxInput.val(sliderMax);
  $minInput.attr({ min: sliderMin, max: sliderMax });
  $maxInput.attr({ min: sliderMin, max: sliderMax });

  $minInput.add($maxInput).on('change input', function () {
    var minValue = parseInt($minInput.val(), 10);
    var maxValue = parseInt($maxInput.val(), 10);

    if (isNaN(minValue)) {
      minValue = sliderMin;
    }

    if (isNaN(maxValue)) {
      maxValue = sliderMax;
    }

    syncSliderValues(minValue, maxValue);
  });
});
