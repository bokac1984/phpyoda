<?php
$url = $this->request->here;
?>

<ul class="nav nav-justified">
  <li<?php echo (preg_match("/^\/$/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Home", array('plugin' => null, 'controller' => 'pages', 'action' => 'index')); ?></li>
  <li<?php echo (preg_match("/portfolio/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Portfolio", "/portfolio"); ?></li>
  <li<?php echo (preg_match("/about/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("About", "/about"); ?></li>
  <li<?php echo (preg_match("/contact/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Contact", "/contact"); ?></li>
  <li<?php echo (preg_match("/blog/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Blog", array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'index')); ?></li>
</ul><!-- /.navbar -->
