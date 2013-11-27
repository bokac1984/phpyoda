<?php
App::uses('BlogAppController', 'Blog.Controller');
/**
 * Comments Controller
 *
 */
class CommentsController extends BlogAppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Security->unlockedActions = array('add');
        // For CakePHP 2.1 and up
        $this->Auth->allow('add');
    }
    
    public $paginate = array(
        'limit' => 10,
        'order' => 'Comment.created DESC',
        'contain' => array(
            'Post' => array(
                'fields' => array(
                    'Post.slug'
                )
            )
        )
    );
    
    public function index($filter = '') {
      $filterArray = array();
      if ($filter != '') {
        if ($filter == 'pending') {
          $filterArray['approved'] = false;
        } else {
          $filterArray[$filter] = true;
        }
      }
      
      $comments = $this->paginate('Comment', $filterArray);
      $this->set('comments', $comments);
    }
/**
 * add method
 *
 * @return void
 */
	public function add() {
        $this->log($this->request->data, 'comments');
		$this->autoRender = false;
        if ($this->request->is('ajax')){
            $data = array(
                'post_id' => $this->request->data['Comment']['post_id'],
                'commentator' => $this->request->data['Comment']['commentator'],
                'email' => $this->request->data['Comment']['email'],
                'text' => $this->request->data['Comment']['text'],
                'gravatar' => $this->request->data['Comment']['gravatar'],
                'ip_address' => $this->request->clientIp()
            );
            
            if ( empty($this->request->data['Comment']['field']) ) { // no value in this, else it's spam
                if ($this->Comment->save($data)) {
                    $this->sendEmail(array(
                        'message' => 'There is a new comment to be approved on your post.',
                        'subject' => 'New Comment',
                        'data' => $data
                      )
                    );
                    echo json_encode(array('success' => 1, 'message' => h("Your comment is waiting to be approved, for that I thank you {$data['commentator']}.")));
                } else {
                    echo json_encode(array('success' => 0, 'message' => $this->Comment->validationErrors));
                }
            } else {
                echo json_encode(array('success' => 0, 'message' => 'Do not spam please.'));
            }
        } else {
            $this->Session->setFlash("You can't go there directly.", "flashError");
            $this->redirect("/");
        }
	}

}
