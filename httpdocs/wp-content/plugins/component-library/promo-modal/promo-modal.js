document.addEventListener("DOMContentLoaded", function() {
  const promoModal = document.getElementById('promo-modal-container');
  const promoModalCloseModal = document.getElementsByClassName('promo-modal-close-modal');
  const websiteBody = document.getElementsByTagName("html")[0];

  displayModal = () => {
    promoModal.style.opacity = "1";
    $('html').css('overflow','hidden');
  }
  setTimeout(displayModal, PRMdata.delay);

  // When the user clicks on <span> (x), close the modal
  promoModalCloseModal[0].onclick = function() {
    promoModal.style.opacity = "0";
    promoModal.style.display = "none";
    $('html').css('overflow','auto');
  }
});
