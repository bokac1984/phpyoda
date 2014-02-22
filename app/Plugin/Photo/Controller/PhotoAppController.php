<?php

App::uses('AppController', 'Controller');

class PhotoAppController extends AppController {
  
  public function beforeFilter() {
    parent::beforeFilter();
    
    if (!$this->adminUser) {
      $this->layout = 'photo';
    }
    
  }
}
