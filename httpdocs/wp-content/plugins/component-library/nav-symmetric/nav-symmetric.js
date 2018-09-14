document.addEventListener("DOMContentLoaded", function() {
  const navSymmetricContainer = document.getElementById('nav-symmetric-container');
  const navSymmetricModal = document.getElementById('nav-symmetric-modal');
  const navSymmetricMenuBtn = document.getElementById('nav-symmetric-menu-button');
  let navSymmetricModalDisplayed = false;
  // When the user clicks on the button, open or close the modal, prevent scrolling of background
  if (navSymmetricMenuBtn !== null) {
    navSymmetricMenuBtn.onclick = function() {
      if (navSymmetricModalDisplayed === true) {
        navSymmetricModalDisplayed = false;
        navSymmetricModal.style.width = "0";
        $('html').css('overflow','auto');
      } else {
        navSymmetricModalDisplayed = true;
        navSymmetricModal.style.width = "75%";
        $('html').css('overflow','hidden');
      }
    }
  }
  // Close modal on window resize
  window.addEventListener("resize", function() {
    navSymmetricModalDisplayed = false;
    if (navSymmetricModal !== null) {
      navSymmetricModal.style.width = "0";
    }
    $('html').css('overflow','auto');
  });
});
