document.addEventListener("DOMContentLoaded", function() {
  const navPetsContainer = document.getElementById('nav-pets-container');
  const navPetsModal = document.getElementById('nav-pets-modal');
  const navPetsMenuBtn = document.getElementById('nav-pets-menu-button');
  let navPetsModalDisplayed = false;
  // When the user clicks on the button, open or close the modal, prevent scrolling of background
  if (navPetsMenuBtn !== null) {
    navPetsMenuBtn.onclick = function() {
      if (navPetsModalDisplayed === true) {
        navPetsModalDisplayed = false;
        navPetsModal.style.width = "0";
        $('html').css('overflow','auto');
      } else {
        navPetsModalDisplayed = true;
        navPetsModal.style.width = "75%";
        $('html').css('overflow','hidden');
      }
    }
  }
  // Close modal on window resize
  window.addEventListener("resize", function() {
    navPetsModalDisplayed = false;
    if (navPetsModal !== null) {
      navPetsModal.style.width = "0";
    }
    $('html').css('overflow','auto');
  });

  // Toggle cat image
  $(".nav-pets-fullscreen ul.menu a").hover(function(){
    $("#nav-pets-cat-looking-up").hide();
    $("#nav-pets-cat-looking-down").show();
  }, function(){
    $("#nav-pets-cat-looking-down").hide();
    $("#nav-pets-cat-looking-up").show();
  });
});
