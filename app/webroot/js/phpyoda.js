$(document).ready(function(){

    
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