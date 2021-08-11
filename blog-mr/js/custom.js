$(document).ready(function () {
    $(".my-toggler-icon1").click(function (e) {

        //  $("#blue-nav").toggle(500);
        // $(".navbar").toggle(100);
        $("#blue-nav").show();
        $("#blue-nav").animate({width:'60vw'});

        // $(".navbar").();
        $(".navbar").addClass("invisible");
        
        $(".fc2").show();
        
    });

    $(".my-toggler-icon2").click(function (e) {

        //  $("#blue-nav").toggle(500);
        // $(".navbar").toggle(100);
        // $("#blue-nav").show();
        $(".navbar").removeClass("invisible");
        $(".fc2").hide(200);
        $("#blue-nav").animate({width:'0'} ,{done:function(){$(".navbar").show();$("#blue-nav").hide();}});
        

        // $(".navbar").show(1000);
        
        
        
    });




});