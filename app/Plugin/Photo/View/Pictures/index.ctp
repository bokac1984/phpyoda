<?php
$this->Html->addCrumb('Album', array('plugin' => 'photo', 'controller' => 'photos', 'action' => 'index'));

foreach($pictures as $img) {
  if ($img['Picture']['location']){
    echo '<img src="'.$img['Picture']['location'].'" />';
  }
}

