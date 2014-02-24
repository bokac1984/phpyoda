<?php
App::uses('Security', 'Utility');
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
    
    
//    foreach($data as $k => $val) {
//      if (is_array($val)) {
//        foreach ($val as $n => $m) {
//          if ($n == 'location') {
//            debug($m);
//            echo $m['name'] = $this->changeName($m['name']);
//          }
//        }
//      }
//    }
//    
//    debug($data);exit();
    
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
  
  private function changeName($name = '') {
    if ($name != '') {
      $filename  = basename($name);
      $extension = pathinfo($filename, PATHINFO_EXTENSION);
      $name = substr(Security::hash($filename, 'md5', 'SDA)d8adojasd908&'), 0, 8).'.'.$extension;
    }
    
    return $name;
  }

}
