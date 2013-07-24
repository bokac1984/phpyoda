<div class="portfolios index">
	<h2><?php echo __('Portfolios'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('text'); ?></th>
			<th><?php echo $this->Paginator->sort('screen_shot'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($portfolios as $portfolio): ?>
	<tr>
		<td><?php echo h($portfolio['Portfolio']['id']); ?>&nbsp;</td>
		<td><?php echo h($portfolio['Portfolio']['text']); ?>&nbsp;</td>
		<td><?php echo h($portfolio['Portfolio']['screen_shot']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $portfolio['Portfolio']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $portfolio['Portfolio']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $portfolio['Portfolio']['id']), null, __('Are you sure you want to delete # %s?', $portfolio['Portfolio']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Portfolio'), array('action' => 'add')); ?></li>
	</ul>
</div>
