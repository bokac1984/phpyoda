/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    $('.edit-post').hide();
    $('.delete-post').hide();
    
    $(document).on(
    {
        mouseenter: function() 
        {
            $(this).find('.edit-post').show();
            $(this).find('.delete-post').show();
        },
        mouseleave: function()
        {
            $(this).find('.edit-post').hide();
            $(this).find('.delete-post').hide();
        }
    }
    , ".blogpost-title");
    
        
    $(document).on('click', '#comment-btn', function(e){
        e.preventDefault();
        var button = $(this);
        $(this).html('<i class="blogicon icon-loading"></i> Sending...').addClass('disabled');
        $("#CommentAddForm .label3").each(function(){
            $(this).remove();
        });
        $.ajax({
            type: 'POST',
            url: '/blog/Comments/add',
            data: $("#CommentAddForm").serialize(),
            dataType: "json",
            success: function(data) {
                button.html('Comment').removeClass('disabled');
                if (data.success) {
                    $('.comment-form').empty().html(data.message);
                } else {
                    processErrors(data.message, "#Comment");
                }
            }
        });
    });
    
    $(document).on('click', '#publish, #save', function(e){
        e.preventDefault();
        alert($(this));
    });
    
    $(document).on('click', '.publish, .unpublish', function(e){
        e.preventDefault();
        var that = $(this);
        var classNam = that.attr('class') == "publish" ? "unpublish" : "publish";
        var data = {};
        var icon = classNam == "publish" ? "ok" : "remove";

        that.empty().html('<i class="blogicon icon-loading"></i>');
        data.id = that.attr('id');
        data.published = that.attr('data-published');
        $.ajax({
            type: 'POST',
            url: '/blog/Posts/publish',
            data: data,
            dataType: "json",
            success: function(data) {
                if (data.success) {
                    that.empty().html('<i class="glyphicon glyphicon-'+icon+'"></i>').removeClass().addClass(classNam);
                    that.attr('data-published', data.message == true ? "1" : "0");
                } else {
                    alert(data.message);
                }
            }
        });
    });
    
    $(document).on('click', '#save-cat', function(e){
        e.preventDefault();
        var that = $(this);
        var prevHtml = that.html();
        var categoryForm = $("#new-cat-form");
        that.attr('disabled', 'disabled').html('Saving...');
        var data = categoryForm.serialize();
        $.ajax({
            type: 'POST',
            url: '/blog/Categories/add',
            data: data,
            dataType: "json",
            success: function(data) {
              that.removeAttr("disabled");
              that.empty().html(prevHtml);
              if (data.success) {
                   $("#close-save-modal").click();
              } else {
                categoryForm.find()l
                  alert(data.message);
              }
            }
        });
    });
});