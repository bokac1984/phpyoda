
$(document).ready(function(){
    
// //saved for later    
//    $(window).scroll(function () {
//        var masthead = $('.masthead').height();
//            if ($(this).scrollTop() > masthead) {
//				console.log('yes');
//			} else {
//				console.log('no');
//			}
//		});
    
    if ($(".test").length > 0) {
        $('.test').roundabout();
    }
//    
//    $(document).on(
//    {
//        mouseenter: function() 
//        {
//            $(this).append('<div class="remove-port"><i class="glyphicon glyphicon-trash"></i></div>')
//        },
//        mouseleave: function()
//        {
//            $('.remove-port').remove();
//        }
//    }
//    , ".portfolios .loggedin .wrapper");
    
    $(document).on('click', '.remove-port', function(){
        var answer = confirm('Are you sure');
        var removeDiv = $(this).parent();
        if (answer) {
            var rm = {};
            rm.id = removeDiv.attr('data-id');
            $.ajax({
                type: 'POST',
                url: '/Portfolios/delete',
                data: rm,
                dataType: "json",
                success: function(data) {
                    if (data.success) {
                        var del = removeDiv.parent();
                        del.hide('slow', function(){
                            del.remove();
                        });
                    } else {
                        alert(data.message);
                    }
                }
            });
        }
    });
    
    $(document).on('click', '#contact-btn', function(e){
        e.preventDefault();
        var button = $(this);
        $(this).html('<i class="blogicon icon-loading"></i> Sending...').addClass('disabled');
        $("#ContactAddForm .label3").each(function(){
            $(this).remove();
        });
        $.ajax({
            type: 'POST',
            url: '/Contacts/add',
            data: $("#ContactAddForm").serialize(),
            dataType: "json",
            success: function(data) {
                button.html('Send Message').removeClass('disabled');
                console.log(typeof data.success)
                if (data.success) {
                    $('.contact-form').empty().html(data.message);
                } else {
                    processErrors(data.message, "#Contact");
                }
            }
        });
    });
    
    if ($(".tags-input").length > 0) { // if there is element on the page
        $(".tags-input").removeAttr('required');
        $(".tags-input").tagit({
            tagSource: function(search, showChoices){
				var that = this;
				if(search.term && search.term.length > 1 ){
					$.ajax({
						url: "/Portfolios/getTags",
						type: 'POST',
						data: {search: search.term},
						success: function(data) {
                            var json = $.parseJSON(data);
                            showChoices(that._subtractArray(json.choices, that.assignedTags()));
						}
					});
				}
			}
        });
    }
});