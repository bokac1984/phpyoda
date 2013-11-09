<?php echo $this->Html->script('/js/blog', array('block'=>'scriptBottom')); ?>
<div class="posts manage-posts">
	<h2><?php echo __('List of all posts'); ?></h2>
	<table class="table" cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
            <th><?php echo $this->Paginator->sort('modified'); ?></th>
            <th><?php echo $this->Paginator->sort('published'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($posts as $post): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'view', $post['Post']['slug'])); ?>
		</td>
		<td><?php echo $this->Time->format('F jS, Y h:i A', $post['Post']['created']); ?>&nbsp;</td>
        <td><?php echo $this->Time->format('F jS, Y h:i A', $post['Post']['modified']); ?>&nbsp;</td>
        <td>
            <?php 
            if ($post['Post']['published']) {
                $icon = 'ok';
                $published = 'Published';
            } else {
                $icon = 'remove';
                $published = 'Not Published'; 
            }
            
            echo $this->Link->cLink(__(''), '#', $icon, array('title' => $published, 'class' => 'publish', 'id' => $post['Post']['id'], 'data-published' => $post['Post']['published'])); ?></td>
		<td class="actions">
            
            <?php echo $this->Link->cLink(__(''), array('action' => 'view', $post['Post']['slug']), 'eye-open'); ?>
			<?php echo $this->Link->dLink("", array('action' => 'delete', $post['Post']['id']), 'trash',$post['Post']['id']); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
    <?php echo $this->element('pagination'); ?>
</div>
