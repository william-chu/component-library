document.addEventListener("DOMContentLoaded", function() {
  const serviceAcc = document.getElementsByClassName("service-accordion-button");
  for (let i = 0; i < serviceAcc.length; i++) {
    serviceAcc[i].addEventListener("click", function() {
      this.classList.toggle("service-accordion-button-active");
      let serviceDetail = this.nextElementSibling;
      if (serviceDetail.style.maxHeight){
        serviceDetail.style.maxHeight = null;
      } else {
        serviceDetail.style.maxHeight = serviceDetail.scrollHeight + "px";
      }
    });
  }
});
