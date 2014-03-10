<?php

App::uses('Component', 'Controller');

/**
 * Description of BruteForceComponent
 *
 * @author bokac
 * 
 * @property SessionComponent $Session
 * @property AuthComponent $Auth
 */
class IPCheckComponent extends Component {
  
  private $userIPs = array();
  
  private $ip;
  
  public $controller;
  
  public $components = array('Auth', 'Session');
  
  public $answersAllowed = 3;
  
  public $answerSessionName = 'answers_tried';

  public function initialize(Controller $controller) {
    parent::initialize($controller);
    $this->controller = $controller;
    $this->ip = env('REMOTE_ADDR');
  }

  public function verifyLogInIP() {
    $this->userIPs = $this->controller->User->UserIp->getAllUserIp();
    // current IP is in users IPs
    if (in_array($this->ip, $this->userIPs)) {
      return true;
    } 
    
    return false;
  }
  
  public function startAnswering() {
    if (!$this->Session->read($this->answerSessionName)) {
      $this->Session->write('checkpoint', true);
      $this->Session->write($this->answerSessionName, $this->answersAllowed);
    }       
  }
  
  public function getLogginInIP() {
    return $this->ip;
  }
  
  public function answersTried() {
    return $this->Session->read($this->answerSessionName);
  }
  
  public function canAnswerAgain() {
    return $this->answersTried() > 0;
  }
  
  public function wrongAnswer() {
    if ($this->canAnswerAgain()) {
      $this->Session->write($this->answerSessionName, $this->answersTried() - 1);
    }
  }
}
