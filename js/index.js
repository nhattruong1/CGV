$('.slider-nav').slick({
    focusOnSelect: true,
    speed: 400,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay:true,
    responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
      ]
});