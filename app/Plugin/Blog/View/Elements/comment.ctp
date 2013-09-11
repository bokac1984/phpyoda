<?php
// blog comment elemenet
?>
<div class="contact-form">
    <?php
    echo $this->Form->create('Comment', array(
        'action' => 'add'
    ));
    $this->Form->inputDefaults(array(
        'div' => 'form-group'
            )
    );
    echo $this->Form->input('post_id', array('type' => 'hidden'));
    echo '<h2 class="form-signin-heading">Leave a comment</h2>';
    echo $this->Form->input('commentator', array(
        'class' => 'form-control',
        'placeholder' => 'Name',
        'label' => false
    ));
    echo $this->Form->input('website', array(
        'class' => 'form-control',
        'placeholder' => 'Website',
        'label' => false
    ));
    echo $this->Form->input('email', array(
        'class' => 'form-control',
        'placeholder' => 'Email Address',
        'label' => false
    ));
    ?>
    <div class="form-group"><?php
    echo $this->Form->textarea('text', array(
        'class' => 'form-control',
        'placeholder' => 'Your comment goes here',
        'label' => false
    ));
    ?>
    </div>
        <?php
        echo $this->Form->button('Comment', array(
            'type' => 'submit',
            'class' => 'btn btn-default btn-primary',
            'id' => 'comment-btn'
        ));
        echo $this->Form->end();
        ?>
</div>