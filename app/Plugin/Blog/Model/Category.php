<?php
App::uses('BlogAppModel', 'Blog.Model');
/**
 * Category Model
 *
 * @property Post $Post
 */
class Category extends BlogAppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
                'message' => 'Category name must not be blank.'
			),
            'unique' => array(
                'rule' => 'isUnique',
                'required' => 'create',
                'message' => 'The category name must be unique.',
                'on' => 'create'
                )
            )
      );

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'category_id',
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
