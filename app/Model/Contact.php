<?php
App::uses('AppModel', 'Model');
/**
 * Contact Model
 *
 */
class Contact extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'I need to know how to address you sir/madam'
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Can you tell me how to contact you?'
			),
		),
		'message' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Is there something you would like to say?'
			),
		),
	);
}
