 (function($) {
  "use strict"; // Start of use strict

  // Tooltip
  $('[data-toggle="tooltip"]').tooltip();

  // Select Quantity 
  $('.plus').on('click', function() {
    if ($(this).prev().val()) {
      $(this).prev().val(+$(this).prev().val() + 1);
    }
  });
  $('.minus').on('click', function() {
    if ($(this).next().val() > 1) {
      if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
    }
  });
  
  // Offer Slider
  $('.offer-slider').slick({
    centerMode: true,
    slidesToShow: 2,
    centerPadding: '30px',
    slidesToScroll: 2,
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: false
  });

  // Category Slider
  $('.cat-slider').slick({
    centerMode: true,
    slidesToShow: 4,
    centerPadding: '30px',
    slidesToScroll: 4,
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: false
  });

  // Trending Slider
  $('.trending-slider').slick({
      centerMode: true,
      centerPadding: '30px',
      slidesToShow: 1,
      arrows: false,
      responsive: [{
              breakpoint: 768,
              settings: {
                  arrows: false,
                  centerMode: true,
                  centerPadding: '40px',
                  slidesToShow: 2
              }
          },
          {
              breakpoint: 480,
              settings: {
                  arrows: false,
                  centerMode: true,
                  centerPadding: '40px',
                  slidesToShow: 1
              }
          }
      ]
  });

  // Osahan Slider
  $('.osahan-slider').slick({
      centerMode: false,
      slidesToShow: 1,
      arrows: false,
      dots: true
  });

  // osahan-slider-map
  $('.osahan-slider-map').slick({
      centerMode: true,
      centerPadding: '30px',
      slidesToShow: 2,
      arrows: false,
      responsive: [{
              breakpoint: 768,
              settings: {
                  arrows: false,
                  centerMode: true,
                  centerPadding: '40px',
                  slidesToShow: 3
              }
          },
          {
              breakpoint: 480,
              settings: {
                  arrows: false,
                  centerMode: true,
                  centerPadding: '40px',
                  slidesToShow: 3
              }
          }
      ]
  });

  // Nav
  var $main_nav = $('#main-nav');
  var $toggle = $('.toggle');
  var defaultOptions = {
      disableAt: false,
      customToggle: $toggle,
      levelSpacing: 40,
      navTitle: 'KhateRaho',
      levelTitles: true,
      levelTitleAsBack: true,
      pushContent: '#container',
      insertClose: 2
  };
  
  // call our plugin
  var Nav = $main_nav.hcOffcanvasNav(defaultOptions);

  // Flag Number
  var input = document.querySelector("#phone");
 

})(jQuery); // End of use strict