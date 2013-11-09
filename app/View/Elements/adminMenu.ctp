<?php
$url = $this->request->here;
?>

<ul class="nav nav-justified">
    <li<?php echo (preg_match("/^\/$/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Home", array('plugin' => null, 'controller' => 'pages', 'action' => 'index')); ?></li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Portfolios <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><?php echo $this->Html->link("Index", array('plugin' => null, 'controller' => 'portfolios', 'action' => 'index')); ?></li>
            <li><?php echo $this->Link->cLink("Manage", array('plugin' => null, 'controller' => 'portfolios', 'action' => 'listAll'), 'wrench'); ?></li>
            <li class="divider"></li>
            <li><?php echo $this->Link->cLink("Add", array('plugin' => null, 'controller' => 'portfolios', 'action' => 'add'), 'new-window'); ?></li>
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
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $this->element('/layout/newcontact'); ?> Contacts <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li<?php echo (preg_match("/contact/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("View All Messages", array('plugin' => null, 'controller' => 'contacts', 'action' => 'index')); ?></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Blog <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><?php echo $this->Link->cLink("Blog", array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'index'), 'star'); ?></li>
            <li><?php echo $this->Link->cLink("Manage", array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'manage'), 'wrench'); ?></li>
            <li class="divider"></li>
<li><?php echo $this->Link->cLink("Manage Comments", array('plugin' => 'blog', 'controller' => 'comments', 'action' => 'index'), 'wrench'); ?></li>
            <li class="divider"></li>
            <li><?php echo $this->Link->cLink("New Post", array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'add'), 'new-window'); ?></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Users <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><?php echo $this->Link->cLink("Manage", array('plugin' => null, 'controller' => 'users', 'action' => 'index'), 'wrench'); ?></li>
            <li><?php echo $this->Link->cLink("User groups", array('plugin' => null, 'controller' => 'groups', 'action' => 'index'), 'tasks'); ?></li>
            <li class="divider"></li>
            <li><?php echo $this->Link->cLink("Logout", array('plugin' => null, 'controller' => 'users', 'action' => 'logout'), 'off'); ?></li>
        </ul>
    </li>
</ul>