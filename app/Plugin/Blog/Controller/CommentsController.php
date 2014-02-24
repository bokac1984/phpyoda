<?php

App::uses('BlogAppController', 'Blog.Controller');

/**
 * Comments Controller
 *
 */
class CommentsController extends BlogAppController {

  public function beforeFilter() {
    parent::beforeFilter();
    $this->Security->unlockedActions = array('add', 'ajaxAction');
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

  public function index() {
    
    $status = isset($this->passedArgs['status']) ? $this->passedArgs['status'] : null;
    $postId = isset($this->passedArgs['id']) ? $this->passedArgs['id'] : null;
    
    $search = isset($this->passedArgs['search']) ? $this->passedArgs['search'] : null;
    
    $filterArray = array();
    if ($status != '') {
      if ($status == 'pending') {
        $filterArray['approved'] = false;
      } else {
        $filterArray[$status] = true;
      }
    }
    
    if ($postId) {
      $filterArray['Post.id'] = $postId;
    }

    if ($search) {
      $filterArray[key($search)] = $search[key($search)];
    }
    
    $comments = $this->paginate('Comment', $filterArray);
    $this->set(compact('postId', 'comments', 'status'));
  }

  /**
   * add method
   *
   * @return void
   */
  public function add() {
    $this->autoRender = false;
    if ($this->request->is('ajax')) {
      if (substr($this->request->data['Comment']['website'], 0, 7) !== 'http://') {
        $this->request->data['Comment']['website'] = 'http://' . $this->request->data['Comment']['website'];
      }
      $data = array(
          'post_id' => $this->request->data['Comment']['post_id'],
          'commentator' => $this->request->data['Comment']['commentator'],
          'website' => $this->request->data['Comment']['website'],
          'email' => $this->request->data['Comment']['email'],
          'text' => $this->request->data['Comment']['text'],
          'gravatar' => $this->request->data['Comment']['gravatar'],
          'ip_address' => $this->request->clientIp()
      );

      if (empty($this->request->data['Comment']['field'])) { // no value in this, else it's spam
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

  public function modify() {
    debug($this->request);
  }
  
  public function ajaxAction() {
    $this->autoRender = false;
    if ($this->request->is('ajax')) {
      $return = array(
          'success' => 0,
          'message' => ''
      );
      
      $this->Comment->id = $this->request->data['id'];
      $field[$this->request->data['status']] = true;
      
      if ($this->request->data['status'] === 'unapprove') {
        $field = array();
        $field['approved'] = false;
      }
      
      $key = key($field);
      if ($this->Comment->saveField($key, $field[$key])) {
        $return['success'] = 1;
      }
      
      echo json_encode($return);
    } else {
      $this->Session->setFlash("You can't go there directly.", "flashError");
      $this->redirect("/");
    }
  }

}
