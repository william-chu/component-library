document.addEventListener("DOMContentLoaded", function() {
  const navHoursContainer = document.getElementById('nav-hours-container');
  const navHoursModal = document.getElementById('nav-hours-modal');
  const navHoursMenuBtn = document.getElementById('nav-hours-menu-button');
  let navHoursModalDisplayed = false;
  // When the user clicks on the button, open or close the modal, prevent scrolling of background
  if (navHoursMenuBtn !== null) {
    navHoursMenuBtn.onclick = function() {
      if (navHoursModalDisplayed === true) {
        navHoursModalDisplayed = false;
        navHoursModal.style.width = "0";
        $('html').css('overflow','auto');
      } else {
        navHoursModalDisplayed = true;
        navHoursModal.style.width = "75%";
        $('html').css('overflow','hidden');
      }
    }
  }
  // Close modal on window resize
  window.addEventListener("resize", function() {
    navHoursModalDisplayed = false;
    if (navHoursModal !== null) {
      navHoursModal.style.width = "0";
    }
    $('html').css('overflow','auto');
  });

  // Toggle cat image
  $(".nav-hours-fullscreen ul.menu a").hover(function(){
    $("#nav-hours-cat-looking-up").hide();
    $("#nav-hours-cat-looking-down").show();
  }, function(){
    $("#nav-hours-cat-looking-down").hide();
    $("#nav-hours-cat-looking-up").show();
  });
});
