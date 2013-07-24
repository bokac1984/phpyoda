<?php
$url = $this->request->here;
?>
<div class="navbar">
  <div class="navbar-inner">
    <div class="container">
        <ul class="nav">
          <li<?php echo (preg_match("/^\/$/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Home", array('controller' => 'pages', 'action' => 'index')); ?></li>
          <li<?php echo (preg_match("/portfolio/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Portfolio", array('controller' => 'portfolios', 'action' => 'index')); ?></li>
          <li<?php echo (preg_match("/about/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("About", array('controller' => 'pages', 'action' => 'about')); ?></li>
          <li<?php echo (preg_match("/contact/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Contact", array('controller' => 'contacts', 'action' => 'add')); ?></li>
          <li<?php echo (preg_match("/blog/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Blog", array('controller' => 'blog', 'action' => 'index')); ?></li>
        </ul>
    </div>
  </div>
</div><!-- /.navbar -->
