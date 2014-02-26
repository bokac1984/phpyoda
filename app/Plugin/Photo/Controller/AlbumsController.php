<?php

App::uses('PhotoAppController', 'Photo.Controller');

/**
 * Albums Controller
 *
 */
class AlbumsController extends PhotoAppController {

  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow(array('index', 'view'));
  }

  public function index() {
    $this->set('title_for_layout', Configure::read('Website.title') . ' - Photo');
    
    $albums = $this->Album->find('all', array(
        'contain' => array(
            'Picture' => array(
                'conditions' => array(
                    'cover' => true
                )
            )
        )
    ));
    
    $this->set('albums', $albums);
  }

  /**
   * view method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function view($id = null) {
    $this->Album->id = $id;
    if (!$this->Album->exists()) {
      throw new NotFoundException(__('Invalid contact'));
    }

    $album = $this->Album->find('first', array(
      'contain' => array(
          'Picture' => array(
              'conditions' => array(
                  'display' => true
              )
          )
      )
    ));
    
    if (empty($album['Picture'])) {
        $this->Session->setFlash(__('The selected album is empty, try different one', 'flashError'));
        $this->redirect(array('action' => 'index'));
    }

    $this->set('album', $album);
  }

  public function add() {
    $this->set('title_for_layout', 'Add new album');
    if ($this->request->is('post')) {
      $this->Album->create();
      if ($this->Album->save($this->request->data)) {
        $this->Session->setFlash(__('Album has been saved'));
        $this->redirect(array('action' => 'addPhotos', $this->Album->getLastInsertID()));
      } else {
        $this->Session->setFlash(__('The album could not be saved. Please, try again.'));
      }
    }
  }
  
  public function addPhotos($id = null) {
    $this->Album->id = $id;
    if (!$this->Album->exists()) {
      throw new NotFoundException(__('Album does not exist'));
    }
    
    if ($this->request->is('post') || $this->request->is('put')) {    
      if ($this->Album->savePictures($id, $this->request->data['Picture'])) {
        $this->Session->setFlash(__('The album has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The contact could not be saved. Please, try again.'));
      }
    } else {
      $this->request->data['Album']['id'] = $id;
    }
  }
  
  public function edit($id = null) {
    $this->Album->id = $id;
    if (!$this->Album->exists()) {
      throw new NotFoundException(__('Album does not exist'));
    }
    
    $album = $this->Album->find('first', array(
      'contain' => array(
          'Picture' => array(
              'order' => array(
                  'views' => 'DESC'
              )
          )
      )
    ));
    
    if (empty($album['Picture'])) {
        $this->Session->setFlash(__('The selected album is empty, please add some photos to it.', 'flashError'));
        $this->redirect(array('action' => 'addPhotos', $id));
    }
    $this->set('album', $album);
  }

}
