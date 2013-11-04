<?php
$this->log($url." - remote address: ".$_SERVER['REMOTE_ADDR'], 'notfound');
?>
<div class="row not-found">
    <div class="col-lg-5">      
        <?php echo $this->Html->image('yoda.png', array('width' => 270, 'height' => 353)); ?>
    </div>
    <div class="col-lg-7">
        <h1>404</h1>
        <p class="error">
            <?php
            printf(
                __d('cake', 'Sorry but find this page Yoda can not.')
            );
            ?>
        </p>
    </div>
</div>
<?php
if (Configure::read('debug') > 0):
    echo $this->element('exception_stack_trace');
endif;
?>
