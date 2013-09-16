<?php
App::uses('BlogAppModel', 'Blog.Model');
/**
 * Comment Model
 *
 * @property Post $Post
 */
class Comment extends BlogAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'post_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'text' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Nothing to say? Eh...',
			)
		),
		'commentator' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Who are you?',
				'last' => true, // Stop validation after this rule

			),
            'alphanumeric' => array(
                'rule' => 'alphanumeric',
                'message' => 'Only letters'
            )
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'If you\'re already providing this, make it real',
				'allowEmpty' => false,
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'post_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
