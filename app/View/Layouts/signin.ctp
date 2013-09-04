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
        echo $this->Html->script('/js/lib/jquery-2.0.0.min');
	?>
</head>
<body>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-12">
			<?php 
            echo $this->Session->flash('auth');
            echo $this->Session->flash(); 
            ?>
            <?php echo $this->fetch('content'); ?>
        </div>
      </div>
      <hr />
    <?php echo $this->element("/layout/footer"); ?>
    </div> <!-- /container -->
        
    <?php 
    echo $this->Html->script('/js/lib/bootstrap.min');
    echo $this->fetch('scriptBottom'); 
    ?>
    
</body>
</html>
