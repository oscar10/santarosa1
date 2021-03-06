<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
* Requirements Controller
*
* @property Requirement $Requirement
*/
class RequirementsController extends AppController {

/**
* index method
*
* @return void
*/



public function index($id=null,$sucursal=null) {
		 $requirements =  $this->Requirement->find('all', array('conditions' => array('Requirement.' . 'charge_id' => $id)));
		$this->set(compact('requirements','sucursal'));

}

/**
* view method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
public function view($id = null,$sucursal = null) {
$requirement = $this->Requirement->find('first', array('conditions' => array('Requirement.' . $this->Requirement->primaryKey => $id)));
$this->set(compact('requirement', 'sucursal'));
}
/**
* add method
*
* @return void
*/
public function add() {

if ($this->request->is('post')) {
$this->Requirement->create();
if ($this->Requirement->save($this->request->data)) {
//$this->Session->setFlash(__('The requirement has been saved'));
$this->redirect(array('action' => 'index'));
} else {
$this->Session->setFlash(__('El requerimiento no se pudo guardar'));
}
}
$charges = $this->Requirement->Charge->find('list');
$this->set(compact('charges'));
}

/**
* edit method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
public function edit($id = null) {

if (!$this->Requirement->exists($id)) {
throw new NotFoundException(__('Invalid requirement'));
}
if ($this->request->is('post') || $this->request->is('put')) {
if ($this->Requirement->save($this->request->data)) {
//$this->Session->setFlash(__('The requirement has been saved'));
$this->redirect(array('action' => 'index'));
} else {
$this->Session->setFlash(__('El requerimiento no se pudo editar'));
}
} else {
$options = array('conditions' => array('Requirement.' . $this->Requirement->primaryKey => $id));
$this->request->data = $this->Requirement->find('first', $options);
}
$charges = $this->Requirement->Charge->find('list');
$this->set(compact('charges'));
}

/**
* delete method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
public function delete($id = null) {

$this->Requirement->id = $id;
if (!$this->Requirement->exists()) {
throw new NotFoundException(__('Invalid requirement'));
}
$this->request->onlyAllow('post', 'delete');
if ($this->Requirement->delete()) {
//$this->Session->setFlash(__('Requirement deleted'));
$this->redirect(array('action' => 'index'));
}
$this->Session->setFlash(__('El requerimiento no se pudo eliminar'));
$this->redirect(array('action' => 'index'));
}


public function select($id=null){

		$menu1 = array('menu1' => array('id' => 'menu2'));

		//menu
		$this->Session->write($menu1);
		$menu = array('menu' => array('id' => 'mm','inferior'=>'','superior'=>'','color'=>''));
		//menu
		$this->Session->write($menu);




		$filename=null;
		if ($this->request->is('post')) {
		//Subir archivos
		if ($this->request->data['Requirement']['curriculum']) {
		  try {
		$file = new File($this->request->data['Requirement']['curriculum']['tmp_name']);
		$path_parts = pathinfo($this->request->data['Requirement']['curriculum']['name']);
		//$ext = $path_parts['extension'];

		$date = $this->request->data['Requirement']['curriculum']['name'];
		$filename = $this->request->data['Requirement']['charge_id'].$this->request->data['Requirement']['email'].$date;

		$data = $file->read();	
		$file = new File(WWW_ROOT.'img/requirement/curriculum/'.$filename,true);
		$file->write($data);
		$file->close();
		//Fin subir archivos

		$this->request->data['Requirement']['curriculum'] = $filename;


		$this->Requirement->create();
		if ($this->Requirement->save($this->request->data)) {
		//$this->Session->setFlash(__('The requirement has been saved'));
		$this->redirect(array('action' => 'email'));
		} else {
			$this->Session->setFlash(__('El requerimiento no se pudo guardar'));
			$this->redirect(array('controller' => 'Requirements','action' => 'select',$data['Requirement']['charge_id']));
			}

			}catch (Exception $e) {
		   		$this->Session->setFlash(__('Seleccione un archivo valido'));
				$this->redirect(array('controller' => 'Requirements','action' => 'select',$data['Requirement']['charge_id']));
		   }
				
			
			}else{		
			$this->Session->setFlash(__('Seleccione un archivo'));
			$this->redirect(array('controller' => 'Requirements','action' => 'select',$data['Requirement']['charge_id']));
			}
		}

		else{
			
		$this->loadModel('Charge');
		$this->loadModel('Supermarket');
		if($this->Charge->exists($id)){
		$Charge = $this->Charge->find('all',array('conditions' => array('Charge.' . $this->Charge->primaryKey => $id)));
		$Supermarket = $this->Supermarket->find('all');	
		$this->set(compact('Charge','Supermarket'));
		}
		else{
			$this->redirect(array('controller'=>'Requirements','action'=>'select'));
		}
	
		}

		}


		public function email(){

		$requirement = $this->Requirement->find('first',array('order' => 'Requirement.created DESC'));
			

				$datos = array('requirement' => array('datos' => $requirement));

				//menu
				$this->Session->write($datos);
		
		$this->Email = new CakeEmail();
		$this->Email->from(array('oscar_7938074@hotmail.com' => 'Avicola Santatosa'));
        $this->Email->to('oscar_7938074@hotmail.com');
        $this->Email->subject('REQUERIMIENTO DE PERSONA');
        $this->Email->attachments(array(WWW_ROOT."img/requirement/curriculum/".$requirement['Requirement']['curriculum']));
        $this->Email->template('requirements');
        $this->Email->emailFormat('html');
        $val=null;
        if($this->Email->send()){
		  	$this->redirect(array('controller' => 'Branches','action' => 'select'));
			
		}else{
		  $val="Email no enviado";
		 

		}
		// $this->set(compact('val'));
		}

}