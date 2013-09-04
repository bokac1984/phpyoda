<?php
echo $this->Html->css('shCore', null, array('inline' => false));
echo $this->Html->css('shThemeDefault', null, array('inline' => false));
echo $this->Html->script('/js/lib/shighliter/shCore', array('inline' => false));
echo $this->Html->script('/js/lib/shighliter/shBrushPhp', array('inline' => false));
echo $this->Html->scriptBlock('SyntaxHighlighter.all();');
if($admin): 
?>
<div class="row">
    <div class="col-lg-12">
        <span class="edit-post"><?php echo $this->Link->cLink("", array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'edit', $post['Post']['slug']), 'wrench'); ?></span>
        <?php echo $this->Link->cLink("", array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'edit', $post['Post']['slug']), 'book'); ?>
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
<div class="row">
    <div class="col-lg-12">
        <?php foreach ($post['Comment'] as $comment): ?>
        <div><?php echo $comment['text'];?></div>
        <?php endforeach; ?>
    </div>
</div>