<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php echo $this->Html->charset(); ?>
    <title><?php echo Configure::read('Website.title') . " - " . $title_for_layout; ?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    echo $this->fetch('meta');
    echo $this->Html->meta('icon');

    echo $this->Html->css('http://fonts.googleapis.com/css?family=Oxygen:400,300,700');
    echo $this->Html->css('bootstrap');
    //echo $this->Html->css('main');
    echo $this->Html->css('photo');
    echo $this->Html->css('justified');
    echo $this->fetch('css');
    echo $this->fetch('script');

    echo $this->Html->script('/js/lib/jquery-2.0.0.min');
    ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style type="text/css"></style>
  </head>

  <body style="">
    <?php if ($userMessage != NULL): ?>
    <div class="user-message"><?php echo $userMessage['message']; ?></div>
    <?php endif; ?>
    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><?php echo Configure::read('Website.title'); ?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><?php echo $this->Html->link('Back to Main site »', array('plugin' => '', 'controller' => 'pages', 'action' => 'index')); ?></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p>
          <?php 
          echo $this->Html->getCrumbList(
                  array(
                    'class' => 'breadcrumb',
                  ), 
                  array(
                    'text' => 'Home',
                    'url' => array('plugin' => 'photo', 'controller' => 'galleries', 'action' => 'index'),
                    'escape' => false
                  )
                ); 
          ?>
          </p>
        </div>
      </div>

      <?php 
      echo $this->Session->flash('auth');
      echo $this->Session->flash(); 

      echo $this->fetch('content'); 
      ?>
      <hr>
      <?php echo $this->element("/layout/footer"); ?>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php
    echo $this->element("/layout/ga");
    echo $this->Html->script('/js/lib/bootstrap.min');
    echo $this->Html->script('/js/lib/common');
    echo $this->Html->script('/js/photo/photo');
    echo $this->fetch('scriptBottom');
    ?>


  </body></html>