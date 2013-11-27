<?php //debug($comments);   ?>
<?php echo $this->Html->script('/js/blog', array('block' => 'scriptBottom')); ?>
<div class="comments-manager">
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
  <?php echo $this->Form->create('Comment', array('action' => 'modify')); ?>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th style="width: 1%;"><input type="checkbox" id="check-all" name="check-all"></th>
          <th style="width: 20%;">Commentator</th>
          <th style="width: 50%;">Comment</th>
          <th style="width: 10%;">Post</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($comments as $comment): ?>
          <tr>
            <td style="vertical-align: top;"><input type="checkbox" class="comment-ids" id="comment-<?php echo $comment['Comment']['id']; ?>" name="comment-<?php echo $comment['Comment']['id']; ?>"></td>
            <td>
              <div class="row">
                <div style="float: left; margin: 0 .3em;">
                  <div class="comment-image"><?php echo $this->Gravatar->image($comment['Comment']['email'], array('gravatar' => $comment['Comment']['gravatar'])); ?></div>
                </div>
                <div class="span3">
                  <span class="comment-time"><?php echo $comment['Comment']['ip_address']; ?></span>  
                </div>
                <div class="span3">
                  <span class="commentator"><?php echo $this->Link->displayUrl($comment['Comment']['website'], $comment['Comment']['commentator']); ?></span> 
                </div>
              </div>
            </td>
            <td>
              <div class="span12">
                <span class="comment-time"><?php echo $this->Time->nice($comment['Comment']['created']); ?></span>
              </div>
              </div>
              <div class="span12">
                <?php echo Sanitize::html($comment['Comment']['text']); ?>
              </div>
            </td>
            <td style="vertical-align: middle;"><?php echo $this->Html->link('View Post', array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'view', $comment['Post']['slug'])); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="row" style="margin-left: .5em;">
    <div class="span3">
      <?php
      $sizes = array('empty' => 'Action', 'approve' => 'Approve', 'delete' => 'Delete', 'disapprove' => 'Disapprove');
      echo $this->Form->input('action', array('options' => $sizes, 'div' => 'form-group', 'default' => 'Action', 'label' => false));

      echo $this->Form->button('Go');
      echo $this->Form->end();
      ?>
    </div>
  </div>

</div>