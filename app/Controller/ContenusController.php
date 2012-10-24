<?php
App::uses('AppController', 'Controller');
/**
 * Contenus Controller
 *
 * @property Contenus $Contenus
 */
class ContenusController extends AppController {


	var $uses = array('Post');

	public function beforeFilter()
	{
		$this->Auth->allow('view');
		parent::beforeFilter();
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function index() {
		$this->Contenus->recursive = 0;
		$this->set('contenuses', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$c = $this->Contenus->find('first',array(
				'conditions' => array('Contenus.slug' => $this->request->params['slug'])
			));
		if(!$c)
			$this->Post->find('first',array(
				'conditions' => array('Post.slug' => $this->request->params['slug'])
			));
		$this->set('contenus',$c);
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Contenus->create();
			if ($this->Contenus->save($this->request->data)) {
				$this->Session->setFlash(__('The contenus has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contenus could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Contenus->id = $id;
		if (!$this->Contenus->exists()) {
			throw new NotFoundException(__('Invalid contenus'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Contenus->save($this->request->data)) {
				$this->Session->setFlash(__('The contenus has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contenus could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Contenus->read(null, $id);
		}
	}

/**
 * admin_delete method
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
		$this->Contenus->id = $id;
		if (!$this->Contenus->exists()) {
			throw new NotFoundException(__('Invalid contenus'));
		}
		if ($this->Contenus->delete()) {
			$this->Session->setFlash(__('Contenus deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Contenus was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
