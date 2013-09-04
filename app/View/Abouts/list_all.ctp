<div class="abouts index">
	<h2><?php echo __('Abouts'); ?></h2>
	<table class="table" cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($abouts as $about): ?>
	<tr>
		<td><?php echo h($about['About']['id']); ?>&nbsp;</td>
		<td class="actions">
            <?php echo $this->Link->cLink(__(''), array('action' => 'index'), 'eye-open'); ?>
			<?php echo $this->Link->dLink('', array('action' => 'delete', $about['About']['id']), 'trash',$about['About']['id']); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
<?php echo $this->element('pagination'); ?>
</div>
<?php echo $this->Html->link(__('New About'), array('action' => 'add'), array('class' => 'btn')); ?>
</div>
