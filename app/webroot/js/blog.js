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
    
        
    $(document).on('click', '#comment-btn', function(e){
        e.preventDefault();
        var button = $(this);
        $(this).html('<img src="../../../img/ajax-loader.gif" /> Sending...').addClass('disabled');
        $("#CommentAddForm .label-warning").each(function(){
            $(this).remove();
        });
        $.ajax({
            type: 'POST',
            url: '/blog/Comments/add',
            data: $("#CommentAddForm").serialize(),
            dataType: "json",
            success: function(data) {
                button.html('Comment').removeClass('disabled');
                console.log(typeof data.success)
                if (data.success) {
                    $('.contact-form').empty().html(data.message);
                } else {
                    processErrors(data.message, "#Comment");
                }
            }
        });
    });
});
