<?php
?>
<div class="jumbotron">
  <h1>Zdravo prijatelji</h1>
  <p>Ako vec gledate ovu stranicu dozvolite mi da Vam pozelim dobrodoslicu. Znaci da ste u uskom krugu ljudi koji mogu vidjeti ovo. </p>
  <p>Pogledajte galeriju slika klikom na dugme ispod</p>
  <p><?php echo $this->Html->link('Galerija »', array('plugin' => 'photo', 'controller' => 'albums', 'action' => 'index'), array('class' => 'btn btn-primary btn-lg')); ?></p>
</div>
