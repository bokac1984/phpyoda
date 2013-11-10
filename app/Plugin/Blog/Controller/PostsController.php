<?php
App::uses('BlogAppController', 'Blog.Controller');
/**
 * Posts Controller
 *
 */
class PostsController extends BlogAppController {
    
    public $helpers = array('Time', 'Gravatar', 'Link');
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('index', 'view', 'latest'));
        $this->Security->unlockedActions = array('publish');
    }
    
    public $paginate = array(
        'limit' => 10,
        'order' => 'Post.created DESC',
        'contain' => array(
            'Comment' => array(
                'conditions' => array(
                    'Comment.approved' => 1, 
                    'Comment.deleted' => 0
                ),
                'order' => 'Comment.created DESC'
            ),
            'User' => array(
                'fields' => array(
                    'nickname'
                )
            )
        )
    );
/**
 * index method
 *
 * @return void
 */
	public function index() {
        $this->set( 'title_for_layout', Configure::read('Website.title').' - Blog');
		$this->Post->recursive = 2;
        // try paginate
        try {
            $posts = $this->paginate('Post', array('published' => true));
            $this->set('posts', $posts);
        } catch (NotFoundException $e) { // given page does not exist, someone is trying paging overflow
            $this->Session->setFlash(__('Don\'t do that, ok?'), 'flashError');
            $this->redirect(array('action' => 'index'));
        }
	}
    
    public function manage() {
        $this->set( 'title_for_layout', 'Manage posts');
		$this->Post->recursive = 1;
        $this->Post->contain('Comment');
        try {
            $this->set('posts', $this->paginate());
        } catch (NotFoundException $e) {
            $this->Session->setFlash(__('Don\'t do that, ok?'), 'flashError');
            $this->redirect(array('action' => 'index'));
        }
    }
    
    public function latest() {
        $posts = $this->paginate('Post', array('published' => true));
        if ($this->request->is('requested')) {
            return $posts;
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
        if (!$slug) {
			throw new NotFoundException(__('Invalid post'));
		}
        $this->Post->Behaviors->load('Containable');
        $post = $this->Post->find('first', array(
            'conditions' => array('Post.slug' => $slug),
            'contain' => array('Comment' => array(
                    'conditions' => array('Comment.approved' => 1, 'Comment.deleted' => 0),
                    'order' => 'Comment.created DESC'
                    )
                )
            )
        );
		if (!$post) {
			throw new NotFoundException(__('Invalid post'));
		}
        $this->request->data['Comment']['post_id'] = $post['Post']['id'];
        $this->set('title_for_layout', $post['Post']['title']);
		$this->set('post', $post);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
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
        $categories = $this->Post->Category->find('list');
		$this->set(compact(array('users', 'categories')));
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
				$this->Session->setFlash(__('The post has been saved'), 'flashSuccess');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'), 'flashError');
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
 * 
 */
    public function publish() {
		$this->autoRender = false;
        if ($this->request->is('ajax')){
            $id = $this->request->data['id'];
            $published = (boolean)$this->request->data['published'];
            $this->Post->id = (int)$id;
            if (!$this->Post->exists()) {
                echo json_encode(array('success' => 0, 'message' => h("The requested post does not exist on this server!")));;
            }
            $this->Post->Behaviors->unload('Taggable');
            
            if ($this->Post->saveField('published', !$published) ) {
                echo json_encode(array('success' => 1, 'message' => !$published));
            }
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
	public function delete($slug = null) {
        $post = $this->Post->find('first', array(
            'conditions' => array('Post.slug' => $slug)
        ));
		if (!$post) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->Post->id = $post['Post']['id'];
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('The selected post doesn\'t exist.'));
		}
		if ($this->Post->delete($id, true)) {
			$this->Session->setFlash(__('Post deleted'), 'flashSuccess');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Post was not deleted'), 'flashError');
		$this->redirect(array('action' => 'index'));
	}
}
