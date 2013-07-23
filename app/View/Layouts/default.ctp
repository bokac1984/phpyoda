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
        <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
                <?php echo $this->element("menu"); ?>
            </div>
          </div>
        </div><!-- /.navbar -->
      </div>
      
      <!-- Example row of columns -->
      <div class="row-fluid">
        <div class="span12">
			<?php 
            echo $this->Session->flash('auth');
            echo $this->Session->flash(); 
            ?>
            <?php echo $this->fetch('content'); ?>
        </div>
      </div>

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
