$(document).ready(function(){
    
    if ($('.masthead').is(':visible')) {
        console.log('yes');
    } else {
        console.log('no');
    }
    
    $(window).scroll(function () {
        var masthead = $('.masthead').height();
            if ($(this).scrollTop() > masthead) {
				console.log('yes');
			} else {
				console.log('no');
			}
		});
    
    $(document).on(
    {
        mouseenter: function() 
        {
            $(this).append('<div class="remove-port"><i class="icon-trash"></i></div>')
        },
        mouseleave: function()
        {
            $('.remove-port').remove();
        }
    }
    , ".portfolios .loggedin li .thumbnail");
    
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
        $(this).html('<img src="../img/ajax-loader.gif" /> Sending...').addClass('disabled');
        $("#ContactAddForm .label-warning").each(function(){
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
                    processErrors(data.message);
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
                            console.log(json);
                            showChoices(that._subtractArray(json.choices, that.assignedTags()));
						}
					});
				}
			}
        });
    }
});

function processErrors(errorArr) {
    for (key in errorArr) {
        var name = capitalize(key);
        $("#Contact"+name).before('<span class="label label-warning" style="margin-bottom: 5px;">'+errorArr[key][0]+'</span>');
    }
}

function capitalize(a) {
    s = [];
    for (var i=0; i<a.length; i++) {
        if (i == 0) {
            s.push(a[i].charAt(i).toUpperCase());
        } else {
            s.push(a[i]);
        }
    }
    s = s.join('');
    return s;
}