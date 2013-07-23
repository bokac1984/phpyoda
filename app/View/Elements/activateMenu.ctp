<?php
echo $this->Html->scriptBlock('
    $(".nav li").each(function(){
        $(this).removeClass("active");
    });    
');
?>
