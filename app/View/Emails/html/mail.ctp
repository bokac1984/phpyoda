<p><?php echo $message; ?></p>

<?php
echo $this->Html->link("Login", 
        'http://www.phpyoda.com/users/login',
        array(
              'target'=>'_blank',
              'escape'=>false
          )
        ); 
?>