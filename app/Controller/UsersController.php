<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    public $components = array('BruteForce');
        
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('contact', 'about'));
    }
    
    public function beforeRender() {
		parent::beforeRender();
		// unset passwords before displaying form
		unset($this->request->data['User']['password']);
		unset($this->request->data['User']['pass_again']);
	}
    
    
    public function login() {
        $this->set( 'title_for_layout', 'Login for admin');
        $this->layout = 'signin';
        if ($this->Auth->user()) {
            $this->redirect($this->Auth->redirect());
        }
        
        $bf = $this->BruteForce->isBruteForceAttack();
        if ($bf) {
            $time = $this->BruteForce->getNextLoginTime();
            $attempts = $this->BruteForce->getLoginCount();
            $this->set(compact('time', 'attempts'));
            $this->render("bfattack");
        }
        
        if ($this->request->is('post') && !$bf) {
           // try to login in user with data

            if ($this->Auth->login()) {
                if ($this->request->data['User']['rememberme']) {
                    $this->Cookie->write('User', array_intersect_key(
                                    $this->request->data['User'], array('username' => null, 'password' => null)
                            )
                    );
                } elseif ($this->Cookie->read('User') !== null) {
                    $this->Cookie->delete('User');
                }

                $this->redirect($this->Auth->redirect());
            } else {
                $this->BruteForce->errorLogin();
                $this->Session->setFlash('Your username or password is incorrect, please try again.', 'flashError');
            }
        }
	}

	public function logout() {
        if ($this->Cookie->read('User') != null) {
            $this->Cookie->delete('User');
        }

		$this->Session->setFlash('For visiting thank you, with you may the force be.', 'flashSuccess');
		$this->redirect($this->Auth->logout());
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
    
    public function about() {
        //$this->Session->destroy();
    }
}
