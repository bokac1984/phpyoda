<?php 
echo $this->Html->css('jquery-ui-1.9.2.custom', null, array('inline' => false));
echo $this->Html->css('jquery.tagit', null, array('inline' => false));

echo $this->Html->script('/js/lib/jquery-ui-1.9.2.custom.min', array('block'=>'scriptBottom'));
echo $this->Html->script('/js/lib/tag-it.min', array('block'=>'scriptBottom')); 
echo $this->Html->script('phpyoda', array('block'=>'scriptBottom'));

?>
<div class="portfolios form">
<?php 
        echo $this->Form->create('Portfolio', array('type' => 'file')); 

        $this->Form->inputDefaults(array(
                'error' => array(
                        'attributes' => array(
                            'wrap' => 'div',
                            'class' => 'label label-warning'
                        )
                    ),
                    'div' => 'form-group'
            )
        );
?>
    
	<fieldset>
		<legend><?php echo __('Add Portfolio'); ?></legend>
	<?php
        echo $this->Form->input('project_name', array(
            'class' => 'form-control',
            'placeholder' => 'Project Name',
            'label' => false
        ));
        echo $this->Form->textarea('description', array(
            'class' => 'form-control',
            'placeholder' => 'Brief description of the project',
            'label' => false
        ));
        
        echo $this->Form->input('Image.0.uploaded', array(
            'type' => 'file', 
            'multiple' => 'multiple',
            'label' => 'Project images (Select as many as you want)'
            )
        );
        
        echo $this->Form->input('Tag.tag', array(
            'class' => 'tags-input',
            'type' => 'text',
            'label' => 'Tags'
        ));
        
        echo $this->Form->button('Save portfolio', array(
            'type' => 'submit', 
            'class' => 'btn btn-primary margint20',
            'id' => 'save-portfolio'
        ));
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>