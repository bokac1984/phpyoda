<?php
$this->startIfEmpty('maintitle');
echo $this->element('titles', array('maintitle' => 'Albums', 'subtitle' => 'View Album'));
$this->end();

$this->Html->addCrumb('Galerija', array('plugin' => 'photo', 'controller' => 'albums', 'action' => 'index'));
$this->Html->addCrumb($album['Album']['name'], array('plugin' => 'photo', 'controller' => 'albums', 'action' => 'view', $album['Album']['id']));

echo $this->Html->css('/js/lib/fancybox/source/jquery.fancybox', null, array('inline' => false));
echo $this->Html->script('/js/lib/fancybox/source/jquery.fancybox.pack', array('block'=>'scriptBottom'));
echo $this->Html->script('/js/photo/photo', array('block'=>'scriptBottom'));

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
            'rel' => 'fancybox',
            'class' => 'fancybox',
            'title' => $img['title'],
            'data-id' => $img['id']
        )
    );
  }
  ?>
</div>
  <?php
}

