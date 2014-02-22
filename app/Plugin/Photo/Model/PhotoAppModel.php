<?php

App::uses('AppModel', 'Model');

class PhotoAppModel extends AppModel {

  protected $attachment = array(
      'location' => array(
          'tempDir' => TMP,
          'overwrite' => true,
          'self' => true,
          'uploadDir' => '/img/albums/',
          'finalPath' => '/img/albums/',
          'transforms' => array(
              'imageSmall' => array(
                  'method' => 'crop', // or crop
                  'append' => '-small',
                  'overwrite' => true,
                  'self' => false,
                  'aspect' => true,
                  'width' => 100,
                  'dbColumn' => 'thumbnail',
                  'height' => 100
              ),
              'imageMedium' => array(
                  'method' => 'resize',
                  'append' => '-medium',
                  'width' => 300,
                  'height' => 200,
                  'aspect' => true,
                  'dbColumn' => 'medium'
              )
          ),
          'dbColumn' => 'location'
      )
  );
  protected $validationB = array(
      'location' => array(
          'maxWidth' => array(
              'value' => 2000,
              'error' => 'Width incorrect'
          ),
          'maxHeight' => array(
              'value' => 2000,
              'error' => 'Height incorrect'
          ),
          'extension' => array(
              'value' => array('gif', 'jpg', 'png', 'jpeg'),
              'error' => 'Mimetype incorrect',
          ),
          'filesize' => array(
              'value' => 1048576,
              'error' => 'Filesize incorrect'
          ),
          'required' => array(
              'value' => true,
              'error' => 'Please select one image for the project'
          )
      )
  );

}
