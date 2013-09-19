<?php
// blog comment elemenet
?>
<div class="comment-form">
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
    echo $this->Form->input('gravatar', array(
        'label' => false,
        'before' => '<label class="checkbox" style="font-weight: normal; color: #838282;">',
        'after' => ' Use my Gravatar <a title="Gravatar" target="_blank" Website" href="http://en.gravatar.com/"><span class="badge">?</span></a></label>',
        'type' => 'checkbox',
        'div' => false
    ));
    echo $this->Form->input('field', array(
        'label' => false,
        'class' => 'hide-this'
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