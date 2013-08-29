<div class="posts index">
<?php foreach ($posts as $post): ?>
    <div class="row-fluid">
        <div class="span10">
            <h2><?php echo $this->Html->link($post['Post']['title'], array('plugin' => 'blog', 'controller' => 'posts', 'action' => 'view', $post['Post']['slug'])); ?></h2>
            <small><?php echo $this->Time->format('F jS, Y', $post['Post']['created']); ?></small>
            <p>
                <?php echo $post['Post']['body']; ?>
            </p>
        </div>
    </div>
<?php endforeach; ?>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
    <div class="pagination">
        <ul>
            <?php
            echo $this->Paginator->prev('< ', array('tag' => 'li'), null, array('class' => 'prev disabled', 'tag' => 'li', 'disabledTag' => 'a'));
            echo $this->Paginator->first("<<", array(
                'tag' => 'li'
            ));
            echo $this->Paginator->numbers(array(
                            'separator' => '', 
                            'tag' => 'li',
                            'currentClass' => 'active',
                            'currentTag' => 'a'
                        )
                    );
            echo $this->Paginator->last(">>", array(
                'tag' => 'li'
            ));
            echo $this->Paginator->next(' >', array('tag' => 'li'), null, array('class' => 'next disabled', 'tag' => 'li', 'disabledTag' => 'a'));
            ?>
        </ul>
    </div>
</div>
<?php 
if ($admin) 
    echo $this->Html->link(__('New Post'), array('action' => 'add'), array('class' => 'btn'));
?>