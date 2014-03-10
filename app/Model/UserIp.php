<?php
App::uses('AppModel', 'Model');
/**
 * UserIp Model
 *
 * @property User $User
 */
class UserIp extends AppModel {
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
    
    public function getAllUserIp() {
      $ret = array();
      $ips = $this->find('all', array(
          'fields' => array('ip')
      ));
      
      if (count($ips) > 0) {
        foreach ($ips as $user => $ip) {
          $ret[] = $ip['UserIp']['ip'];
        }
      }
      
      return $ret;
    }
}
