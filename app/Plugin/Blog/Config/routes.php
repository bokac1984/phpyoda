<?php

Router::connect('/posts/:slug', array(
    'plugin' => 'Blog',
    'controller' => 'posts',
    'action' => 'view'), array(
    'pass' => array('slug'),
    'slug' => '[a-zA-Z0-9_-]+'
));

Router::connect('/posts/search/category/:term', array(
    'plugin' => 'Blog',
    'controller' => 'posts',
    'action' => 'search'), array(
    'pass' => array('term'),
    array(
        'term' => '[a-zA-Z]+'
    )
));
?>
