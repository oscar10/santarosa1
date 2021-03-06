<?php
App::uses('AppController', 'Controller');
/**
 * Presentations Controller
 *
 * @property Presentation $Presentation
 */
class PresentationsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Presentation->recursive = 0;
		$this->set('presentations', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Presentation->exists($id)) {
			throw new NotFoundException(__('Invalid presentation'));
		}
		$options = array('conditions' => array('Presentation.' . $this->Presentation->primaryKey => $id));
		$this->set('presentation', $this->Presentation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($idcategory=null,$id=null) {
		if ($this->request->is('post')) {
			$this->Presentation->create();
			if ($this->Presentation->save($this->request->data)) {
				//$this->Session->setFlash(__('La presentacion a sido guardada'));
				$this->redirect(array('controller'=>'Items','action' => 'select',$idcategory,$id)); //redireccionar 
			} else {
				$this->Session->setFlash(__('La presentacion no se pudo guardar'));
			}
		}
		$items = $id;
		$this->set(compact('items'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($idcategory=null,$item=null,$id = null,$vista=null) {
		$this->loadModel('Item');
		if (!$this->Presentation->exists($id)) {
			throw new NotFoundException(__('Invalid presentation'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Presentation->save($this->request->data)) {
				//$this->Session->setFlash(__('The presentation has been saved'));
				if($vista=='categories'){
					$this->redirect(array('controller'=>'Categories','action' => 'select1',$idcategory));

				}else{
					$this->redirect(array('controller'=>'Categories','action' => 'select1',$idcategory,$item));

				}
				$this->redirect(array('controller'=>'Categories','action' => 'select'));
			} else {
				$this->Session->setFlash(__('La presentacion no se pudo editar'));
			}
		} else {
			$options = array('conditions' => array('Presentation.' . $this->Presentation->primaryKey => $id));
			$this->request->data = $this->Presentation->find('first', $options);
		}

		//crear un propio seled para aumntar la catgoria del iteem 
		$items = $this->Item->find('all',array('conditions'=>array('Item.removed'=>'no'),'recursive'=>1));                
        $array = null;      

        foreach ($items as $item){
            $array[$item['Item']['id']] = $item['Category']['name']."=>".$item['Item']['name'];
        } 

		//$items = $this->Presentation->Item->find('list',array('conditions'=>array('Item.removed'=>'no'),'recursive'=>2));
		$this->set(compact('array'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($idcategory=null,$item=null,$id = null,$vista=null) {

		if (!$this->Presentation->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}else{
	
		$datos = $this->Presentation->find('first',array('conditions' => array('Presentation.' . $this->Presentation->primaryKey => $id)));
		

			$data['Presentation']['id'] =  $datos['Presentation']['id']; 
			$data['Presentation']['name'] =  $datos['Presentation']['name']; 
			$data['Presentation']['category_id'] = $idcategory; 
			$data['Presentation']['removed'] = 'si';

			if ($this->Presentation->save($data)) {
			//$this->Session->setFlash(__('The category has been saved'));
				if($vista=='categories'){
					$this->redirect(array('controller'=>'Categories','action' => 'select1',$idcategory));

				}else{
					$this->redirect(array('controller'=>'Categories','action' => 'select1',$idcategory,$item));

				}
			} else {
				$this->Session->setFlash(__('El producto no se a podido eliminar'));
			}
		}

		/*$this->loadModel('ImagesPresentation');
		$this->loadModel('PresentationsQuote');
		$this->Presentation->id = $id;
		if (!$this->Presentation->exists()) {
			throw new NotFoundException(__('Invalid presentation'));
		}else{
			$this->request->onlyAllow('post', 'delete');
			$ImagesPresen = $this->ImagesPresentation->find('all',array('conditions' => array('ImagesPresentation.' . 'presentation_id' => $id)));
					foreach ($ImagesPresen as $imgpr) {
						$this->ImagesPresentation->id = $imgpr['ImagesPresentation']['id'];
						$this->ImagesPresentation->delete();
					}
			$presentationsQuote = $this->PresentationsQuote->find('all',array('conditions' => array('PresentationsQuote.' . 'presentation_id' => $id)));
			foreach ($presentationsQuote as $prequote) {
				$this->PresentationsQuote->id = $prequote['PresentationsQuote']['id'];
				$this->PresentationsQuote->delete();
			}
			if ($this->Presentation->delete()) {
				//$this->Session->setFlash(__('Presentation deleted'));
				if($vista=='categories'){
					$this->redirect(array('controller'=>'Categories','action' => 'select1',$idcategory));

				}else{
					$this->redirect(array('controller'=>'Categories','action' => 'select1',$idcategory,$item));

				}
			}
		}
		
		$this->Session->setFlash(__('Presentation was not deleted'));*/
		
	}
}
