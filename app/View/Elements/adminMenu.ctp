<?php
$url = $this->request->here;
?>

<ul class="nav nav-justified">
    <li<?php echo (preg_match("/^\/$/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Home", array('plugin' => null, 'controller' => 'pages', 'action' => 'index')); ?></li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Portfolios <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li<?php echo (preg_match("/portfolio/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Index", array('plugin' => null, 'controller' => 'portfolios', 'action' => 'index')); ?></li>
            <li<?php echo (preg_match("/portfolio\/add/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Add", array('plugin' => null, 'controller' => 'portfolios', 'action' => 'add')); ?></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">About <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><?php echo $this->Html->link("View all", array('plugin' => null, 'controller' => 'abouts', 'action' => 'listAll')); ?></li>
            <li<?php echo (preg_match("/abouts\/edit/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Edit about", array('plugin' => null, 'controller' => 'abouts', 'action' => 'edit')); ?></li>
            <li><?php echo $this->Html->link("View about", array('plugin' => null, 'controller' => 'abouts', 'action' => 'index')); ?></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Contacts <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li<?php echo (preg_match("/contact/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("View All Messages", array('plugin' => null, 'controller' => 'contacts', 'action' => 'index')); ?></li>
            <!--<li<?php //echo (preg_match("/contact\/add/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Add Contact", array('plugin' => null, 'controller' => 'contacts', 'action' => 'add')); ?></li>-->
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Blog <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li<?php echo (preg_match("/blog/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Blog", array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'index')); ?></li>
            <li<?php echo (preg_match("/blog/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("New Post", array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'add')); ?></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon  glyphicon-user"></i> Users <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><?php echo $this->Link->cLink("Manage", array('plugin' => null, 'controller' => 'users', 'action' => 'index'), 'wrench'); ?></li>
            <li><?php echo $this->Link->cLink("Logout", array('plugin' => null, 'controller' => 'users', 'action' => 'logout'), 'off'); ?></li>
        </ul>
    </li>
</ul>