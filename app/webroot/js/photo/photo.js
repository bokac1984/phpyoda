$(document).ready(function() {
  
  // initiate class
  var ph = new PicturesHandler();
  
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
  
  $(document).on('click', '#select-all', function(e){
    e.preventDefault();
    
    $('.select-objects').addClass('selected-image');
    $(this).attr('id','disselect-all');
    $(this).html('Disselect All');
  });
  
  $(document).on('click', '#disselect-all', function(e){
    e.preventDefault();
    
    $('.select-objects').removeClass('selected-image');
    $(this).attr('id','select-all');
    $(this).html('Select All');
    ph.displayCoverButton($('#cover-button'));
  });
  
  $(document).on('click', '.select-objects', function(e){
    e.preventDefault();
    var $obj = $(this);
    if ( !$obj.hasClass('selected-image') ) {
      $obj.addClass('selected-image');
    } else {
      $obj.removeClass('selected-image');
    } 
    ph.setObject($('.album-images'));
    ph.getNumberOfSelectedPictures();
    ph.displayCoverButton($('#cover-button'));
    ph.displayShowHideOptions($('.showhide'));
  });
  
  $(document).on('click', '#make-cover-btn', function(e){
    e.preventDefault();
    var $cover = $('.cover-photo');
    var $selected = $('.selected-image')
    var toRemoveId = [$cover.attr('data-id')];

    $.ajax({
        type: 'POST',
        url: '/photo/pictures/makeCover',
        data: {id: $selected.attr('data-id'), removeId: toRemoveId},
        dataType: 'json',
        success: function(data) {
          if (typeof data.success) {
            $selected.removeClass('selected-image').addClass('cover-photo');
            $cover.removeClass('cover-photo');
            ph.displayCoverButton($('#cover-button'));
          } else {
            console.log('Error happened on setting the cover image');
          }
        }
    });
    
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
function PicturesHandler(){ 
  this.numberOfSelectedImages = 0;
  this.obj =  null;
}

PicturesHandler.prototype.setObject = function($obj) {
  this.obj = $obj;
}

PicturesHandler.prototype.getNumberOfSelectedPictures = function() {
  this.numberOfSelectedImages = this.obj.children('.selected-image').size();
}
PicturesHandler.prototype.displayCoverButton = function($obj) {
  this.getNumberOfSelectedPictures();
  if (this.numberOfSelectedImages == 1) {
    $obj.show();
  } else {
    $obj.hide();
  }
}

PicturesHandler.prototype.displayShowHideOptions = function($obj) {
  this.getNumberOfSelectedPictures();
  if (this.numberOfSelectedImages > 0) {
    console.log('in display show hide');
    $obj.show();
    var $selectAll = $('#select-all');
    
    $selectAll.attr('id','disselect-all');
    $selectAll.html('Disselect All');
  }
  $obj.hide();
}

PicturesHandler.prototype.getSelectedIds = function() {
  var ids = [];
  
  $('.selected-image').each(function(index){
    ids.push($(this).attr('data-id'));
  });
  
  return ids;
  
}