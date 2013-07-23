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
});


