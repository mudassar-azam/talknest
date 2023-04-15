$(document).ready(function(){


$(".turnlefthead").on("click",function(){


$(".turnleftcontent").each(function(){

$(this).removeClass("active");
});


$(this).next(".turnleftcontent").addClass("active");





});




// ---------------------------------Dashboard ---------------------------------------


$(".dashboardtabshead ul li").on("click",function(){


$(".dashboardtabshead ul li").each(function(){

$(this).removeClass("active");

});


$(this).addClass("active");


});



});