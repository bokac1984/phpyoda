<?php
App::uses('AppHelper', 'View/Helper');
App::uses('Security', 'Utility');

/**
 * Description of GravatarHelper
 *
 * @author bokac
 */
class GravatarHelper extends AppHelper {
    
    public $helpers = array('Html');
    
    public $_defaults = array(
        'rating' => 'g',
        'size' => '60',
        'default' => 'mm',
    );
    
    private $gUrl = 'http://www.gravatar.com/avatar/';
    
    private $hashType = 'md5';
    
    private function generateHash($email) {
        return Security::hash(mb_strtolower($email), $this->hashType);
    }
    
    private function generateGetParams($options = array()) {
        $gOptions = $this->_defaults;
        
        if (!empty($options)) {
            $gOptions = array_merge(($this->_defaults), ($options));
        }
        
        $params = array();
        foreach ($gOptions as $key => $val) {
            $params[] = "$key=$val";
        }
        
        $p = "?" . implode('&amp;', $params);
        return $p;
    }

    public function image($email, $options = array()) {
        $url = $this->createUrl($email, $options);
        
        return $this->Html->image($url, $options);
    }
    
    private function createUrl($email, $options = array()) {
        $emailHash = $this->generateHash($email);
        if (isset($options['gravatar']) && $options['gravatar']) {
            $emailHash = Security::hash(mb_strtolower($emailHash), $this->hashType);
        }
        $params = $this->generateGetParams($options);
        return $this->gUrl.$emailHash.$params;
    }
}

?>
