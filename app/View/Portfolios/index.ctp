<?php 
echo $this->Html->script('phpyoda', array('block'=>'scriptBottom')); 
$logged = AuthComponent::user('id') ? 'loggedin' : '';
?>
<div class="portfolios index">
    <div class="row-fluid">
        <ul class="thumbnails <?php echo $logged;  ?>">
<?php

/*
 To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$numPortfolios = count($portfolios);
$i = 0;
foreach ( $portfolios as $portfolio):
    if ($i % 3 == 0 && $i > 1) {
        echo "</ul><ul class='thumbnails $logged'>";
    }
?>
        <li class="span4">
            <div class="thumbnail" data-id="<?php echo $portfolio['Portfolio']['id']; ?>">
<?php
    echo $this->Html->image($portfolio['Portfolio']['screen_shot'], array('class'=>'img-polaroid'));
    $i++;
?>
                <div class="caption">
                    <h3><?php echo $portfolio['Portfolio']['project_name']; ?></h3>
                    <p><?php echo $portfolio['Portfolio']['description']; ?></p>
                    <p>Technologies: <span class="badge badge-info"><?php echo $portfolio['Portfolio']['technologies']; ?></span></p>
                  </div>
            </div>
        </li>
<?php
endforeach;
?>
        </ul>
    </div>
</div>