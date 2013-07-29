<div class="portfolios form">
    <?php echo $this->Form->create('Portfolio', array(
            'type'=>'file'
        )); 
    ?>

	<fieldset>
		<legend><?php echo __('Add Portfolio'); ?></legend>
	<?php
		echo $this->Form->input('text');
		echo $this->Form->input('screen_shot', array('type'=>'file', 'multiple'));
        echo $this->Form->button('Save', array('class'=>'btn btn-primary'));
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
