<div class="row-fluid">
  <div class="span12">
      <p>Oh no, what have you done?</p>
      <p>You have tried logging in <?php echo $attempts; ?> time(s), so you have to wait <?php echo $time; ?> to log in again.</p>
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