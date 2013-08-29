<?php
App::uses('AppController', 'Controller');
/**
 * Abouts Controller
 *
 * @property About $About
 */
class AboutsController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();

        // For CakePHP 2.1 and up
        $this->Auth->allow('index');
    }
/**
 * index method
 *
 * @return void
 */
	public function index() {
        $this->set( 'title_for_layout', 'About me');
		$this->About->recursive = 0;
		$this->set('abouts', $this->paginate());
	}
    
    public function listAll() {
        $this->set( 'title_for_layout', 'List');
		$this->About->recursive = 0;
		$this->set('abouts', $this->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->About->id = $id;
		if (!$this->About->exists()) {
			throw new NotFoundException(__('Invalid about'));
		}
		$this->set('about', $this->About->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->About->create();
			if ($this->About->save($this->request->data)) {
				$this->Session->setFlash(__('The about has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The about could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->About->id = $id;
		if (!$this->About->exists()) {
			throw new NotFoundException(__('Invalid about'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->About->save($this->request->data)) {
				$this->Session->setFlash(__('The about has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The about could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->About->read(null, $id);
		}
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
		$this->About->id = $id;
		if (!$this->About->exists()) {
			throw new NotFoundException(__('Invalid about'));
		}
		if ($this->About->delete()) {
			$this->Session->setFlash(__('About deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('About was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
