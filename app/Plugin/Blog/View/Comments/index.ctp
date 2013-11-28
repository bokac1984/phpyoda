<?php 
//debug($postid);
//debug($comments);
echo $this->Html->script('/js/blog', array('block' => 'scriptBottom')); 
$sizes = array('empty' => 'Action', 'approve' => 'Approve', 'delete' => 'Delete', 'unapprove' => 'Unapprove');
?>
<div class="comments-manager">
  <?php if ($postId && isset($comments[0])): ?>
  <h3><?php echo $this->Html->link('Posts', array('plugin' => 'blog', 'controller' => 'comments', 'action' => 'index')); ?> >> <?php echo $this->Html->link($comments[0]['Post']['title'], array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'view', $comments[0]['Post']['slug'])); ?></h3>
  <?php endif; ?>
  <div class="row">
    <div class="span12">
      <ul id="filters">
        <li><?php echo $this->Html->link('All', array('plugin' => 'blog', 'controller' => 'comments', 'action' => 'index', 'id' => $postId)); ?></li>
        <li><?php echo $this->Html->link('Pending', array('plugin' => 'blog', 'controller' => 'comments', 'action' => 'index', 'status' => 'pending', 'id' => $postId)); ?></li>
        <li><?php echo $this->Html->link('Approved', array('plugin' => 'blog', 'controller' => 'comments', 'action' => 'index', 'status' => 'approved', 'id' => $postId)); ?></li>
        <li><?php echo $this->Html->link('Trash', array('plugin' => 'blog', 'controller' => 'comments', 'action' => 'index', 'status' => 'deleted', 'id' => $postId)); ?></li>
      </ul>
    </div>
  </div>
  <?php 
  echo $this->Form->create('Comment', array('action' => 'modify')); 
  echo $this->Form->input('action', array('options' => $sizes, 'style' => 'float: left;', 'div' => 'form-group', 'default' => 'Action', 'label' => false));

  echo $this->Form->button('Go', array('class' => 'btn', 'style' => 'margin: 0 0 0 10px;'));
  ?>
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
        <?php 
        $contextClass = '';
        $statusApproved['data'] =  'approved';
        $statusApproved['text'] =  'Approve';
        if ($comment['Comment']['approved']) {
          $contextClass = 'success';
          $statusApproved['data'] =  'unapprove';
          $statusApproved['text'] =  'Unapprove';
        }
        
        $statusDeleteed['data'] =  'deleted';
        $statusDeleteed['text'] =  'Delete';
        
        if ($comment['Comment']['deleted']) {
          $contextClass = 'danger';
          $statusDeleteed['data'] =  'undelete';
          $statusDeleteed['text'] =  'Undelete';
        }
        
        
        ?>
        <tr class="<?php echo $contextClass; ?>">
            <td style="vertical-align: top;"><input type="checkbox" class="comment-ids" id="comment-<?php echo $comment['Comment']['id']; ?>" name="comment-<?php echo $comment['Comment']['id']; ?>"></td>
            <td>
              <div class="row">
                <div style="float: left; margin: 0 .3em;">
                  <div class="comment-image"><?php echo $this->Gravatar->image($comment['Comment']['email'], array('gravatar' => $comment['Comment']['gravatar'])); ?></div>
                </div>
                <div class="span3">
                  <span class="comment-time">
                    <?php echo $this->Html->link(
                          $comment['Comment']['ip_address'], 
                          array(
                              'plugin' => 'blog', 'controller' => 'comments', 'action' => 'index', 'search' => array('ip_address' => $comment['Comment']['ip_address'])
                          )); ?>
                  </span>  
                </div>
                <div class="span3">
                  <span class="comment-time">
                    <?php echo $this->Html->link(
                          $comment['Comment']['email'], 
                          array(
                              'plugin' => 'blog', 'controller' => 'comments', 'action' => 'index', 'search' => array('email' => $comment['Comment']['email'])
                          )); ?>
                  </span>  
                </div>
                <div class="span3">
                  <span class="commentator"><?php echo $this->Link->displayUrl($comment['Comment']['website'], $comment['Comment']['commentator']); ?></span> 
                </div>
              </div>
            </td>
            <td class="comment-txt-container">
              <div class="comment-actions">
                <ul class="com-actions-ul">
                  <li><a href="#" id="<?php echo $comment['Comment']['id']; ?>" data-status="<?php echo $statusApproved['data']; ?>"><?php echo $statusApproved['text']; ?></a></li>
                  <li><a href="#" id="<?php echo $comment['Comment']['id']; ?>" data-status="reply">Reply</a></li>
                  <li><a href="#" id="<?php echo $comment['Comment']['id']; ?>" data-status="<?php echo $statusDeleteed['data']; ?>"><?php echo $statusDeleteed['text']; ?></a></li>
                </ul>
              </div>
              <div class="span12">
                <span class="comment-time"><?php echo $this->Time->nice($comment['Comment']['created']); ?></span>
              </div>
              <div class="span12">
                <?php echo Sanitize::html($comment['Comment']['text']); ?>
              </div>
            </td>
            <td style="vertical-align: middle;">
              <?php echo $this->Html->link('', array('plugin' => 'blog', 'controller' => 'comments', 'action' => 'index', 'id' => $comment['Post']['id']), array('class' => 'comments-icon')); ?>
              <?php echo $this->Html->link('View Post', array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'view', $comment['Post']['slug'])); ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="row" style="margin-left: .5em;">
    <div class="span3">
      <?php
      echo $this->Form->input('action', array('options' => $sizes, 'style' => 'float: left;', 'div' => 'form-group', 'default' => 'Action', 'label' => false));

      echo $this->Form->button('Go', array('class' => 'btn', 'style' => 'margin: 0 0 0 10px;'));
      echo $this->Form->end();
      ?>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="reply-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Reply to Comment</h4>
      </div>
        <?php echo $this->Form->create('Comment', array(
            'id' => 'comment-reply-form',
            'action' => 'reply'
            )
        ); ?>
        <?php
        $this->Form->inputDefaults(array(
            'error' => array(
                'attributes' => array(
                    'wrap' => 'div',
                    'class' => 'label label-warning'
                )
            ),
            'div' => 'form-group'
                )
        );
        ?>
      <div class="modal-body">

        <fieldset>
          <?php
          echo $this->Form->input(
              'name', 
              array(
              'type' => 'textarea',
              'class' => 'form-control',
              'label' => false
          ));
          ?>
        </fieldset>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="close-save-modal">Close</button>
        <button type="button" class="btn btn-primary" id="save-cat">Reply</button>     
      </div>
      <?php echo $this->Form->end(); ?>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->

</div><!-- /.modal -->