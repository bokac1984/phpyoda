<?php

App::uses('ErrorManagerAppModel', 'ErrorManager.Model');

class ErrorLog extends ErrorManagerAppModel {

  public function beforeSave($options = array()) {
    $this->data[$this->alias]['user_agent'] = env('HTTP_USER_AGENT');
    $this->data[$this->alias]['url'] = env('REQUEST_URI');
    $this->data[$this->alias]['ip'] = env('REMOTE_ADDR');
    $this->data[$this->alias]['port'] = env('REMOTE_PORT');
    $this->data[$this->alias]['method'] = env('REQUEST_METHOD');
    $this->data[$this->alias]['path'] = env('PATH');
    $this->data[$this->alias]['query_string'] = env('QUERY_STRING');
    
    return parent::beforeSave($options);
  }

}
