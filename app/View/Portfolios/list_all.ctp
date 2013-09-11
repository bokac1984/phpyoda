<?php echo $this->Html->script('phpyoda', array('block'=>'scriptBottom')); ?>
<div class="groups index">
    <div class="row">
        <div class="col-xs-3 col-sm-3">
            <div class="well sidebar-nav">
                <ul class="nav">
                    <li>Actions</li>
                    <li><?php echo $this->Html->link(__('New Portfolio'), array('action' => 'add')); ?></li>
                    <li><?php echo $this->Html->link(__('View index'), array('action' => 'index')); ?> </li>
                </ul>
            </div><!--/.well -->
        </div><!--/span-->
        <div class="col-xs-9 col-sm-9">
            <h2><?php echo __('Projects'); ?></h2>
            <table class="table" cellpadding="0" cellspacing="0">
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('project_name'); ?></th>
                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                    <th><?php echo $this->Paginator->sort('modified'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                <?php foreach ($portfolios as $portfolio): ?>
                    <tr>
                        <td><?php echo h($portfolio['Portfolio']['id']); ?>&nbsp;</td>
                        <td><?php echo h($portfolio['Portfolio']['project_name']); ?>&nbsp;</td>
                        <td><?php echo h($portfolio['Portfolio']['created']); ?>&nbsp;</td>
                        <td><?php echo h($portfolio['Portfolio']['modified']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php echo $this->Link->cLink(__(''), array('action' => 'edit', $portfolio['Portfolio']['id']), 'edit'); ?>
                            <?php echo $this->Link->dLink("", array('action' => 'delete', $portfolio['Portfolio']['id']), 'trash', $portfolio['Portfolio']['id']); ?>                      
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php echo $this->element('pagination'); ?>
    </div>
</div>