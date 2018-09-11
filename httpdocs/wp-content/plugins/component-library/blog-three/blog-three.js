$(document).ready(function() {
const movementStrength = 15;
const width = movementStrength / $(".blog-three-container-rail").width();
const height = movementStrength / $(".blog-three-container").height();
  $(".blog-three-container").mousemove(function(e){
    let pageX = e.pageX - ($(".blog-three-container-rail").width() / 2);
    let pageY = e.pageY - ($(".blog-three-container").height() / 2);
    let newvalueXP1 = width * pageX * -1 + 45;
    let newvalueYP1 = height * pageY * -1 + 70;
    let newvalueXP2 = width * pageX + 125;
    let newvalueYP2 = height * pageY + 100;
    let newvalueXP3 = width * pageX + 135;
    let newvalueYP3 = height * pageY + 80;
    let newvalueXP4 = width * pageX * -1 + 35;
    let newvalueYP4 = height * pageY * -1 + 75;
    $('#blog-three-cat-print1').css("left", newvalueXP1 + "px").css("top", newvalueYP1 + "px");
    $('#blog-three-cat-print2').css("left", newvalueXP2 + "px").css("top", newvalueYP2 + "px");
    $('#blog-three-dog-print3').css("right", newvalueXP3 + "px").css("bottom", newvalueYP3 + "px");
    $('#blog-three-dog-print4').css("right", newvalueXP4 + "px").css("bottom", newvalueYP4 + "px");
  });
});
