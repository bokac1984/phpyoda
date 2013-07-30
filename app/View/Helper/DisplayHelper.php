<?php
App::uses('AppHelper', 'View/Helper');

/**
 * Description of Display
 *
 * @author bokac
 */
class DisplayHelper extends AppHelper {
    //put your code here
    public static $itemCount = 0;
    
    public function showOneRow() {
        return self::$itemCount++;
    }
}

?>
