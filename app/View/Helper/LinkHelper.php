<?php
App::uses('AppHelper', 'View/Helper');

/**
 * Description of LinkHelper
 *
 * @author bokac
 */
class LinkHelper extends AppHelper {
    public $helpers = array('Html', 'Form');
    
    /**
     * Custom link
     * 
     * @param string $title
     * @param string $url
     * @param string $iconName
     * @return type
     */
    public function cLink($title = '', $url = '/pages/index', $iconName = 'home') {
        return $this->Html->link('<i class="glyphicon  glyphicon-'.$iconName.'"></i> '.$title, $url, array('escape' => false));
    }
    
    /**
     * Custom delete link
     * 
     * @param string $title
     * @param string $url
     * @param string $iconName
     * @return string
     */
    public function dLink($title = '', $url = '/pages/index', $iconName = 'home', $delId = 0) {
        return $this->Form->postLink('<i class="glyphicon  glyphicon-'.$iconName.'"></i> '.$title, $url, array('escape' => false), __('Are you sure you want to delete # %s?', $delId));
    }
}

?>
