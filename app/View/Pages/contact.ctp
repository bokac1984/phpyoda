<?php
    echo $this->Form->create('User', array(
        'action' => 'contact'
        ));
    echo '<h2 class="form-signin-heading">Contact me if you dare</h2>';
    echo $this->Form->input('name', array(
        'class' => 'input-block-level',
        'placeholder' => 'Name',
        'label' => false
    ));
    echo $this->Form->input('email', array(
        'class' => 'input-block-level',
        'placeholder' => 'Email Address',
        'label' => false
    ));
    echo $this->Form->textarea('message', array(
        'class' => 'input-block-level',
        'placeholder' => 'Your message',
        'label' => false
    ));
    echo $this->Form->button('Send message', array('type' => 'submit', 'class' => 'btn btn-large btn-block btn-primary'));
    echo $this->Form->end();
?>