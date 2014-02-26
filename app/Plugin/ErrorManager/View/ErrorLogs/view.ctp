<div class="errorLogs view">
<h2><?php  echo __('Error Log'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($errorLog['ErrorLog']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($errorLog['ErrorLog']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($errorLog['ErrorLog']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Error'); ?></dt>
		<dd>
			<?php echo h($errorLog['ErrorLog']['error']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip'); ?></dt>
		<dd>
			<?php echo h($errorLog['ErrorLog']['ip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Agent'); ?></dt>
		<dd>
			<?php echo h($errorLog['ErrorLog']['user_agent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($errorLog['ErrorLog']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Port'); ?></dt>
		<dd>
			<?php echo h($errorLog['ErrorLog']['port']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Method'); ?></dt>
		<dd>
			<?php echo h($errorLog['ErrorLog']['method']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Path'); ?></dt>
		<dd>
			<?php echo h($errorLog['ErrorLog']['path']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Query String'); ?></dt>
		<dd>
			<?php echo h($errorLog['ErrorLog']['query_string']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Error Log'), array('action' => 'edit', $errorLog['ErrorLog']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Error Log'), array('action' => 'delete', $errorLog['ErrorLog']['id']), null, __('Are you sure you want to delete # %s?', $errorLog['ErrorLog']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Error Logs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Error Log'), array('action' => 'add')); ?> </li>
	</ul>
</div>
