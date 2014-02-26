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
    $this->Security->unlockedActions = array('makeCover');
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

      $this->Picture->updateAll(array('Picture.views' => '`Picture`.`views` + 1'), array('Picture.id' => $this->request->data['id']));
    }
  }
  
  public function showHidePictures() {
    $this->autoRender = false;

    if ($this->request->is('ajax')) {
      $data = array(
          'Picture' => array()
      );
    }
  }
  
  public function makeCover() {
    $this->autoRender = false;

    if ($this->request->is('ajax')) {
      
      $data = array(
          'Picture' => array(
              0 => array(
                  'cover' => false,
                  'id' => $this->request->data['removeId'][0]
              ),
              1 => array(
                  'cover' => true,
                  'id' => $this->request->data['id'][0]
              )
          )
      );
      
      $res = array();
      $res['success'] = $this->Picture->saveMany($data['Picture']);
      echo json_encode($res);
    }
  }

}
