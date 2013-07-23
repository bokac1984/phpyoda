<?php
$url = $this->request->here;
?>
<ul class="nav">
  <li<?php echo (preg_match("/^\/$/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Home", array('controller' => 'pages', 'action' => 'index')); ?></li>
  <li<?php echo (preg_match("/portfolio/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Portfolio", array('controller' => 'pages', 'action' => 'portfolio')); ?></li>
  <li<?php echo (preg_match("/about/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("About", array('controller' => 'pages', 'action' => 'about')); ?></li>
  <li<?php echo (preg_match("/contact/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Contact", array('controller' => 'pages', 'action' => 'contact')); ?></li>
  <li<?php echo (preg_match("/blog/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Blog", array('controller' => 'blog', 'action' => 'index')); ?></li>
</ul>