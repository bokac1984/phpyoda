$(document).ready(function() {
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


  $(document).on('click', '#comment-btn', function(e) {
    e.preventDefault();
    var button = $(this);
    $(this).html('<i class="blogicon icon-loading"></i> Sending...').addClass('disabled');
    $("#CommentAddForm .label3").each(function() {
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

//    $(document).on('click', '#publish, #save', function(e){
//        e.preventDefault();
//        alert($(this));
//    });

  $(document).on('click', '.publish, .unpublish', function(e) {
    e.preventDefault();
    var that = $(this);
    var classNam = that.attr('data-published') == 0 ? "publish" : "unpublish";
    var data = {};
    var icon = that.attr('data-published') == 0 ? "ok" : "remove";
    
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
          that.empty().html('<i class="glyphicon glyphicon-' + icon + '"></i>').removeClass().addClass(classNam);
          that.attr('data-published', data.message == true ? "1" : "0");
        } else {
          alert(data.message);
        }
      }
    });
  });

  // function called when modal is initialized
  $('#new-cat').on('show.bs.modal', function() {
    $("#new-cat-form").find('.label').remove();
    $("#new-cat-form").find('input').val('');
  });

  //Press Enter in INPUT moves cursor to next INPUT
  $("#new-cat-form").find('input').keypress(function(e) {
    if (e.which == 13) // Enter key = keycode 13
    {
      return false;
    }
  });

  $(document).on('click', '#save-cat', function(e) {
    e.preventDefault();
    var that = $(this);
    var prevHtml = that.html();
    var categoryForm = $("#new-cat-form");
    that.attr('disabled', 'disabled').html('Saving...');
    var data = categoryForm.serialize();
    categoryForm.find('.label').remove();
    $.ajax({
      type: 'POST',
      url: '/blog/Categories/add',
      data: data,
      dataType: "json",
      success: function(data) {
        that.removeAttr("disabled");
        that.empty().html(prevHtml);

        if (data.success) {
          console.log(data.message);
          $('#PostCategoryId')
                  .append($("<option></option>")
                          .attr("value", data.message.id)
                          .text(data.message.name)
                          );
          $("#PostCategoryId option[value='" + data.message.id + "']").attr('selected', 'selected');
          $("#close-save-modal").click();
        } else {
          var message = '<div class="label label-warning">' + data.message.name + '</div>';
          categoryForm.find('input').after(message);
        }
      }
    });
  });

  $(document).on('change', 'input[name="check-all"]', function() {
    $('.comment-ids').prop("checked", this.checked);
  });
  
  $(document).on('click', '.table-responsive .com-actions-ul li a', function(e){
    e.preventDefault();
    if ($(this).attr('data-status') === 'reply') {
      replyComment();
      return false;
    }
    var parent = $(this).parents('tr');
    var data = {
      id: $(this).attr('id'),
      status: $(this).attr('data-status')
    };
    $.ajax({
      type: 'POST',
      url: '/blog/Comments/ajaxAction',
      data: data,
      dataType: "json",
      success: function(data) {
        if (data.success) {
          parent.fadeOut(1000, function(){
            parent.remove();
          });
        } else {
          
        }
      }
    });
    
  });
});

function replyComment() {
  $('#reply-modal').modal();
}