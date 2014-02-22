<?php
App::uses('PhotoAppController', 'Photo.Controller');
/**
 * Homes Controller
 *
 */
class GalleriesController extends PhotoAppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('index', 'overview'));
    }
    
    public function index() {
        $this->set( 'title_for_layout', Configure::read('Website.title').' - Photo');
		$this->Gallery->recursive = 2;
        $home = $this->paginate('Gallery');
        $this->set('home', $home);
    }
    
    public function overview() {
      
    }
}
