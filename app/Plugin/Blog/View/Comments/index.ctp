<?php //debug($comments); ?>
<div class="row">
  <div class="span12">
    <ul id="filters">
      <li><?php echo $this->Html->link('All', array('plugin' => 'blog', 'controller' => 'comments', 'action' => 'index')); ?></li>
      <li><?php echo $this->Html->link('Pending', array('plugin' => 'blog', 'controller' => 'comments', 'action' => 'index', 'pending')); ?></li>
      <li><?php echo $this->Html->link('Approved', array('plugin' => 'blog', 'controller' => 'comments', 'action' => 'index', 'approved')); ?></li>
      <li><?php echo $this->Html->link('Trash', array('plugin' => 'blog', 'controller' => 'comments', 'action' => 'index', 'deleted')); ?></li>
    </ul>
  </div>
</div>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th><input type="checkbox" id="check-all" name="check-all"></th>
        <th>Commentator</th>
        <th>Comment</th>
        <th>Post</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($comments as $comment): ?>
      <tr class="active">
        <td><input type="checkbox" id="comment-<?php echo $comment['Comment']['id']; ?>" name="check-all"></td>
        <td><?php echo Sanitize::html($comment['Comment']['commentator']); ?></td>
        <td><?php echo Sanitize::html($comment['Comment']['text']); ?></td>
        <td><?php echo $this->Html->link('View Post', array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'view', $comment['Post']['slug'])); ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>