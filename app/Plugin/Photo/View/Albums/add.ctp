<?php
$this->startIfEmpty('maintitle');
echo $this->element('titles', array('maintitle' => 'Albums', 'subtitle' => 'Add New Album'));
$this->end();

echo $this->Form->create('Album');

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
echo $this->Form->input('name', array(
    'class' => 'form-control',
    'placeholder' => 'Album Name',
    'label' => false,
    'type' => 'text',
    'before' => '<div class="col-xs-5">',
    'after' => '</div>'
));

echo $this->Form->button('Save Album', array(
    'type' => 'submit',
    'class' => 'btn btn-primary margint20',
    'id' => 'save-images'
));

echo $this->Form->end();
?>