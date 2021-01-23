

$(document).ready(function(){


//  Click sur une page 

    $('.page1').click(function(){

        $(this).toggleClass('primary-page').removeClass('pages');
        $('.page2, .page3, .page4').removeClass('primary-page').addClass('pages');
                
    });
    $('.page2').click(function(){

        $(this).toggleClass('primary-page').removeClass('pages');
        $('.page1, .page3, .page4').removeClass('primary-page').addClass('pages');
                
    });
    $('.page3').click(function(){

        $(this).toggleClass('primary-page').removeClass('pages');
        $('.page2, .page1, .page4').removeClass('primary-page').addClass('pages');
                
    });
    $('.page4').click(function(){

        $(this).toggleClass('primary-page').removeClass('pages');
        $('.page2, .page3, .page1').removeClass('primary-page').addClass('pages');
        
                
    });


});


