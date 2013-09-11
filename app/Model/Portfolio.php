<?php
App::uses('AppModel', 'Model');
/**
 * Portfolio Model
 *
 * @property Image $Image
 */
class Portfolio extends AppModel {
	public $actsAs = array(
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
				//'message' => 'Your custom message here',
			),
		),
		'description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Image' => array(
			'className' => 'Image',
			'foreignKey' => 'portfolio_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
