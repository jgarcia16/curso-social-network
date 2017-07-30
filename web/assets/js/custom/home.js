$(document).ready(function(){

    $(".btn-img").unbind("click").click(function(){
        $(this).parent().find('.pub-image').fadeToggle();
    });


});