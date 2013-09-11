<?php
echo $this->Html->css('shCore', null, array('inline' => false));
echo $this->Html->css('shThemeDefault', null, array('inline' => false));
echo $this->Html->script('/js/lib/shighliter/shCore', array('inline' => false));
echo $this->Html->script('/js/lib/shighliter/shBrushPhp', array('inline' => false));
echo $this->Html->script('blog', array('block'=>'scriptBottom'));
echo $this->Html->scriptBlock('SyntaxHighlighter.all();');
$this->log($post, 'view' );
if ($admin):
    ?>
    <div class="row">
        <div class="col-lg-12">
    <!--        <span class="edit-post"><?php echo $this->Link->cLink("Edit", array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'edit', $post['Post']['slug']), 'edit'); ?></span>-->
            <?php echo $this->Link->cLink("Edit", array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'edit', $post['Post']['slug']), 'edit'); ?>
        </div>
    </div>
<?php endif; ?>
<div class="row">
    <div class="col-lg-12">
        <h3><?php echo $post['Post']['title']; ?></h3>
        <small><?php echo $this->Time->format('F jS, Y', $post['Post']['created']); ?></small>
        <p><?php echo $post['Post']['body']; ?></p>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-lg-12">
        <?php if (count($post['Comment'])) : ?>
        <div class="row">
            <div class="col-lg-12">
                <h2 class="pull-left">Comments</h2>
                <span><a class="pull-right btn btn-default" href="#commentthis">Comment</a></span> 
            </div>
        </div>
        <?php endif; ?>
        <?php foreach ($post['Comment'] as $comment): ?>
            <div class="row margint20">
                <div class="col-lg-12">
                    <div class="commentator">Comment from: <?php echo $comment['commentator']; ?></div>
                    <div class="comment-text"><?php echo $comment['text']; ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <a name="commentthis"></a>
        <?php echo $this->element('comment'); ?>
    </div>
</div>