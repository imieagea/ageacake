<?php
App::uses('AppController', 'Controller');
/**
 * Contenuses Controller
 *
 * @property Contenus $Contenus
 */
class ContenusesController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
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
	public function admin_view($id = null) {
		$this->Contenus->id = $id;
		if (!$this->Contenus->exists()) {
			throw new NotFoundException(__('Invalid contenus'));
		}
		$this->set('contenus', $this->Contenus->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
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
	public function admin_edit($id = null) {
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
	public function admin_delete($id = null) {
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
