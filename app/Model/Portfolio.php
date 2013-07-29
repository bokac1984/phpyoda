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
