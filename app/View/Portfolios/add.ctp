<div class="portfolios form">
<?php echo $this->Form->create('Portfolio'); ?>
	<fieldset>
		<legend><?php echo __('Add Portfolio'); ?></legend>
	<?php
		echo $this->Form->input('text');
		echo $this->Form->input('screen_shot');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Portfolios'), array('action' => 'index')); ?></li>
	</ul>
</div>
