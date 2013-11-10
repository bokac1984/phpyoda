<?php

App::uses('BlogAppController', 'Blog.Controller');

/**
 * Categories Controller
 *
 */
class CategoriesController extends BlogAppController {

  public function beforeFilter() {
    parent::beforeFilter();
  }

  /**
   * Add method, to save new category from ajax form
   */
  public function add() {
    $this->autoRender = false;
    $return = array(
        'success' => 0,
        'message' => ''
    );
    
    if ($this->request->is('ajax')) {
      if ($this->Category->save($this->request->data)) {
        $return['message'] = array(
            'id' => $this->Category->getLastInstertedId(),
        );
      } else {
        $return['message'] = $this->Category->validationErrors;
      }
      echo json_encode($return);
    }
  }

}
