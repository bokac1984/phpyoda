<?php

App::uses('PhotoAppController', 'Photo.Controller');

/**
 * Pictures Controller
 *
 */
class PicturesController extends PhotoAppController {

  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow(array('index', 'updateViews'));
    $this->Security->unlockedActions = array('updateViews');
  }

  public function index() {
    $this->set('title_for_layout', Configure::read('Website.title') . ' - Photo');
    $this->Picture->recursive = 1;
    $pictures = $this->paginate('Picture');
    $this->set('pictures', $pictures);
  }

  public function updateViews() {
    $this->autoRender = false;

    if ($this->request->is('ajax')) {

      $this->Picture->id = $this->request->data['id'];
      if (!$this->Picture->exists()) {
        throw new NotFoundException(__('Invalid Picture Id'));
      }

      $this->Picture->updateAll(array('Picture.views' => 'Picture.views + 1'), array('Picture.id' => $this->request->data['id']));
      debug($this->Picture->getLastQuery());
    }
  }

}
