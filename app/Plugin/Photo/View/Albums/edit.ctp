<?php
$this->startIfEmpty('maintitle');
echo $this->element('titles', array('maintitle' => 'Albums', 'subtitle' => 'Edit Album'));
$this->end();

echo $this->Html->script('/js/photo/photo', array('block'=>'scriptBottom'));
?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title"><?php echo $album['Album']['name']; ?></h3>
      </div><!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
<?php
foreach($album['Picture'] as $img) {
  ?>

<div class="img-thumbnail thumb-over select-objects">
<?php
  if ($img['location']){
    echo $this->Html->link(
        $this->Html->image($img['thumbnail']),
        $img['location'],
        array(
            'target'=> '_blank',
            'escape'=> false,
            'rel' => 'lightbox',
            'data-lightbox' => $album['Album']['name']
        )
    );
  }
  ?>
</div>
  <?php
}
?>
      </div>
      </div>
  </div>
</div>