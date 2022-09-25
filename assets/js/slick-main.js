$(document).ready(function () {
        
    $('.wed_slider').slick({
dots: true,
infinite: true,
arrows: false,
speed: 300,
slidesToShow: 3,
slidesToScroll: 1,
autoplay: true,
autoplaySpeed: 1200,
responsive: [
{
  breakpoint: 1024,
  settings: {
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: true,
    dots: true
  }
},
{
  breakpoint: 600,
  settings: {
    slidesToShow: 2,
    slidesToScroll: 1
  }
},
{
  breakpoint: 480,
  settings: {
    slidesToShow: 2,
    slidesToScroll: 1
  }
}
]
});

});