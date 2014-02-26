<div class="errorLogs index">
  <h2><?php echo __('Error Logs'); ?></h2>
  <table class="table table-bordered table-hover" cellpadding="0" cellspacing="0">
    <tr>

      <th><?php echo $this->Paginator->sort('type'); ?></th>
      <th><?php echo $this->Paginator->sort('ip', 'IP'); ?></th>
      <th><?php echo $this->Paginator->sort('url', 'URL'); ?></th>
      <th><?php echo $this->Paginator->sort('port'); ?></th>
      <th><?php echo $this->Paginator->sort('created'); ?></th>
      <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($errorLogs as $errorLog): ?>
      <tr>
        <td><?php echo h($errorLog['ErrorLog']['type']); ?>&nbsp;</td>
        <td><?php echo h($errorLog['ErrorLog']['ip']); ?>&nbsp;</td>
        <td><?php echo h($errorLog['ErrorLog']['url']); ?>&nbsp;</td>
        <td><?php echo h($errorLog['ErrorLog']['port']); ?>&nbsp;</td>
        <td><?php echo h($errorLog['ErrorLog']['created']); ?>&nbsp;</td>
        <td class="actions">
          <?php echo $this->Html->link(__('View'), array('action' => 'view', $errorLog['ErrorLog']['id'])); ?>
          <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $errorLog['ErrorLog']['id'])); ?>
          <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $errorLog['ErrorLog']['id']), null, __('Are you sure you want to delete # %s?', $errorLog['ErrorLog']['id'])); ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
  <?php echo $this->element('pagination'); ?>
</div>
<div class="actions">
  <h3><?php echo __('Actions'); ?></h3>
  <ul>
    <li><?php echo $this->Html->link(__('New Error Log'), array('action' => 'add')); ?></li>
  </ul>
</div>
