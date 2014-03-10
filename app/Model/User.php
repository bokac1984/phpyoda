<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 * @property Group $Group
 * @property Post $Post
 */
class User extends AppModel {

  /**
   * Display field
   *
   * @var string
   */
  public $displayField = 'username';

  /**
   * Validation rules
   *
   * @var array
   */
  public $validate = array(
      'group_id' => array(
          'numeric' => array(
              'rule' => array('numeric'),
          ),
          'notempty' => array(
              'rule' => array('notempty'),
          ),
      ),
      'email' => array(
          'notempty' => array(
              'rule' => array('notempty'),
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
      'Group' => array(
          'className' => 'Group',
          'foreignKey' => 'group_id',
          'conditions' => '',
          'fields' => '',
          'order' => ''
      )
  );
  
  public $hasOne = array(
      'UserIp' => array(
          'className' => 'UserIp',
          'foreignKey' => 'user_id',
      )
  );

  /**
   * hasMany associations
   *
   * @var array
   */
  public $hasMany = array(
      'Post' => array(
          'className' => 'Post',
          'foreignKey' => 'user_id',
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
  public $actsAs = array('Acl' => array('type' => 'requester', 'enabled' => false));

  public function parentNode() {
    if (!$this->id && empty($this->data)) {
      return null;
    }
    if (isset($this->data['User']['group_id'])) {
      $groupId = $this->data['User']['group_id'];
    } else {
      $groupId = $this->field('group_id');
    }
    if (!$groupId) {
      return null;
    } else {
      return array('Group' => array('id' => $groupId));
    }
  }

  /**
   * 
   * @param type $user
   * @return type
   */
  public function bindNode($user) {
    return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
  }

  public function beforeSave($options = array()) {
    $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
    return parent::beforeSave();
  }
  
  public function validSecretAnswer($answer = '') {
    $a = $this->find('first', array(
        'conditions' => array(
            'User.secret_answer' => $answer
        )
    ));

    return count($a) != 0;
  }

}
