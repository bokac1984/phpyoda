<?php
echo $this->Html->script('/js/lib/ckeditor/ckeditor', array('block'=>'scriptBottom'));
?>
<div class="row">
  <div class="col-lg-12">
<?php 
    echo $this->Form->create('About', array(
        'plugin' => null,
        'controller' => 'abouts',
        'action' => 'add', 
        'class' => 'form',
        'method' => 'post'
        ));
?>
	<fieldset>
		<legend><?php echo __('Add New About Me text'); ?></legend>
<?php
    echo $this->Form->input('text', array('class'=>'ckeditor', 'id'=>'ckeditor', 'label' => false));
    echo $this->Form->input('active', array(
        'after' => '</label>',
        'before' => '<label class="checkbox">',
        'between' => 'Active about?',
        'type' => 'checkbox',
        'div' => false,
        'label' => false
    ));
    echo $this->Form->button('Save About Me', array('type' => 'submit', 'class' => 'btn btn-default btn-primary'));
?>
    </fieldset>
<?php echo $this->Form->end(); ?>
  </div>
</div>
