$(function () {
  function normalise(value) {
    return (value || '').toLowerCase().trim();
  }

  function initSearchableSelect($root) {
    var options = $root.data('options') || [];
    var $hidden = $root.find('input[type="hidden"]').first();
    var $input = $root.find('input[role="combobox"]').first();
    var $menu = $root.find('.searchable-select-menu').first();
    var activeIndex = -1;

    function setValue(value) {
      $hidden.val(value);
      $input.val(value);
      $root.trigger('searchable-select:change', [value]);
    }

    function renderMenu(filter) {
      var needle = normalise(filter);
      var matches = options.filter(function (option) {
        return needle === '' || normalise(option).indexOf(needle) !== -1;
      });

      $menu.empty();
      activeIndex = -1;

      if (!matches.length) {
        $menu.append(
          $('<li>', {
            class: 'searchable-select-empty px-3 py-2 text-body-secondary',
            text: 'No matches found',
          })
        );
        return;
      }

      matches.forEach(function (option) {
        var $item = $('<li>', {
          class: 'searchable-select-option px-3 py-2',
          role: 'option',
          text: option,
        });

        $item.on('mousedown', function (event) {
          event.preventDefault();
          setValue(option);
          closeMenu();
        });

        $menu.append($item);
      });
    }

    function openMenu() {
      renderMenu($input.val());
      $menu.prop('hidden', false);
      $input.attr('aria-expanded', 'true');
      $root.addClass('is-open');
    }

    function closeMenu() {
      $menu.prop('hidden', true);
      $input.attr('aria-expanded', 'false');
      $root.removeClass('is-open');
      activeIndex = -1;
      $menu.find('.is-active').removeClass('is-active');
    }

    function highlightIndex(index) {
      var $items = $menu.find('.searchable-select-option');
      if (!$items.length) {
        return;
      }

      if (index < 0) {
        index = $items.length - 1;
      } else if (index >= $items.length) {
        index = 0;
      }

      activeIndex = index;
      $items.removeClass('is-active');
      $items.eq(activeIndex).addClass('is-active');
    }

    $input.on('focus', openMenu);
    $input.on('click', openMenu);

    $input.on('input', function () {
      openMenu();
    });

    $input.on('keydown', function (event) {
      var $items = $menu.find('.searchable-select-option');

      if (event.key === 'ArrowDown') {
        event.preventDefault();
        if ($menu.prop('hidden')) {
          openMenu();
        }
        highlightIndex(activeIndex + 1);
      } else if (event.key === 'ArrowUp') {
        event.preventDefault();
        if ($menu.prop('hidden')) {
          openMenu();
        }
        highlightIndex(activeIndex - 1);
      } else if (event.key === 'Enter') {
        if (!$menu.prop('hidden') && activeIndex >= 0 && $items.eq(activeIndex).length) {
          event.preventDefault();
          setValue($items.eq(activeIndex).text());
          closeMenu();
        }
      } else if (event.key === 'Escape') {
        closeMenu();
      }
    });

    $input.on('blur', function () {
      window.setTimeout(function () {
        closeMenu();
        if (!$hidden.val() && options.length) {
          setValue(options[0]);
        } else if ($hidden.val() && options.indexOf($hidden.val()) === -1) {
          $input.val($hidden.val());
        } else {
          $input.val($hidden.val());
        }
      }, 150);
    });

    if (!$hidden.val() && options.length) {
      setValue(options[0]);
    }
  }

  $('[data-searchable-select]').each(function () {
    initSearchableSelect($(this));
  });

  window.initCheckoutLocationFields = function () {
    var $countryRoot = $('[data-checkout-country]');
    var $provinceSelectWrap = $('[data-checkout-province-select]');
    var $provinceTextWrap = $('[data-checkout-province-text]');
    var $provinceSelect = $('#ChooseProvince');

    function syncProvinceField(country) {
      var isSouthAfrica = country === 'South Africa';

      $provinceSelectWrap.toggleClass('d-none', !isSouthAfrica);
      $provinceTextWrap.toggleClass('d-none', isSouthAfrica);
      $provinceSelect.prop('disabled', !isSouthAfrica);
    }

    $countryRoot.on('searchable-select:change', function (_event, country) {
      syncProvinceField(country);
    });

    syncProvinceField($countryRoot.find('input[type="hidden"]').val());
  };

  if (typeof window.initCheckoutLocationFields === 'function') {
    window.initCheckoutLocationFields();
  }
});
