<div class="portfolios form">
<?php echo $this->Form->create('Portfolio', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Portfolio'); ?></legend>
	<?php
        echo $this->Form->input('project_name', array(
            'class' => 'input-block-level',
            'placeholder' => 'Project Name',
            'label' => false
        ));
        echo $this->Form->input('technologies', array(
            'class' => 'input-block-level',
            'placeholder' => 'Technologies',
            'label' => false
        ));
        echo $this->Form->textarea('description', array(
            'class' => 'input-block-level',
            'placeholder' => 'Brief description of the project',
            'label' => false
        ));
        echo $this->Form->input('screen_shot', array('type' => 'file'));
        
        echo $this->Form->input('Tag');
        
        echo $this->Form->button('Send message', array(
            'type' => 'submit', 
            'class' => 'btn btn-primary',
            'id' => 'save-portfolio'
            ));
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>