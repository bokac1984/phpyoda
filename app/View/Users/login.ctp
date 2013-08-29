<div class="row-fluid">
  <div class="span12">
    <?php
        echo $this->Form->create('User', array(
            'plugin' => null,
            'controller' => 'users',
            'action' => 'login', 
            'class' => 'form-signin',
            'method' => 'post'
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
        echo $this->Form->input('rememberme', array(
            'after' => '</label>',
            'before' => '<label class="checkbox">',
            'between' => 'Remember me',
            'type' => 'checkbox',
            'div' => false,
            'label' => false
        ));
        
        echo $this->Form->button('Sign in', array('type' => 'submit', 'class' => 'btn btn-large btn-block btn-primary'));
        echo $this->Form->end();
    ?>
  </div>
</div>
<div class="row-fluid">
  <div class="span4 offset4">
      <?php 
      echo $this->Html->link("Get me out of here", 
              array('controller' => 'pages', 'action' => 'index'),
              array('class' => 'btn btn-large btn-block btn-primary'));
      ?>
  </div>
</div>