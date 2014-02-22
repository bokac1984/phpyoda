<?php

App::uses('PhotoAppController', 'Photo.Controller');

/**
 * PicturesController
 *
 */
class PicturesController extends PhotoAppController {

  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow(array('index'));
  }

  public function index() {
    $this->set('title_for_layout', Configure::read('Website.title') . ' - Photo');
    $this->Picture->recursive = 1;
    $pictures = $this->paginate('Picture');
    $this->set('pictures', $pictures);
  }
//
//  public function add() {
//    if ($this->request->is('post')) {
//      $this->Picture->create();
//      $data = array(                  
//          'Picture' => array(
//              0 => array(
//                  'location' => 'bbb'
//                  ),
//              1 => array(
//                  'location' => 'aaa'
//              )
//          )
//      );
//      //$this->request->data = $data;
//      debug($this->request->data);
//      //exit();
//      if ($this->Picture->saveMany($this->request->data['Picture'])) {
//        $this->Session->setFlash(__('The images has been saved'), 'flashSuccess');
//        //debug($this->insertedKeys);
//        //$this->Session->write('imageKeys', $this->insertedKeys);
//        //$this->redirect(array('action' => 'setup'));
//      } else {
//        $this->Session->setFlash(__('The pictures could not be saved. Please, try again.'), 'flashError');
//      }
//    }
//    $this->set('albums', $this->Picture->Album->find('list'));
//  }

  public function setup() {
    $this->set('keys', $this->Session->read('imageKeys'));
  }

}
