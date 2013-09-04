<?php
App::uses('BlogAppController', 'Blog.Controller');
/**
 * Posts Controller
 *
 */
class PostsController extends BlogAppController {
    
    public $helpers = array('Time');
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('index', 'view'));
    }
    
    public $paginate = array(
        'limit' => 5,
        'contain' => 'Comment'
    );
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Post->recursive = 1;
        try {
            $this->set('posts', $this->paginate());
        } catch (NotFoundException $e) {
            $this->Session->setFlash(__('Don\'t do that, ok?'));
            $this->redirect(array('action' => 'index'));
        }
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($slug = null) {
        $this->Post->Behaviors->load('Containable');
        $post = $this->Post->find('first', array(
            'conditions' => array('Post.slug' => $slug),
            'contain' => 'Comment'
        ));
		if (!$post) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->set('post', $post);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
        //debug($this->request);exit();
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		}
		$users = $this->Post->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($slug = null) {
        $post = $this->Post->find('first', array(
            'conditions' => array('Post.slug' => $slug)
        ));
		if (!$post) {
			throw new NotFoundException(__('Invalid post'));
		}
        $this->Post->id = $post['Post']['id'];
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $post;
		}
		$users = $this->Post->User->find('list');
        $tag = $this->Post->extractTags($post['Tag']);
        unset($this->request->data['Tag']);
        $this->request->data['Tag']['tag'] = $tag;
        $ref = $this->referer();
        $this->set('ref', $ref);
		$this->set(compact('users'));
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
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->Post->delete()) {
			$this->Session->setFlash(__('Post deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Post was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
