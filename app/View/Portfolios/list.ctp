<?php 
echo $this->Html->script('phpyoda', array('block'=>'scriptBottom')); 
$logged = AuthComponent::user('id') ? 'loggedin' : '';
?>
<div class="portfolios index">
    <div class="row">
        <div class="col-lg-12">
            <h3>Here are some projects I participated in or created on my own.</h3>
        </div>
    </div>
    <div class="row">
        <ul class="media-list <?php echo $logged;  ?>">
<?php
$numPortfolios = count($portfolios);
$i = 0;
foreach ( $portfolios as $portfolio):
    if ($i % 3 == 0 && $i > 1) {
        echo "</ul><ul class='media-list $logged'>";
    }
?>
        <li class="col-lg-4">
            <div class="thumbnail" data-id="<?php echo $portfolio['Portfolio']['id']; ?>">
<?php
    echo $this->Html->image($portfolio['Portfolio']['screen_shot'], array('class'=>'media-object'));
    $i++;
?>
                <div class="caption">
                    <h3><?php echo $portfolio['Portfolio']['project_name']; ?></h3>
                    <p><?php echo $portfolio['Portfolio']['description']; ?></p>
                    <p>Technologies: 
                        <?php foreach ($portfolio['Tag'] as $tag): ?>
                        <span class="label label-primary"><?php echo $tag['tag']; ?></span>
                        <?php endforeach; ?>
                    </p>
                  </div>
            </div>
        </li>
<?php
endforeach;
?>
        </ul>
    </div>
</div>