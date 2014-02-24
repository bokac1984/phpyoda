$(document).ready(function() {
  if ($(".fancybox").length > 0) {
    $(".fancybox").fancybox({
      loop: false,
      afterLoad: function(current, previous){
        setViews($(this.element).attr("data-id"));
      }
    }); 
  } 
  
  $(document).on('click', '.album', function(e){
    e.preventDefault();
    
    var id = $(this).attr('data-id');
    window.location.href += "/view/"+id;
  });
  
  
  $(document).on('click', '.select-objects', function(e){
    e.preventDefault();
    var $obj = $(this);
    if ( !$obj.hasClass('selected-image') ) {
      $obj.addClass('selected-image');
    } else {
      $obj.removeClass('selected-image');
    }
  });
  
    $(document).on('click', '.select-objects', function(e){
    e.preventDefault();
    var $obj = $(this);
    if ( !$obj.hasClass('selected-image') ) {
      $obj.addClass('selected-image');
    } else {
      $obj.removeClass('selected-image');
    }
  });
});

function setViews(id) {
  $.ajax({
      type: 'POST',
      url: '/photo/pictures/updateViews',
      data: {id: id},
      success: function(data) {
      }
  });
}