<div class="portfolios form">
<?php echo $this->Form->create('Portfolio'); ?>
	<fieldset>
		<legend><?php echo __('Edit Portfolio'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('text');
		echo $this->Form->input('screen_shot');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Portfolio.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Portfolio.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Portfolios'), array('action' => 'index')); ?></li>
	</ul>
</div>
