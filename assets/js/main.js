
$(function () {

  $('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
    if (!$(this).next().hasClass('show')) {
      $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
    }
    var $subMenu = $(this).next(".dropdown-menu");

    $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
		  $('.submenu .show').removeClass("show");

		});

    return false;
  });

  $(document).ready(function() {
    $(window).on("scroll", function() {
      $(this).scrollTop() > 300 ? $(".back-to-top").fadeIn() : $(".back-to-top").fadeOut()
    }), $(".back-to-top").on("click", function() {
      return $("html, body").animate({
        scrollTop: 0
      }, 600),!1
    })
  });

});

