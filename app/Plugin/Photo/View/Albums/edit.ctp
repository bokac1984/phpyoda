<?php
$this->startIfEmpty('maintitle');
echo $this->element('titles', array('maintitle' => 'Albums', 'subtitle' => 'Edit Album'));
$this->end();

$this->Html->addCrumb('Galerija', array('plugin' => 'photo', 'controller' => 'albums', 'action' => 'index'));
$this->Html->addCrumb($album['Album']['name'], array('plugin' => 'photo', 'controller' => 'albums', 'action' => 'view', $album['Album']['id']));

echo $this->Html->css('photo/photostyles', null, array('inline' => false));
echo $this->Html->script('/js/photo/photo', array('block' => 'scriptBottom'));
?>
<div class="row">
  <div class="col-md-9">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title"><?php echo $album['Album']['name']; ?></h3>
      </div><!-- /.box-header -->
      <!-- form start -->
      <div class="box-body album-images">
        <?php foreach ($album['Picture'] as $img): ?>
          <?php 
          $display = (bool)$img['display'] ===  true ? 'displayed-img' : 'hidden-img'; 
          $coverCss = '';
          $coverText = '';
          if ($img['cover']) {
            $coverCss = 'cover-photo';
            $coverText = '';
          }
          ?>
          <div class="img-thumbnail thumb-over select-objects space-img <?php echo $display." ".$coverCss; ?> " data-id="<?php echo $img['id']; ?>">
            <?php
            if ($img['location']) {
              echo $this->Html->link(
                      $this->Html->image($img['thumbnail']), $img['location'], array(
                  'target' => '_blank',
                  'escape' => false,
                  'rel' => 'lightbox',
                  'data-lightbox' => $album['Album']['name']
                      )
              );
            }
            ?>
            <div class="caption">
              <h6>Views: <?php echo $img['views']; ?></h6>
            </div>
          </div>        
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Actions</h3>
      </div><!-- /.box-header -->
      <!-- form start -->
      <div class="box-body vertical-space">
        <div class="select-all">
          <button id="select-all" class="btn btn-mini">Select All</button>
          <div class="btn-group">
            <button type="button" class="btn btn-default btn-sm btn-flat dropdown-toggle" data-toggle="dropdown">
              Action <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#" class="mark-visible" data-set="show">Mark as visible</a></li>
              <li><a href="#" class="mark-visible" data-set="hide">Mark as hidden</a></li>
              <li class="divider"></li>
              <li><a href="#">Delete</a></li>
            </ul>
          </div>
        </div>
        <div id="cover-button" style="display: none;">
          Make <button id="make-cover-btn" class="btn btn-mini">Cover</button>
        </div>
        <div class="showhide" style="display: none;">
          Show/Hide
        </div>
      </div>
    </div>
  </div>
</div>