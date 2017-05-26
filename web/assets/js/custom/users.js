/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    
jQuery.ias({
           container: '.box-users',
           item:'.user-item',
           pagination:'.pagination',
           next:'.pagination .next_link',
           tresholdMargin:5,
           loader: '<img src='+URL+'"assets/images/ajax-loader.gif"/>'
               });
               

    
});