const catServiceList = PMdata.cat_plan_services.split(',').map(item => item.trim());
const catBasicService = PMdata.cat_basic_service.split(',').map(item => item.trim());
const catPlusService = PMdata.cat_plus_service.split(',').map(item => item.trim());
const catEliteService = PMdata.cat_elite_service.split(',').map(item => item.trim());
const dogServiceList = PMdata.dog_plan_services.split(',').map(item => item.trim());
const dogBasicService = PMdata.dog_basic_service.split(',').map(item => item.trim());
const dogPlusService = PMdata.dog_plus_service.split(',').map(item => item.trim());
const dogEliteService = PMdata.dog_elite_service.split(',').map(item => item.trim());
const catChartModal = document.getElementById('cat-chart-modal');
const catChartDetailBtn = document.getElementById('cat-chart-detail-button');
const dogChartModal = document.getElementById('dog-chart-modal');
const dogChartDetailBtn = document.getElementById('dog-chart-detail-button');
const closeModal = document.getElementsByClassName("close-modal");
const mainContainer = document.getElementById('plan-menu-container');
genServiceList = (serviceName) => {
  let service = document.createElement('p');
  let serviceLabel = document.createTextNode(serviceName);
  service.appendChild(serviceLabel);
  return service;
}
genIconList = (isInPlan) => {
  let service = document.createElement('p');
  if (isInPlan === 'yes') {
    let icon = document.createElement('i');
    icon.classList.add('far');
    icon.classList.add('fa-check-square');
    service.appendChild(icon);
  }
  return service;
}
catServiceList.forEach(function(item) {
  document.getElementById('plan-menu-cat-service-list').appendChild(genServiceList(item));
});
catBasicService.forEach(function(item) {
  document.getElementById('plan-menu-cat-basic-plan').appendChild(genIconList(item));
});
catPlusService.forEach(function(item) {
  document.getElementById('plan-menu-cat-plus-plan').appendChild(genIconList(item));
});
catEliteService.forEach(function(item) {
  document.getElementById('plan-menu-cat-elite-plan').appendChild(genIconList(item));
});
dogServiceList.forEach(function(item){
  document.getElementById('plan-menu-dog-service-list').appendChild(genServiceList(item));
});
dogBasicService.forEach(function(item) {
  document.getElementById('plan-menu-dog-basic-plan').appendChild(genIconList(item));
});
dogPlusService.forEach(function(item) {
  document.getElementById('plan-menu-dog-plus-plan').appendChild(genIconList(item));
});
dogEliteService.forEach(function(item) {
  document.getElementById('plan-menu-dog-elite-plan').appendChild(genIconList(item));
});
// When the user clicks on the button, open the modal, prevent scrolling of background
catChartDetailBtn.onclick = function() {
  catChartModal.style.display = "block";
  mainContainer.className = "plan-menu-container blur";
  $('html').css('overflow','hidden');
}
dogChartDetailBtn.onclick = function() {
  dogChartModal.style.display = "block";
  mainContainer.className = "plan-menu-container blur";
  $('html').css('overflow','hidden');
}
// When the user clicks on <span> (x), close the modal
closeModal[0].onclick = function() {
  catChartModal.style.display = "none";
  mainContainer.className = "plan-menu-container";
  $('html').css('overflow','auto');
}
closeModal[1].onclick = function() {
  dogChartModal.style.display = "none";
  mainContainer.className = "plan-menu-container";
  $('html').css('overflow','auto');
}
