<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h3>Latest Posts</h3>
<?php $posts = $this->requestAction('posts/latest/sort:created/direction:desc/limit:10'); ?>
<ol class="latest-posts">
<?php foreach ($posts as $post): ?>
      <li><?php echo $this->Html->link($post['Post']['title'], array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'view', $post['Post']['slug']), array('class' => 'post-title')); ?></li>
<?php endforeach; ?>
</ol>