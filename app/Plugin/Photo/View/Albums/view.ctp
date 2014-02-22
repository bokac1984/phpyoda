<?php
$this->startIfEmpty('maintitle');
echo $this->element('titles', array('maintitle' => 'Albums', 'subtitle' => 'View Album'));
$this->end();

$this->Html->addCrumb('Galerija', array('plugin' => 'photo', 'controller' => 'albums', 'action' => 'index'));
$this->Html->addCrumb($album['Album']['name'], array('plugin' => 'photo', 'controller' => 'albums', 'action' => 'view', $album['Album']['id']));
echo $this->Html->css('lightbox', null, array('inline' => false));
echo $this->Html->script('/js/lib/lightbox/lightbox-2.6.min', array('block'=>'scriptBottom'));

foreach($album['Picture'] as $img) {
  ?>
<div class="img-thumbnail thumb-over">
<?php
  if ($img['location']){
    echo $this->Html->link(
        $this->Html->image($img['medium']),
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

