<div class="portfolios view">
<h2><?php  echo __('Portfolio'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($portfolio['Portfolio']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text'); ?></dt>
		<dd>
			<?php echo h($portfolio['Portfolio']['text']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Screen Shot'); ?></dt>
		<dd>
			<?php echo h($portfolio['Portfolio']['screen_shot']); ?>
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
	</ul>
</div>
