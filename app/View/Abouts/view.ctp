<div class="abouts view">
<h2><?php  echo __('About'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($about['About']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text'); ?></dt>
		<dd>
			<?php echo h($about['About']['text']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit About'), array('action' => 'edit', $about['About']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete About'), array('action' => 'delete', $about['About']['id']), null, __('Are you sure you want to delete # %s?', $about['About']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Abouts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New About'), array('action' => 'add')); ?> </li>
	</ul>
</div>
