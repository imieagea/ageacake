<?php
App::uses('AppController', 'Controller');
/**
 * Fiches Controller
 *
 * @property Fiche $Fiche
 */
class FichesController extends AppController {
	//On lie le modèle au controller
	var $uses = array('Fiche');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Fiche->recursive = 0;
		$this->set('fiches', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Fiche->id = $id;
		if (!$this->Fiche->exists()) {
			throw new NotFoundException(__('Invalid Fiche'));
		}
		$this->set('fiche', $this->Fiche->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Fiche->create();
			if ($this->Fiche->save($this->request->data)) {
				$this->Session->setFlash(__('The Fiche has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Fiche could not be saved. Please, try again.'));
			}
		}
		$avisFiches = $this->Fiche->AvisFiche->find('list');
		$this->set(compact('avisFiches'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Fiche->id = $id;
		if (!$this->Fiche->exists()) {
			throw new NotFoundException(__('Invalid Fiche'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Fiche->save($this->request->data)) {
				$this->Session->setFlash(__('The Fiche has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Fiche could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Fiche->read(null, $id);
		}
		$avisFiches = $this->Fiche->AvisFiche->find('list');
		$this->set(compact('avisFiches'));
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
		$this->Fiche->id = $id;
		if (!$this->Fiche->exists()) {
			throw new NotFoundException(__('Invalid Fiche'));
		}
		if ($this->Fiche->delete()) {
			$this->Session->setFlash(__('Fiche deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Fiche was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
