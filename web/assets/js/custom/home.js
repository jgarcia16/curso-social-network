$(document).ready(function(){

    $('[data-toggle="tooltip"]').tooltip();
    
    $(".btn-img").unbind("click").click(function(){
        $(this).parent().find('.pub-image').fadeToggle();
    });

    $('.btn-delete-pub').unbind('click').click(function(){
       $(this).parent().parent().addClass('hidden'); 
       
       $.ajax({
          url: URL+'/publication/remove/'+$(this).attr('data-id'),
          type:'GET',
          success:function(response){
              console.log(response);
          }
       });
    });
    
    

});