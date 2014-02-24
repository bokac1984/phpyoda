<?php

App::uses('PhotoAppController', 'Photo.Controller');

/**
 * Pictures Controller
 *
 */
class PicturesController extends PhotoAppController {

  public function beforeFilter() {
    parent::beforeFilter();
    $this->Security->unlockedActions = array('updateViews');
    $this->Auth->allow(array('index'));
  }

  public function index() {
    $this->set('title_for_layout', Configure::read('Website.title') . ' - Photo');
    $this->Picture->recursive = 1;
    $pictures = $this->paginate('Picture');
    $this->set('pictures', $pictures);
  }
  
  public function updateViews() {
    $this->autoRender = false;	
       
    if ($this->request->is('ajax')){
      debug($this->request->data);
//    $this->Picture->id = $id;
//    if (!$this->Picture->exists()) {
//        throw new NotFoundException(__('Invalid Picture Id'));
//    }
//      $this->Picture->saveField('views', 'views + 1');
    }
  }

}
