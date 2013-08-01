<?php
echo $this->Html->script('/js/lib/ckeditor/ckeditor', array('block'=>'scriptBottom'));
?>
<div class="abouts form">
<?php echo $this->Form->create('About'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->textarea('text', array('class'=>'ckeditor', 'id'=>'ckeditor'));
        echo $this->Form->button('Save about me info', array(
            'type' => 'submit', 
            'class' => 'btn btn-primary margint20',
            'id' => 'save-about'
            ));
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
