<?php

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
    <title><?php echo Configure::read('Website.title')." - ".$title_for_layout; ?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
        echo $this->fetch('meta');
		echo $this->Html->meta('icon');
               
        echo $this->Html->css('http://fonts.googleapis.com/css?family=Oxygen:400,300,700');
        echo $this->Html->css('bootstrap');      
        echo $this->Html->css('main');
        echo $this->Html->css('justified');
        echo $this->fetch('css'); 
        echo $this->fetch('script'); 
        
        echo $this->Html->script('/js/lib/jquery-2.0.0.min');
	?>
</head>
<body>
    <div class="container">
      <div class="masthead">
          <?php 
            echo $this->Html->link(
                            $this->Html->image('logo24.png', array('alt' => 'PHP:Yoda', 'class' => 'logo-img')),
                            array('plugin' => null, 'controller' => 'pages', 'action' => 'index'),
                            array(
                                'escape' => false,
                                'class' => 'logo-a'
                            )
                        );
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
    <?php echo $this->element("/layout/footer"); ?>

    </div> <!-- /container -->
        
    <?php 
    echo $this->element("/layout/ga");
    echo $this->Html->script('/js/lib/bootstrap.min');
    echo $this->Html->script('/js/lib/common');
    echo $this->fetch('scriptBottom'); 
    ?>
    <?php echo $this->element('sql_dump'); ?>
</body>
</html>
