<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {


	public function isAuthorized($user) {

	    return parent::isAuthorized($user);
	}


	public function beforeFilter()
	{
		$this->Auth->allow('logout','login');
		parent::beforeFilter();
	}

	public function login()
	{
		if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	        	$role = $this->Session->read('Auth.User.role');
	        	switch ($role) {
	        		case 'admin':
	        			 $this->redirect(array('controller'=>'admin','action'=>'index'));
	        			break;
	        		case 'agent':
	        			$this->redirect(array('controller'=>'agent','action'=>'index'));
	        			break;
	        	}
	        	/*$this->Session->setFlash(__('Vous êtes bien autentifiés.'));
	            $this->redirect($this->Auth->redirect());*/
	        } else {
	            $this->Session->setFlash(__('Identifiant ou mot de passe incorrect.'));
	            $this->redirect(array('controller'=>'home','action'=>'index'));
	        }
	    }else
	    {
	    	$this->redirect(array('controller'=>'home','action'=>'index'));
	    }
	}

	public function logout()
	{
		$this->Session->setFlash(__('A bientôt.'));
		$this->redirect($this->Auth->logout());
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
