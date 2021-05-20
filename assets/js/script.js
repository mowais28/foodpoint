$(window).scroll(function() {
    var height = $(window).scrollTop();

    if(height  > 100) {
        $(".navbar").css('background','rgb(0,0,0,0.8');
    }
    else{
        $(".navbar").css('background','transparent');
    }
});