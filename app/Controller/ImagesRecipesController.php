<?php
App::uses('AppController', 'Controller');
/**
 * ImagesRecipes Controller
 *
 * @property ImagesRecipe $ImagesRecipe
 */
class ImagesRecipesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index($id = null) {
		$options = array('conditions' => array('ImagesRecipe.' . 'recipe_id' => $id));
		$imagesRecipes = $this->ImagesRecipe->find('all', $options);
		$id_receta = $id;
		$this->set(compact("imagesRecipes","id_receta"));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ImagesRecipe->exists($id)) {
			throw new NotFoundException(__('Invalid images recipe'));
		}
		$options = array('conditions' => array('ImagesRecipe.' . $this->ImagesRecipe->primaryKey => $id));
		$this->set('imagesRecipe', $this->ImagesRecipe->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id=null) {
		if ($this->request->is('post')) {
			$this->ImagesRecipe->create();
			if ($this->ImagesRecipe->save($this->request->data)) {
				//$this->Session->setFlash(__('The images recipe has been saved'));
				$this->redirect(array('action' => 'index',$id));
			} else {
				$this->Session->setFlash(__('La imagen de la receta no se pudo guardar'));
			}
		}
		$recipes = $id;
		$this->set(compact('recipes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null,$id_receta=null) {
		if (!$this->ImagesRecipe->exists($id)) {
			throw new NotFoundException(__('Invalid images recipe'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ImagesRecipe->save($this->request->data)) {
				//$this->Session->setFlash(__('The images recipe has been saved'));
				$this->redirect(array('action' => 'index',$id_receta));
			} else {
				$this->Session->setFlash(__('La imagen de la receta no se pudo editar'));
			}
		} else {
			$options = array('conditions' => array('ImagesRecipe.' . $this->ImagesRecipe->primaryKey => $id));
			$this->request->data = $this->ImagesRecipe->find('first', $options);
		}
		$recipes = $this->ImagesRecipe->Recipe->find('list');
		$this->set(compact('recipes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null,$id_receta=null) {
		$this->ImagesRecipe->id = $id;
		if (!$this->ImagesRecipe->exists()) {
			throw new NotFoundException(__('Invalid images recipe'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ImagesRecipe->delete()) {
			$this->Session->setFlash(__('Images recipe deleted'));
			$this->redirect(array('action' => 'index',$id_receta));
		}
		$this->Session->setFlash(__('La imagen de la receta no se pudo eliminar'));
	
	}
}
