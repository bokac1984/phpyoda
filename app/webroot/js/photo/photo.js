$(document).ready(function() {
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
});