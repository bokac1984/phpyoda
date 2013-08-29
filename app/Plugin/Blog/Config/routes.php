<?php

Router::connect('/posts/:slug', 
        array(
            'plugin' => 'blog', 
            'controller' => 'posts', 
            'action' => 'view'),
        array(
            'pass' => array('slug'), 
            'slug' => '[a-zA-Z0-9_-]+'
)        );

?>
