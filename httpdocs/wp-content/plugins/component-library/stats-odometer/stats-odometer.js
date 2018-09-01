document.addEventListener("DOMContentLoaded", function() {
  // Delays odometer until it is in scrollview
  $.fn.isInViewport = function() {
    const elementTop = $(this).offset().top;
    const elementBottom = elementTop + $(this).outerHeight();
    const viewportTop = $(window).scrollTop();
    const viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
  };

  $(window).on('resize scroll', function() {
    $('.odometer').each(function() {
      if ($(this).isInViewport()) {

        setTimeout(function(){
          odometer1.innerHTML = SOdata.value1;
      }, 1500);
      setTimeout(function(){
          odometer2.innerHTML = SOdata.value2;
      }, 1500);
      setTimeout(function(){
          odometer3.innerHTML = SOdata.value3;
      }, 1500);
      } else {
      }
    });
  });
});
