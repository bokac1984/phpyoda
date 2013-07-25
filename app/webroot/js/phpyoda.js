$(document).ready(function(){
    $(document).on(
    {
        mouseenter: function() 
        {
            $(this).animate({'font-size': '5em'}, 300);
            var margin = parseInt($(this).width());
        },
        mouseleave: function()
        {

            $(this).css('font-size', '4em');
                                    var margin = parseInt($(this).width());
            console.log(margin);
        }
    }
    , ".home-page li");
    
    $(document).on('click', '#contact-btn', function(e){
        e.preventDefault();
        $(this).html('<img src="../img/ajax-loader.gif" /> Sending...').addClass('disabled');
        $.ajax({
            type: 'POST',
            url: '/Contacts/add',
            data: $("#ContactAddForm").serialize(),
            dataType: "html",
            success: function(data) {
                $(".contact-form").empty();
                $(".contact-form").html(data);
            },
            error: function(response, status) {
                
            }
        });
    });

});
