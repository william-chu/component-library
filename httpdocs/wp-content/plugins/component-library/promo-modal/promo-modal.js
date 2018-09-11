document.addEventListener("DOMContentLoaded", function() {
  const promoModal = document.getElementById('promo-modal-container');
  const promoModalCloseModal = document.getElementsByClassName('promo-modal-close-modal');
  const websiteBody = document.getElementsByTagName("html")[0];

  displayModal = () => {
    promoModal.style.opacity = "1";
    $('html').css('overflow','hidden');
  }
  setTimeout(displayModal, PRMdata.delay);

  hideModal = () => {
    promoModal.style.opacity = "0";
    $('html').css('overflow','auto');
  }

  removeModal = () => {
    promoModal.style.display = "none";
  }

  // When the user clicks on <span> (x), close the modal
  promoModalCloseModal[0].onclick = function() {
    hideModal();
    setTimeout(removeModal, 500);
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(e) {
    if (e.target == promoModal) {
      hideModal();
      setTimeout(removeModal, 500);
    }
  }
});
