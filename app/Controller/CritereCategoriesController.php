<?php
App::uses('AppController', 'Controller');
/**
 * CritereCategories Controller
 *
 * @property CritereCategory $CritereCategory
 */
class CritereCategoriesController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CritereCategory->recursive = 0;
		$this->set('critereCategories', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->CritereCategory->id = $id;
		if (!$this->CritereCategory->exists()) {
			throw new NotFoundException(__('Invalid critere category'));
		}
		$this->set('critereCategory', $this->CritereCategory->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CritereCategory->create();
			if ($this->CritereCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The critere category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The critere category could not be saved. Please, try again.'));
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
		$this->CritereCategory->id = $id;
		if (!$this->CritereCategory->exists()) {
			throw new NotFoundException(__('Invalid critere category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CritereCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The critere category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The critere category could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CritereCategory->read(null, $id);
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
		$this->CritereCategory->id = $id;
		if (!$this->CritereCategory->exists()) {
			throw new NotFoundException(__('Invalid critere category'));
		}
		if ($this->CritereCategory->delete()) {
			$this->Session->setFlash(__('Critere category deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Critere category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
