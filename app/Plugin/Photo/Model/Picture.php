<?php

App::uses('PhotoAppModel', 'Photo.Model');
App::uses('File', 'Utility');

class Picture extends PhotoAppModel {
  
  protected $insertedKeys = array();
  
  public $validate = array(
      'album_id' => array(
          'notempty' => array(
              'rule' => array('notempty'),
              'message' => 'Please select Album',
          ),
      ),
  );

  /**
   * belongsTo associations
   *
   * @var array
   */
  public $belongsTo = array(
      'Album' => array(
          'className' => 'Album',
          'foreignKey' => 'album_id',
          'conditions' => '',
          'fields' => '',
          'order' => ''
      )
  );
  
public function formatName($name, $file) {
	return sprintf('%s-%s', $name, $file->size());
}
}
