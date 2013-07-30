<div class="portfolios form">
<?php echo $this->Form->create('Portfolio'); ?>
	<fieldset>
		<legend><?php echo __('Edit Portfolio'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('screen_shot');
		echo $this->Form->input('project_name');
		echo $this->Form->input('technologies');
		echo $this->Form->input('description');
		echo $this->Form->input('order');
		echo $this->Form->input('Tag');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Portfolio.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Portfolio.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Portfolios'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
