<?php
App::uses('AppController', 'Controller');
/**
 * Portfolios Controller
 *
 * @property Portfolio $Portfolio
 */
class PortfoliosController extends AppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Security->unlockedActions = array('delete');
        
        // For CakePHP 2.1 and up
        $this->Auth->allow('index');
    }
    
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Portfolio->recursive = 0;
		$this->set('portfolios', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Portfolio->id = $id;
		if (!$this->Portfolio->exists()) {
			throw new NotFoundException(__('Invalid portfolio'));
		}
		$this->set('portfolio', $this->Portfolio->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Portfolio->create();
			if ($this->Portfolio->save($this->request->data)) {
				$this->Session->setFlash(__('The portfolio has been saved'), 'flashSuccess');
				$this->redirect(array('action' => 'index'));
			} else {
                print_r($this->Portfolio->validationErrors);
				$this->Session->setFlash(__('The portfolio could not be saved. Please, try again.'));
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
		$this->Portfolio->id = $id;
		if (!$this->Portfolio->exists()) {
			throw new NotFoundException(__('Invalid portfolio'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Portfolio->save($this->request->data)) {
				$this->Session->setFlash(__('The portfolio has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The portfolio could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Portfolio->read(null, $id);
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
	public function delete() {
		$this->autoRender = false;
        if ($this->request->is('ajax')){ 
            $this->Portfolio->id = $this->request->data['id'];
            if (!$this->Portfolio->exists()) {
                echo json_encode(array('success' => 0, 'message' => "Error while deleting portfolio. Does not exist."));
                exit();
            }

            if ($this->Portfolio->delete()) {
                echo json_encode(array('success' => 1, 'message' => "0"));
            } else {
                echo json_encode(array('success' => 0, 'message' => 'Error while deleting portfolio. Unknown.'));
            }
        } else {
            $this->Session->setFlash("You can't go there directly.", "flashError");
            $this->redirect("/");
        }
	}
}
