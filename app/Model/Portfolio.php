<?php
App::uses('AppModel', 'Model');
/**
 * Portfolio Model
 *
 * @property Tag $Tag
 * @property Tag $Tag
 */
class Portfolio extends AppModel {
	public $actsAs = array(
		'Uploader.Attachment' => array(
			'screen_shot' => array(
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
						'width' => 300,
						'height' => 200,
						'dbColumn' => 'screen_shot'
					)
				)
			)
		),
		'Uploader.FileValidation' => array(
			'screen_shot' => array(
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
		'project_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'technologies' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'order' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
    
//The Associations below have been created with all possible keys, those that are not needed can be removed
    
/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Tag' => array(
			'className' => 'Tag',
			'joinTable' => 'portfolios_tags',
			'foreignKey' => 'portfolio_id',
			'associationForeignKey' => 'tag_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
