<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$company = Configure::read('Website.title');
$year = date('Y');
?>
<div class="footer center">
  <p>Bokac © <?php echo $company," ", $year; ?> <b>|</b> <?php echo $this->Html->link("Try the force", '/users/login', array('title'=> 'Only for the brave ones')); ?> <b>|</b> Powered by 			
      <?php echo $this->Html->link(
					$this->Html->image('cake.icon.png', array('alt' => $cakeDescription, 'title'=> $cakeDescription,'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
    ?>
  </p>
</div>