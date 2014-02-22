<?php

Router::connect('/photo', 
        array(
            'plugin' => 'photo', 
            'controller' => 'galleries', 
            'action' => 'index')   
        );

?>
