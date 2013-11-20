<?php

?>
<h3>Most popular</h3>
<?php $posts = $this->requestAction('posts/popular'); ?>
<ol class="latest-posts">
<?php foreach ($posts as $post): ?>
      <li><?php echo $this->Html->link($post['Post']['title'], array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'view', $post['Post']['slug']), array('class' => 'post-title')); ?></li>
<?php endforeach; ?>
</ol>