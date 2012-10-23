<?php
App::uses('AppController', 'Controller');
/**
 * Criteres Controller
 *
 * @property Critere $Critere
 */
class CriteresController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Critere->recursive = 0;
		$this->set('criteres', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Critere->id = $id;
		if (!$this->Critere->exists()) {
			throw new NotFoundException(__('Invalid critere'));
		}
		$this->set('critere', $this->Critere->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Critere->create();
			if ($this->Critere->save($this->request->data)) {
				$this->Session->setFlash(__('The critere has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The critere could not be saved. Please, try again.'));
			}
		}
		$critereCategories = $this->Critere->CritereCategory->find('list');
		$this->set(compact('critereCategories'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Critere->id = $id;
		if (!$this->Critere->exists()) {
			throw new NotFoundException(__('Invalid critere'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Critere->save($this->request->data)) {
				$this->Session->setFlash(__('The critere has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The critere could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Critere->read(null, $id);
		}
		$critereCategories = $this->Critere->CritereCategory->find('list');
		$this->set(compact('critereCategories'));
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Critere->id = $id;
		if (!$this->Critere->exists()) {
			throw new NotFoundException(__('Invalid critere'));
		}
		if ($this->Critere->delete()) {
			$this->Session->setFlash(__('Critere deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Critere was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
