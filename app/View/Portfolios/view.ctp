<div class="portfolios view">
<h2><?php  echo __('Portfolio'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($portfolio['Portfolio']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Screen Shot'); ?></dt>
		<dd>
			<?php echo h($portfolio['Portfolio']['screen_shot']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project Name'); ?></dt>
		<dd>
			<?php echo h($portfolio['Portfolio']['project_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Technologies'); ?></dt>
		<dd>
			<?php echo h($portfolio['Portfolio']['technologies']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($portfolio['Portfolio']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo h($portfolio['Portfolio']['order']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Portfolio'), array('action' => 'edit', $portfolio['Portfolio']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Portfolio'), array('action' => 'delete', $portfolio['Portfolio']['id']), null, __('Are you sure you want to delete # %s?', $portfolio['Portfolio']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Portfolios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Portfolio'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Tags'); ?></h3>
	<?php if (!empty($portfolio['Tag'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Portfolio Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($portfolio['Tag'] as $tag): ?>
		<tr>
			<td><?php echo $tag['id']; ?></td>
			<td><?php echo $tag['name']; ?></td>
			<td><?php echo $tag['portfolio_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tags', 'action' => 'view', $tag['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tags', 'action' => 'edit', $tag['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tags', 'action' => 'delete', $tag['id']), null, __('Are you sure you want to delete # %s?', $tag['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
