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
/**
 * add method
 *
 * @return void
 */
	public function add() {
        $this->log($this->request, 'comments');
		$this->autoRender = false;
        if ($this->request->is('ajax')){
            $data = array(
                'post_id' => $this->request->data['Comment']['post_id'],
                'commentator' => $this->request->data['Comment']['commentator'],
                'email' => $this->request->data['Comment']['email'],
                'message' => $this->request->data['Comment']['text'],
                'ip_address' => $this->request->clientIp()
            );
            
            if ($this->Comment->save($data)) {
                echo json_encode(array('success' => 1, 'message' => "Your comment is waiting to be approved, for that I thank you <i>{$data['commentator']}</i>."));
            } else {
                echo json_encode(array('success' => 0, 'message' => $this->Comment->validationErrors));
            }
        } else {
            $this->Session->setFlash("You can't go there directly.", "flashError");
            $this->redirect("/");
        }
	}

}
