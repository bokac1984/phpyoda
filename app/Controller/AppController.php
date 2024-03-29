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
App::uses('CakeEmail', 'Network/Email');

App::uses('UserMessage', 'ErrorManager.Model');
App::uses('ClassRegistry', 'Utility');

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

  protected $adminUser = true;
  
  private $adminLayout = '';

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
      //'DebugKit.Toolbar',
      'Security'
  );
  public $helpers = array('Html', 'Link', 'Form', 'Session', 'Js', 'Display');

  public function beforeFilter() {
    //Configure AuthComponent
    $this->Auth->autoRedirect = false;
    $this->Auth->loginAction = array(
        'prefix' => null,
        'plugin' => null,
        'controller' => 'users',
        'action' => 'login'
    );
    $this->Auth->logoutRedirect = array(
        'prefix' => null,
        'plugin' => null,
        'controller' => 'pages',
        'action' => 'index'
    );
    $this->Auth->authError = __('Did you really think, allowed to see that, you are, hmm?');
    $this->Auth->loginError = __('Invalid Username or Password entered, please try again.');
    $this->Auth->flash['element'] = "flashError";

    $this->Security->blackHoleCallback = 'blackhole';

    $this->Cookie->name = Configure::read('Website.cookie.name');
    $this->checkCookie();

    if (!$this->Auth->user()) {
      $this->adminUser = false;
      
      if (!isset($_COOKIE['message'])) {
        $UserMessage = ClassRegistry::init('UserMessage');
        $re = $UserMessage->find('first', array(
            'conditions' => array(
                'UserMessage.display' => true
            )
        ));
        if (!empty($re)) {
          $this->set('userMessage', $re['UserMessage']);
        }
      }
    } else {
      $this->getAdminLayout();
      $this->layout = $this->adminLayout;
    }
    

    $this->set('admin', $this->adminUser);
  }

  public function blackhole($type) {
    $this->Session->setFlash(__('<br />If you are having trouble with this, email admin, else STOP THIS.<br/> Error type: %s', $type), 'flashError');
  }

  protected function checkCookie() {
    if ($this->Auth->user() == null) {
      $user = $this->Cookie->read('User');

      if (!empty($user) && $this->Auth->login($user)) {
        $this->redirect($this->Auth->redirect());
      }
    }
  }

  public function sendEmail($data = array()) {
    $Email = new CakeEmail();

    $Email->helpers(array('Html'));
    $Email->template('mail');
    $Email->emailFormat('html');

    $Email->from(array('admin@phpyoda.com' => Configure::read('Website.title')));
    $Email->to(Configure::read('Website.admin.mail'));
    $Email->viewVars(array(
        'message' => $data['message']
            )
    );
    $Email->subject($data['subject']);
    $Email->send();
  }
  
  private function getAdminLayout() {
    App::uses('Setting', 'Model');
    $Setting = ClassRegistry::init('Setting');
    $a = $Setting->find('first', array(
        'conditions' => array(
            'active' => true
        )
    ));
    
    $this->adminLayout = $a['Setting']['value'];
  }

}
