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



$(".righttopdashboardtabshead ul li").on("click",function(){


    $(".righttopdashboardtabshead ul li").each(function(){
    
    $(this).removeClass("active");
    
    });
    
    
    $(this).addClass("active");
    
    
    });



    $(".righttopdashboardtabshead ul li").on("click",function(){


        $(".righttopdashboardtabshead ul li").each(function(){
        
        $(this).removeClass("active");
        
        });
        
        
        $(this).addClass("active");
        
        
        });





        

    $(".rightbottomdashboardtabshead ul li").on("click",function(){


        $(".rightbottomdashboardtabshead ul li").each(function(){
        
        $(this).removeClass("active");
        
        });
        
        
        $(this).addClass("active");
        
        
        });
    
    


// ---------------------------------------------Chart Js-----------------------------------------------------


const xValues = [50,60,70,80,90,100,110,120,130,140,150];
const yValues = [7,8,8,9,9,9,10,11,14,14,15];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 6, max:16}}],
    }
  }
});










// Jquery End Code 
});