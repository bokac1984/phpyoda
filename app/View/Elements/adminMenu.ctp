<?php
$url = $this->request->here;
?>

<ul class="nav nav-tabs">
    <li<?php echo (preg_match("/^\/$/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Home", array('controller' => 'pages', 'action' => 'index')); ?></li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Portfolios <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li<?php echo (preg_match("/portfolio/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Index", array('controller' => 'portfolios', 'action' => 'index')); ?></li>
            <li<?php echo (preg_match("/portfolio\/add/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Add", array('controller' => 'portfolios', 'action' => 'add')); ?></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Contacts <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li<?php echo (preg_match("/contact/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Index", array('controller' => 'contacts', 'action' => 'index')); ?></li>
            <li<?php echo (preg_match("/contact\/add/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Add Contact", array('controller' => 'contacts', 'action' => 'add')); ?></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Blog <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li<?php echo (preg_match("/blog/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Blog", array('controller' => 'pages', 'action' => 'blog')); ?></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-user"></i> Users <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><?php echo $this->Link->cLink("Manage", array('controller' => 'users', 'action' => 'index'), 'wrench'); ?></li>
            <li><?php echo $this->Link->cLink("Logout", array('controller' => 'users', 'action' => 'logout'), 'off'); ?></li>
        </ul>
    </li>
    <li>
</ul>