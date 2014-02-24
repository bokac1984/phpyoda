<?php
$url = $this->request->here;
?>
<ul class="sidebar-menu">
  <li<?php echo (preg_match("/^\/$/", $url))? ' class="active"' : ''?>>
    <a href="/">
      <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-user"></i>
      <span>Users</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
            <li><?php echo $this->Link->cLink("Manage", array('plugin' => null, 'controller' => 'users', 'action' => 'index'), 'fa fa-wrench'); ?></li>
            <li><?php echo $this->Link->cLink("User groups", array('plugin' => null, 'controller' => 'groups', 'action' => 'index'), 'fa fa-tasks'); ?></li>
        </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-laptop"></i>
      <span>Portfolios</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
            <li><?php echo $this->Html->link("Index", array('plugin' => null, 'controller' => 'portfolios', 'action' => 'index')); ?></li>
            <li><?php echo $this->Link->cLink("Manage", array('plugin' => null, 'controller' => 'portfolios', 'action' => 'listAll'), 'fa fa-wrench'); ?></li>
            <li class="divider"></li>
            <li><?php echo $this->Link->cLink("Add", array('plugin' => null, 'controller' => 'portfolios', 'action' => 'add'), 'fa fa-new-window'); ?></li>
        </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-envelope"></i> <span>Contacts</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
          <li<?php echo (preg_match("/contact/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("View All Messages", array('plugin' => null, 'controller' => 'contacts', 'action' => 'index')); ?></li>
      </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-table"></i> <span>About</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><?php echo $this->Html->link("View all", array('plugin' => null, 'controller' => 'abouts', 'action' => 'listAll')); ?></li>
        <li<?php echo (preg_match("/abouts\/edit/", $url))? ' class="active"' : ''?>><?php echo $this->Html->link("Edit about", array('plugin' => null, 'controller' => 'abouts', 'action' => 'edit')); ?></li>
        <li><?php echo $this->Html->link("View about", array('plugin' => null, 'controller' => 'abouts', 'action' => 'index')); ?></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-group"></i> <span>Blog</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><?php echo $this->Link->cLink("Blog", array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'index'), 'fa fa-star'); ?></li>
        <li><?php echo $this->Link->cLink("Manage", array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'manage'), 'fa fa-wrench'); ?></li>
        <li class="divider"></li>
        <li><?php echo $this->Link->cLink("Comments", array('plugin' => 'blog', 'controller' => 'comments', 'action' => 'index'), 'fa fa-comments'); ?></li>
        <li class="divider"></li>
        <li><?php echo $this->Link->cLink("New Post", array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'add'), 'fa fa-pencil'); ?></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-picture-o"></i> <span>Photo</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><?php echo $this->Link->cLink("Albums", array('plugin' => 'photo', 'controller' => 'albums', 'action' => 'index'), 'fa fa-star'); ?></li>
        <li><?php echo $this->Link->cLink("Photos", array('plugin' => 'photo', 'controller' => 'photos', 'action' => 'add'), 'fa fa-wrench'); ?></li>
        <li><?php echo $this->Link->cLink("Manage Comments", array('plugin' => 'photo', 'controller' => 'comments', 'action' => 'index'), 'fa fa-comment-o'); ?></li>
        <li><?php echo $this->Link->cLink("New Post", array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'add'), 'fa fa-pencil'); ?></li>
    </ul>
  </li>
</ul>

