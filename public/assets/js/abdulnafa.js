$(document).ready(function(){


$(".turnlefthead").on("click",function(){


$(".turnleftcontent").each(function(){

$(this).removeClass("active");
});


$(this).next(".turnleftcontent").addClass("active");





});



});