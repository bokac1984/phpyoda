<?php 
echo $this->Html->script('phpyoda', array('block' => 'scriptBottom'));
?>
<div class="row-fluid">
    <div class="span12">
        <p>
        Seen enough? Go ahead, and send your message :)
        </p>
    </div>
</div>
<div class="row-fluid">
  <div class="span6">  
    <div class="contact-form">
    <?php
        echo $this->Form->create('Contact', array(
            'action' => 'add'
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
        echo $this->Form->button('Send message', array(
            'type' => 'submit', 
            'class' => 'btn btn-large btn-primary',
            'id' => 'contact-btn'
            ));
        echo $this->Form->end();
    ?>
    </div>
  </div>
</div>