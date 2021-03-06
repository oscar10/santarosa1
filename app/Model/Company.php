<?php
App::uses('AppModel', 'Model');
/**
 * Company Model
 *
 * @property Branch $Branch
 */
class Company extends AppModel {
/**
 * img field
 *
 */
var $actsAs = array(
        'MeioUpload' => array('filename')
    );
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Branch' => array(
			'className' => 'Branch',
			'foreignKey' => 'company_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
