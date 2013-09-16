<?php //debug($contacts); ?>
<div class="contacts index">
	<h2><?php echo __('Contacts'); ?></h2>
    <table class="table" cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($contacts as $contact): ?>
	<tr>
		<td><?php echo h($contact['Contact']['name']); ?>&nbsp;</td>
        <td><?php echo $this->Time->format('F jS, Y h:i A', $contact['Contact']['created']); ?>&nbsp;</td>
		<td class="actions">
            <?php echo $this->Link->cLink(__(''), array('action' => 'view', $contact['Contact']['id']), 'eye-open'); ?>
			<?php echo $this->Link->dLink("", array('action' => 'delete', $contact['Contact']['id']), 'trash',$contact['Contact']['id']); ?>
            <a href="#"><i class="glyphicon glyphicon-<?php echo $contact['Contact']['read'] ? "folder-open" : "folder-close"; ?>"></i></a>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
<?php echo $this->element('pagination'); ?>
</div>
