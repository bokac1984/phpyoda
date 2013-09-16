<?php echo $this->Html->script('/js/blog', array('block'=>'scriptBottom')); ?>
<div class="row">   
    <div class="col-lg-12"><h3>List of all posts</h3>
        <?php foreach ($posts as $post): ?>
            <div class="row margint20">
                <div class="col-lg-12">
                    <div class="blogpost-title">
                        <span class="bp-title">
                            <?php echo $this->Html->link($post['Post']['title'], array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'view', $post['Post']['slug']), array('class' => 'post-title')); ?>
                            <?php if ($admin) : ?>
                            <span class="edit-post"><?php echo $this->Link->cLink("", array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'edit', $post['Post']['slug']), 'wrench'); ?></span>
                            <span class="delete-post"><?php echo $this->Link->dLink("", array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'delete', $post['Post']['slug']), 'trash',$post['Post']['slug']); ?></span>
                            <?php endif; ?>
                        </span>
                    </div>
                    <div class="sub-data">
                        <small><?php echo $this->Time->format('F jS, Y', $post['Post']['created']); ?></small>,
                        <small> posted by Admin | Comments (<?php echo count($post['Comment']) ? count($post['Comment']) : 0; ?>)</small>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php echo $this->element('pagination'); ?>
    </div>
</div>
<?php
if ($admin)
    echo $this->Html->link(__('New Post'), array('action' => 'add'), array('class' => 'btn btn-primary'));
?>