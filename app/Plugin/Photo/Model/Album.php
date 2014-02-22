<?php

App::uses('PhotoAppModel', 'Photo.Model');

class Album extends PhotoAppModel {

  public $hasMany = array(
      'Picture' => array(
          'className' => 'Picture',
          'foreignKey' => 'album_id',
          'dependent' => false,
      )
  );

  public function savePictures($id, array $data = array()) {
    $this->loadBehaviors();
    $this->enableBehaviors();
    
    foreach($data as $k => $v) {
      $data[$k]['album_id'] = $id;
    }
    
    return $this->Picture->saveMany($data);
  }

  private function enableBehaviors() {
    if (!$this->Picture->Behaviors->loaded('Uploader.Attachment')) {
      $this->Picture->Behaviors->load('Uploader.Attachment', $this->attachment);
    }
    if (!$this->Picture->Behaviors->loaded('Uploader.FileValidation')) {
      $this->Picture->Behaviors->load('Uploader.FileValidation', $this->validationB);
    }
  }

  private function loadBehaviors() {
    if (!$this->Picture->Behaviors->enabled('Uploader.Attachment')) {
      $this->Picture->Behaviors->enable('Uploader.Attachment');
    }

    if (!$this->Picture->Behaviors->enabled('Uploader.FileValidation')) {
      $this->Picture->Behaviors->enable('Uploader.FileValidation');
    }
  }

}
