<?php

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
        
        echo $this->Html->css('bootstrap');
        echo $this->Html->css('main');

		echo $this->fetch('meta');
		echo $this->fetch('css');
        echo $this->Html->script('jquery-2.0.0.min');
	?>
</head>
<body>
    <div class="container">

      <div class="masthead">
        <h3 class="muted">PHP Yoda</h3>
        <?php 
            if (!$this->Session->read('Auth.User')) {
                echo $this->element("menu");
            } else {
                echo $this->element("adminMenu");
            }
         ?>
      </div>
      
      <!-- Example row of columns -->

    <?php 
    echo $this->Session->flash('auth');
    echo $this->Session->flash(); 

    echo $this->fetch('content'); 
    ?>


      <hr>

      <div class="footer">
        <p>© Company 2013</p>
      </div>

    </div> <!-- /container -->
        
    <?php 
    echo $this->Html->script('bootstrap.min');
    echo $this->fetch('scriptBottom'); 
    ?>
    
</body>
</html>
