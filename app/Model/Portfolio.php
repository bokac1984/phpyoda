<?php
App::uses('AppModel', 'Model');
/**
 * Portfolio Model
 *
 */
class Portfolio extends AppModel {
    
	public $actsAs = array(
		'Uploader.Attachment' => array(
			'image' => array(
				'tempDir' => TMP,
				'overwrite' => true,
				'self' => true,
				'uploadDir' => '/img/uploads/',
				'finalPath' => '/img/uploads/',
				'transforms' => array(
					array(
						'method' => 'crop',
						'append' => '',
						'overwrite' => true,
						'self' => true,
						'width' => 240,
						'height' => 200,
						'dbColumn' => 'image'
					)
				)
			)
		),
		'Uploader.FileValidation' => array(
			'fileName' => array(
				'maxWidth' => array(
					'value' => 1200, 
					'error' => 'Width incorrect'
				),
				'maxHeight' => array(
					'value' => 1200, 
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
					'error' => 'File required'
				)
			)
		)
	);
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'text' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'screen_shot' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
