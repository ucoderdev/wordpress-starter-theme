// Fonts
import 'remixicon/fonts/remixicon.css';

// Style
import './style.scss';
import './pages.scss';

// Fancybox
import { Fancybox } from "@fancyapps/ui";
import "@fancyapps/ui/dist/fancybox/fancybox.css";

import WOW from "wow.js";

// jQuery
(function ($) {
  const winWidth = $(window).width();
  const winHeight = $(window).height();

  // Preloader hide
  $(window).load(function () {
    $("#preloader").fadeOut(400);
  });

  // Document ready
  $(document).ready(function () {
    jQueryRun();
  });

  // jQuery run
  window.jQueryRun = function () {
    // Fancybox
    Fancybox.bind("[data-fancybox]");

    // WOW
    wowLoad();

    // Background image
    $('[data-bg]').each(function () {
      const image = $(this).attr('data-bg');

      if (image !== undefined && image !== '') {
        $(this).css('background-image', 'url(' + image + ')');
      }
    });

    // Mailto
    $('[data-mailto]').on('click', function (e) {
      const email = $(this).attr('data-mailto');

      if (email !== undefined && email != '') {
        e.preventDefault();

        window.location.href = "mailto:" + email;
      }
    });

    // Height
    $('[data-height]').each(function () {
      const height = $(this).attr('data-height');

      if (height == 'full') {
        $(this).css('min-height', winHeight + 'px');
      } else {
        $(this).css('min-height', height);
      }
    });
  }

  // WOW
  window.wowLoad = function () {
    const wow = new WOW(
      {
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 100,
        mobile: true,
        live: false,
      }
    );

    wow.init();
  }
})(jQuery);