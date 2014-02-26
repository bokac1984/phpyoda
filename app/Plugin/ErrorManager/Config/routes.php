<?php

Router::connect('/errormanager', 
        array(
            'plugin' => 'errormanager', 
            'controller' => 'errorlogs', 
            'action' => 'index')   
        );

?>
