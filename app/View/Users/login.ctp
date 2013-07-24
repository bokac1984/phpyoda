<?php
    echo $this->Form->create('User', array(
        'action' => 'login', 
        'class' => 'form-signin'
        ));
    echo '<h2 class="form-signin-heading">Please sign in</h2>';
    echo $this->Form->input('username', array(
        'class' => 'input-block-level',
        'placeholder' => 'Username',
        'label' => false
    ));
    echo $this->Form->input('password', array(
        'class' => 'input-block-level',
        'placeholder' => 'Password',
        'label' => false
    ));
?>
    <label class="checkbox">
        <input type="checkbox" value="remember-me"> Remember me
    </label>
<?php
    echo $this->Form->button('Sign in', array('type' => 'submit', 'class' => 'btn btn-large btn-block btn-primary'));
    echo $this->Form->end();
?>