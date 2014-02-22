<?php
$this->Html->addCrumb('Galerija', array('plugin' => 'photo', 'controller' => 'albums', 'action' => 'index'));

$i = 1;
$open = false;
$numberOfAlbums = count($albums);

foreach ($albums as $album):
  echo ($i % 3 == 1)? '<div class="row marginB">': '';
  $open = ($numberOfAlbums == $i); 
?>
<div class="col-md-3 img-thumbnail horizontal-space album" data-id="<?php echo $album["Album"]['id']; ?>">
  <img src="/img/avatar.png" />

  <h4><?php echo $album['Album']['name']; ?></h4>
  <?php if ($admin) : ?>
  <p><?php echo $this->Html->link('Add photos »', array('plugin' => 'photo', 'controller' => 'albums', 'action' => 'addPhotos', $album['Album']['id']), array('class' => 'btn btn-default', 'role' => 'button')); ?>
    <?php echo $this->Html->link('Edit »', array('plugin' => 'photo', 'controller' => 'albums', 'action' => 'edit', $album['Album']['id']), array('class' => 'btn btn-default', 'role' => 'button')); ?>
  <?php echo $this->Html->link('View »', array('plugin' => 'photo', 'controller' => 'albums', 'action' => 'view', $album['Album']['id']), array('class' => 'btn btn-default', 'role' => 'button')); ?></p>
  <?php  endif; ?>
</div>
<?php
echo ($i % 3 == 0 || $open) ? '</div>': '';
$i++;
endforeach; 

