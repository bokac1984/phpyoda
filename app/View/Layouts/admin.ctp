<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout; ?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
	<?php
		echo $this->Html->meta('icon');
        
        echo $this->Html->css('bootstrap');
        echo $this->Html->css('main');
        echo $this->Html->css('bootstrap-responsive');
        echo $this->fetch('css'); 
        
        echo $this->Html->script('/js/lib/jquery-2.0.0.min');
	?>
</head>
<body>
    <div class="container">

      <div class="masthead">
          <h3 class="muted title"><?php echo Configure::read('Website.title'); ?></h3>
      </div>
        
      <hr>
      <!-- Example row of columns -->

    <?php 
    echo $this->Session->flash('auth');
    echo $this->Session->flash(); 

    echo $this->fetch('content'); 
    ?>


      <hr>

    <?php echo $this->element("/layout/footer"); ?>

    </div> <!-- /container -->
        
    <?php 
    echo $this->element("/layout/ga");
    echo $this->Html->script('/js/lib/bootstrap.min');
    echo $this->fetch('scriptBottom'); 
    ?>
    
</body>
</html>
