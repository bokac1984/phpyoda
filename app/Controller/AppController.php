<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    	/**
	 * Pagination
	 */
	public $paginate = array(
		'limit' => 10,
	);
	
	public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session',
		'RequestHandler',
		'Cookie',
        'Security'
    );
    
    public $helpers = array('Html', 'Link', 'Form', 'Session', 'Js', 'Display');
	
    public function beforeFilter() {
        //Configure AuthComponent
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->authError = __('Did you really think, allowed to see that, you are, hmm?');
        $this->Auth->loginError = __('Invalid Username or Password entered, please try again.');
        $this->Auth->flash['element'] = "flashError"; 
        
        $this->Security->csrfExpires = '+1 hour';
        $this->Security->blackHoleCallback = 'blackhole';
    }
    
    public function blackhole($type) {
        $this->Session->setFlash(__('ERROR: %s',$type), 'flashError');
   }
}
