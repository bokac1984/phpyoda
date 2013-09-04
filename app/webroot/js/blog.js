/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    $('.edit-post').hide();
    $(document).on(
    {
        mouseenter: function() 
        {
            $(this).find('.edit-post').show();
        },
        mouseleave: function()
        {
            $(this).find('.edit-post').hide();
        }
    }
    , ".blogpost-title");
});
