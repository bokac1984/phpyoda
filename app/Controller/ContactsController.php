<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * Contacts Controller
 *
 * @property Contact $Contact
 */
class ContactsController extends AppController {

    public $paginate = array(
        'limit' => 10,
        'order' => 'Contact.created DESC'
    );
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Security->unlockedActions = array('add');
        // For CakePHP 2.1 and up
        $this->Auth->allow('add');
    }
    
    public function newContacts() {
        if (empty($this->request->params['requested'])) {
            throw new ForbiddenException();
        }
        return $this->Contact->find('count', array('conditions' => 'Contact.read = 0'));
    }
    
    
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Contact->recursive = 0;
		$this->set('contacts', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact'));
		}
        
        $this->Contact->saveField('read', 1);
        $contact = $this->Contact->read(null, $id);
        
        if (substr($contact['Contact']['website'], 0, 7) !== 'http://')
            $contact['Contact']['website'] = 'http://' . $contact['Contact']['website'];
        
		$this->set('contact', $contact);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
        //pr($this->request->data);exit();
		$this->autoRender = false;
        if ($this->request->is('ajax')){
            $name = $this->request->data['Contact']['name'];
            
            $data = array(
                'name' => $this->request->data['Contact']['name'],
                'website' => $this->request->data['Contact']['website'],
                'email' => $this->request->data['Contact']['email'],
                'message' => $this->request->data['Contact']['message'],
                'ip_address' => $this->request->clientIp()
            );
            
            if ($this->Contact->save($data)) {
                $this->sendEmail();
                echo json_encode(array('success' => 1, 'message' => h("For contacting me, I thank you {$name}.")));
            } else {
                echo json_encode(array('success' => 0, 'message' => $this->Contact->validationErrors));
            }
        } else {
            $this->Session->setFlash("You can't go there directly.", "flashError");
            $this->redirect("/");
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
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('The contact has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Contact->read(null, $id);
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
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact'));
		}
		if ($this->Contact->delete()) {
			$this->Session->setFlash(__('Contact deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Contact was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
