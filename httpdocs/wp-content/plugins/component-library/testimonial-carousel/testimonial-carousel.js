$(document).ready(function() {
  let changeSlide;
  let current = 1;
  const max = $('.testimonial-carousel-slide' ).length + 1;
  function testimonialCarouselBack() {
    $('.testimonial-carousel-slide').hide();
    current -= 1;
    if (current === 0) {
      current = max - 1;
    }
    $(`.testimonial-carousel-slide:nth-child(` + current + `)`).fadeIn(300);
  }
  function testimonialCarouselForward() {
    $('.testimonial-carousel-slide').hide();
    current += 1;
    if (current === max) {
      current = 1;
    }
    $(`.testimonial-carousel-slide:nth-child(` + current + `)`).fadeIn(300);
  }
  function testimonialCarouselCycleSlide() {
    changeSlide = setInterval(function() {
      testimonialCarouselForward();
    }, 10000);
  }
  function testimonialCarouselStopCycle() {
    clearInterval(changeSlide);
    changeSlide = 0;
  }
  $('#back-click').click(function() {
    testimonialCarouselStopCycle();
    testimonialCarouselBack();
    testimonialCarouselCycleSlide();
  });
  $('#forward-click').click(function() {
    testimonialCarouselStopCycle();
    testimonialCarouselForward();
    testimonialCarouselCycleSlide();
  });
  testimonialCarouselCycleSlide();
});
