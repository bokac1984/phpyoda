<?php 
$c = $contact['Contact'];
?>
<div class="row-fluid">
    <div class="span3">
        <div class="well sidebar-nav">
            <ul class="nav nav-list">
                <li class="nav-header">Message</li>
                <li class=""><a href="#">Reply</a></li>
                <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $c['id']), null, __('Are you sure you want to delete # %s?', $c['id'])); ?></li>
                <li class="nav-header">Navigation</li>
                <li class=""><a href="/contacts/index">Back</a></li>
            </ul>
        </div><!--/.well -->
    </div><!--/span-->
    <div class="span9">
        <div class="row-fluid">
            <div class="span12">
                <div class="comments view">
                <h2><?php  echo __('Information about contact'); ?></h2>
                    <dl>
                        <dt><?php echo __('Name'); ?></dt>
                        <dd>
                            <?php 
                            echo $c['website'] != "" ? $this->Html->link($c['name'], $c['website'], array('title' => 'That person\'s website'))
                            : $this->Html->link($c['name'], '#', array('title' => 'That person doesn\'t have a website'));
                            ?>
                            &nbsp;
                        </dd>
                        <dt><?php echo __('E-mail'); ?></dt>
                        <dd>
                            <?php echo Sanitize::html($c['email']); ?>
                            &nbsp;
                        </dd>
                        <dt><?php echo __('Message Body'); ?></dt>
                        <dd>
                            <?php echo Sanitize::html($c['message']); ?>
                            &nbsp;
                        </dd>
                        <dt><?php echo __('IP Address'); ?></dt>
                        <dd>
                            <?php echo h($c['ip_address']); ?>
                            &nbsp;
                        </dd>
                        <dt><?php echo __('Time Sent'); ?></dt>
                        <dd>
                            <?php echo $this->Time->format('F jS, Y h:i A', $c['created']); ?>
                            &nbsp;
                        </dd>
                    </dl>
                </div>
            </div><!--/span-->
        </div><!--/row-->
    </div><!--/span-->
</div>