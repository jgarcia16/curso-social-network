/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    
/*jQuery.ias({
           container: '.box-users',
           item:'.user-item',
           pagination:'.pagination',
           next:'.pagination .next_link',
           tresholdMargin:5,
           loader: '<img src='+URL+'"assets/images/ajax-loader.gif"/>'
               });
               

    
});*/
    
    followButtons();
    
    function followButtons(){
       $(".btn-follow").unbind("click").click(function(){
                   $.ajax({
                       url: URL+'/follow',
                       type: 'POST',
                       data: {followed: $(this).attr("data-followed")},
                       succes: function(response){
                           console.log(response);
                       }
                   }
                    );
       });
       
            $(".btn-unfollow").unbind("click").click(function(){
                   $.ajax({
                       url: URL+'/unfollow',
                       type: 'POST',
                       data: {followed: $(this).attr("data-followed")},
                       succes: function(response){
                           console.log(response);
                       }
                   }
                    );
       });
    }
    
});