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
        <h3 class="muted">Project name</h3>
        <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
              <ul class="nav">
                <li class="active"><a href="./Template · Bootstrap_files/Template · Bootstrap.html">Home</a></li>
                <li><?php echo $this->Html->link("Portfolio", array('controller' => 'pages', 'action' => 'portfolio')); ?></li>
                <li><?php echo $this->Html->link("About", array('controller' => 'pages', 'action' => 'about')); ?></li>
                <li><?php echo $this->Html->link("Contact", array('controller' => 'pages', 'action' => 'contact')); ?></li>
                <li><?php echo $this->Html->link("Blog", array('controller' => 'blog', 'action' => 'index')); ?></li>
              </ul>
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
