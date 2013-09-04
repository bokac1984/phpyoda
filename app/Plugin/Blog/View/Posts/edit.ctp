<?php
echo $this->Html->css('jquery-ui-1.9.2.custom', null, array('inline' => false));
echo $this->Html->css('jquery.tagit', null, array('inline' => false));

echo $this->Html->script('/js/lib/ckeditor/ckeditor', array('block'=>'scriptBottom'));
echo $this->Html->script('/js/lib/jquery-ui-1.9.2.custom.min', array('block'=>'scriptBottom'));
echo $this->Html->script('/js/lib/tag-it.min', array('block'=>'scriptBottom')); 
echo $this->Html->script('phpyoda', array('block'=>'scriptBottom'));
?>
<div class="posts form">
<?php 
echo $this->Form->create('Post', array('id' => 'new-post'));
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
		<legend><?php echo __('Edit Post'); ?></legend>
	<?php
		echo $this->Form->input('user_id', array('div' => 'hidden'));
        echo $this->Form->input(
            'title', 
            array(
                'class' => 'form-control',
                'placeholder' => 'Title',
                'label' => false
            )
        );
		echo $this->Form->input('body', array('class'=>'ckeditor', 'id'=>'ckeditor', 'label' => false));
        echo $this->Form->input('Tag.tag', array(
            'class' => 'tags-input',
            'type' => 'text',
            'label' => 'Tags'
        ));
        echo $this->Form->button('Save', array(
            'type' => 'submit', 
            'class' => 'btn btn-primary',
            'id' => 'save'
            )
        );
//        echo $this->Form->button('Publish', array(
//            'type' => 'submit', 
//            'class' => 'btn btn-primary col-lg-offset-1',
//            'id' => 'publish',
//            'onclick' => 'processForm("this");'
//            )
//        );
        echo $this->Html->link('Discard', 
            $ref,
            array(
                'type' => 'submit', 
                'class' => 'btn btn-primary col-lg-offset-1',
                'id' => 'discard'
            )
        );
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>