<?php

App::uses('AppController', 'Controller');

class BlogAppController extends AppController {
    private $adminUser = true;
    protected $limitQuery = 5;
    
    public function beforeFilter() {
        if (!$this->Auth->user()) {
            $this->adminUser = false;
        }
        
        $this->set('admin', $this->adminUser);
        parent::beforeFilter();
    }
}
