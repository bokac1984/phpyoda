<?php
App::uses('AppModel', 'Model');
/**
 * Portfolio Model
 *
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
					'error' => 'Please select one image for the project'
				)
			)
		),
        'Taggable' => array(
			'joinTable' => 'portfolios_tags',
			'foreignKey' => 'portfolio_id',
        )
	);
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'project_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Should not be empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'technologies' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Should not be empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Should not be empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);           
}
