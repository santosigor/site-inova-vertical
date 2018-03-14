$(document).ready(function() {

  $('#clientes').owlCarousel({
    //stagePadding: 100,
    loop:true,
    nav:true,
    navText: ["&larr;","&rarr;"],
    responsive:{
      0:{
        items:2
      },
      600:{
        items:3
      },
      1000:{
        items:4
      }
    }
  });

});