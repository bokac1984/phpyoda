<?php
App::uses('Component', 'Controller');
/**
 * Description of BruteForceComponent
 *
 * @author bokac
 */
class BruteForceComponent extends Component {
    
    public $components = array('Session');
    
    /**
     * Number of login tries allowed
     * 
     * @access private
     * @var int
     */
    protected $allowed_attempt_num = 5;
    
    private $error_count_key = 'count_number';
    private $error_count_key_time = 'count_time';
    
    public $expired_time_error_login = 10;
    
    public function initialize(Controller $controller) {
        parent::initialize($controller);
        
        if (time() - $this->Session->read( $this->error_count_key_time ) >= $this->expired_time_error_login) {
            $this->resetLoginCount();
        }
    }
    
    /**
     * Count login attempts
     */
    public function errorLogin() {
        $errorCount =  $this->Session->read( $this->error_count_key );
        $this->Session->write($this->error_count_key, $errorCount + 1);
        $this->Session->write($this->error_count_key_time, time());
    }
    
    /**
     * Gets login attempt number
     * 
     * @return int
     */
    public function getLoginCount() {
        return $this->Session->read( $this->error_count_key );
    }
    
    /**
     * Determine if we have a brute force attacker on our hands
     * 
     * @return boolean
     */
    public function isBruteForceAttack() {
        return ($this->getLoginCount() >= $this->getMaxLoginAttempt());
    }
    
    public function getMaxLoginAttempt() {
        return $this->allowed_attempt_num;
    }
    
    private function resetLoginCount() {
        $this->Session->write($this->error_count_key, 0);
    }
    
    public function getNextLoginTime() {
        $time = ceil($this->expired_time_error_login - (time() - $this->Session->read($this->error_count_key_time)));
        return round($time/60)." minutes ";
    }
}

?>
