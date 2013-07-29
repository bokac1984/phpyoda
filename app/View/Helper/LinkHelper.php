<?php
App::uses('AppHelper', 'View/Helper');

/**
 * Description of LinkHelper
 *
 * @author bokac
 */
class LinkHelper extends AppHelper {
    public $helpers = array('Html');
    
    /**
     * Custom link
     */
    public function cLink($title = '', $url = '/pages/index', $iconName = 'home') {
        return $this->Html->link('<i class="icon-'.$iconName.'"></i> '.$title, $url, array('escape' => false));
    }
}

?>
