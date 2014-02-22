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
        $this->Security->unlockedActions = array('delete', 'getTags');
        
        // For CakePHP 2.1 and up
        $this->Auth->allow('index', 'getTags');
    }
    
/**
 * index method
 *
 * @return void
 */
	public function index() {
        $this->set( 'title_for_layout', 'My Portfolio');
		$this->Portfolio->recursive = 1;
		$this->set('portfolios', $this->paginate());
	}
    
    
/**
 * index method
 *
 * @return void
 */
	public function listAll() {
        $this->set( 'title_for_layout', 'My Portfolio');
		$this->Portfolio->recursive = 1;
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
            
			if ($this->Portfolio->saveAll($this->request->data, array('deep' => true))) {
				$this->Session->setFlash(__('The portfolio has been saved'), 'flashSuccess');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The portfolio could not be saved. Please, try again.'), 'flashError');
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
				$this->Session->setFlash('The portfolio has been saved', 'flashSuccess');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The portfolio could not be saved. Please, try again.', 'flashError');
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
	public function delete($id = null) {
        if ($this->request->is('post')){ 
            $this->Portfolio->id = $id;
            if (!$this->Portfolio->exists()) {
                throw new NotFoundException(__('Invalid portfolio'));
            }

		if ($this->Portfolio->delete($id, true)) {
			$this->Session->setFlash('Portfolio deleted', 'flashSuccess');
			$this->redirect(array('action' => 'listAll'));
		}
		$this->Session->setFlash('Portfolio was not deleted', 'flashError');
		$this->redirect(array('action' => 'listAll'));
        }
	}
    
    /**
	 * displays available tags - ajax only usage
	 */
    public function getTags() {
		$this->autoRender = false;
        if ($this->request->is('ajax')){
            $search = $this->request->data['search'];
            $tags = $this->Portfolio->Tag->getTags($search);
            
            echo json_encode($tags);
        }
    }
}
