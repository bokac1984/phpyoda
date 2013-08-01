<?php 
echo $this->Html->script('phpyoda', array('block'=>'scriptBottom')); 
$logged = AuthComponent::user('id') ? 'loggedin' : '';
?>
<div class="portfolios index">
    <div class="row-fluid">
        <div class="span12">
            <h3>Here are some projects I participated or created on my own.</h3>
        </div>
    </div>
    <div class="row-fluid">
        <ul class="thumbnails <?php echo $logged;  ?>">
<?php
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
                    <p>Technologies: 
                        <?php foreach ($portfolio['Tag'] as $tag): ?>
                        <span class="badge badge-info"><?php echo $tag['tag']; ?></span>
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