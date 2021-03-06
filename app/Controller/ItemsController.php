<?php
App::uses('AppController', 'Controller');
/**
 * Items Controller
 *
 * @property Item $Item
 */
class ItemsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Item->recursive = 0;
		$this->set('items', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Item->exists($id)) {
			throw new NotFoundException(__('Invalid item'));
		}
		$options = array('conditions' => array('Item.' . $this->Item->primaryKey => $id));
		$this->set('item', $this->Item->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id=null) {
		if ($this->request->is('post')) {
			$this->Item->create();
			if ($this->Item->save($this->request->data)) {
				//$this->Session->setFlash(__('El producto a sido guardado'));
				$this->redirect(array('controller'=>'Categories','action' => 'select'));
			} else {
				$this->Session->setFlash(__('El producto no se pudo guardar'));
			}
		}
		$categories = $id;
		$this->set(compact('categories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Item->exists($id)) {
			throw new NotFoundException(__('Invalid item'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Item->save($this->request->data)) {
				//$this->Session->setFlash(__('The item has been saved'));
				$this->redirect(array('controller'=>'Categories','action' => 'select'));
			} else {
				$this->Session->setFlash(__('El producto no se pudo editar'));
			}
		} else {
			$options = array('conditions' => array('Item.' . $this->Item->primaryKey => $id));
			$this->request->data = $this->Item->find('first', $options);
		}
		$categories = $this->Item->Category->find('list',array('conditions'=>array('Category.removed'=>'no')));
		$this->set(compact('categories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {

		if (!$this->Item->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}else{
	
		$datos = $this->Item->find('first',array('conditions' => array('Item.' . $this->Item->primaryKey => $id)));
		

			$data['Item']['id'] =  $datos['Item']['id']; 
			$data['Item']['name'] =  $datos['Item']['name']; 
			$data['Item']['category_id'] = $datos['Item']['category_id']; 
			$data['Item']['removed'] = 'si';

			if ($this->Item->save($data)) {
			//$this->Session->setFlash(__('The category has been saved'));
				$this->redirect(array('controller'=>'Categories','action' => 'select'));
			} else {
				$this->Session->setFlash(__('El producto no se a podido eliminar'));
			}
		}

		/*$this->loadModel('Presentation');
		$this->loadModel('ImagesPresentation');
		$this->loadModel('PresentationsQuote');
		$this->Item->id = $id;
		if (!$this->Item->exists()) {
			throw new NotFoundException(__('Invalid item'));
		}else{
		$this->request->onlyAllow('post', 'delete');
		$presentacion = $this->Presentation->find('all',array('conditions' => array('Presentation.' . 'item_id' => $id)));
		foreach ($presentacion as $pres) { 
					$ImagesPresen = $this->ImagesPresentation->find('all',array('conditions' => array('ImagesPresentation.' . 'presentation_id' => $pres['Presentation']['id'])));
					foreach ($ImagesPresen as $imgpr) {
						$this->ImagesPresentation->id = $imgpr['ImagesPresentation']['id'];
						$this->ImagesPresentation->delete();
					}
					$presentationsQuote = $this->PresentationsQuote->find('all',array('conditions' => array('PresentationsQuote.' . 'presentation_id' => $pres['Presentation']['id'])));
					foreach ($presentationsQuote as $prequote) {
						$this->PresentationsQuote->id = $prequote['PresentationsQuote']['id'];
						$this->PresentationsQuote->delete();
					}
		$this->Presentation->id = $pres['Presentation']['id'];
		$this->Presentation->delete();
		}
		if ($this->Item->delete()) {
			$this->Session->setFlash(__('Item deleted'));
			$this->redirect(array('controller'=>'Categories','action' => 'select'));
			
		}

		}
		
		$this->Session->setFlash(__('Item was not deleted'));*/
		
	}
	public function select($category_id = null,$item_id){
		//$this->Category->recursive = 2;
		$menu = array('menu' => array('id' => 'productos','inferior'=>'#096357','superior'=>'#22A18C','color'=>'#FFF'));
		//menu
		$this->Session->write($menu);

       $this->loadModel('Recipe');
       $this->loadModel('Ad');
       $this->loadModel('Carousel');
       $this->loadModel('Category');

		

		if(!$this->Category->exists($category_id) and !$this->Item->exists($item_id)){
			$this->redirect(array('controller' => 'Categories', 'action' => 'select'));
			//throw new NotFoundException(__('Invalid Category'));
		}else{

		$Category = $this->Category->Item->find('first',array('conditions' => array('Category.' . $this->Category->primaryKey => $category_id,'Item.' . $this->Item->primaryKey => $item_id,'Item.'. 'removed' <> 'si'),'recursive'=>2));
		
		$Recipe = $this->Recipe->find('first',array('order' => 'Recipe.created DESC'));
		$Recipes1 = $this->Recipe->find('all',array('order'=>'Recipe.id DESC'));
		$Ad = $this->Ad->find('first',array('order' => 'Ad.created DESC'));
		$Carousel = $this->Carousel->find('all',array('conditions'=>"Carousel.number = 'Dos'"));
		$this->set(compact('Category','Recipe','Recipes1','Ad','Carousel'));

		}
	}
}
