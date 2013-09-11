<?php 
echo $this->Html->css('lightbox', null, array('inline' => false));
echo $this->Html->script('/js/lib/jquery.roundabout.min', array('block'=>'scriptBottom')); 
echo $this->Html->script('/js/lib/lightbox/lightbox-2.6.min', array('block'=>'scriptBottom'));
echo $this->Html->script('phpyoda', array('block'=>'scriptBottom')); 
$logged = AuthComponent::user('id') ? 'loggedin' : '';
?>
<ul class="test <?php echo $logged; ?>">
<?php

foreach ( $portfolios as $portfolio ):
?>
    <li>
        <div class="wrapper row">
            <div class="col-lg-12">
                <div class="row">
                    <h4><?php echo $portfolio['Portfolio']['project_name']; ?></h4>
                    <hr />
                    <?php
                        echo $this->Html->link(
                            $this->Html->image($portfolio['Image'][0]['medium']),
                            $portfolio['Image'][0]['uploaded'],
                            array(
                                'target'=> '_blank',
                                'escape'=> false,
                                'rel' => 'lightbox'
                            )
                        );
                    ?>
                    <hr />
                    <div class="description">
                        <p><?php echo $portfolio['Portfolio']['description']; ?></p>
                    </div>
                    <hr />
                    <span class="glyphicon glyphicon-tags">&nbsp;</span> 
                    <?php foreach ($portfolio['Tag'] as $tag): ?>
                    <span class="label label-primary"><?php echo $tag['tag']; ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </li>
<?php
endforeach;
?>
</ul>