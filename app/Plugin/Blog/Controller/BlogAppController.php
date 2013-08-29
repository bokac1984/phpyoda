<?php

App::uses('AppController', 'Controller');

class BlogAppController extends AppController {
    private $adminUser = true;
    
    public function beforeFilter() {
        if (!$this->Auth->user()) {
            $this->layout = 'Blog.blog';
            $this->adminUser = false;
        }
        
        $this->set('admin', $this->adminUser);
        parent::beforeFilter();
    }
}
