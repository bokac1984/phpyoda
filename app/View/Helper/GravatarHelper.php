<?php
App::uses('AppHelper', 'View/Helper');
App::uses('Security', 'Utility');

/**
 * Fetch gravatar image, if no email assoicated with gravatar display default image
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
    
    /**
     * Hashes email using md5 type for hash
     * 
     * @param string $email
     * @return string Hashed email
     */
    private function generateHash($email) {
        return Security::hash(mb_strtolower($email), $this->hashType);
    }
    
    /**
     * Generate parametares in url for gravatar
     * 
     * @param array $options
     * @return string
     */
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

    /**
     * Main method to display image using built-in Html helper with gravatar options
     * 
     * @access public
     * 
     * @param string $email
     * @param array $options
     * @return string URL for gravatar image
     */
    public function image($email, $options = array()) {
        $url = $this->createUrl($email, $options);
        
        return $this->Html->image($url, $options);
    }
    
    /**
     * Create url for gravatar image based on options and email hash
     * 
     * @access private
     * 
     * @param string $email
     * @param array $options
     * @return type
     */
    private function createUrl($email, $options = array()) { 
        $emailHash = $this->generateHash($email);
        if (!$options['gravatar']) {
            $emailHash = $this->generateHash($emailHash);
            echo isset($options['gravatar']) && $options['gravatar'] === true;
        }
        
        $params = $this->generateGetParams($options);
        return $this->gUrl.$emailHash.$params;
    }
}

?>
