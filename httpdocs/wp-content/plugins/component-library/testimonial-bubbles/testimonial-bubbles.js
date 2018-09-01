$(document).ready(function() {
  let current = 1;
  const max = $('.testimonial-bubbles-slide' ).length + 1;
  function testimonialBubblesForward() {
    jQuery('.testimonial-bubbles-slide').hide();
    current += 3;
    if (current >= max) {
      current = 1;
    }
    $(`.testimonial-bubbles-slide:nth-child(` + current + `)`).fadeIn(300);
    $(`.testimonial-bubbles-slide:nth-child(` + (current + 1) + `)`).fadeIn(300);
    $(`.testimonial-bubbles-slide:nth-child(` + (current + 2) + `)`).fadeIn(300);
  }
  let changeSlide;
  function testimonialBubblesCycleSlide() {
    changeSlide = setInterval(function() {
      testimonialBubblesForward();
    }, 10000);
  }
  testimonialBubblesCycleSlide();
});
