<?php
App::uses('AppModel', 'Model');
/**
 * CritereValue Model
 *
 * @property Critere $Critere
 * @property Fiche $Fiche
 */
class CritereValue extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'critere_value';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'value';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'critere_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fiche_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'value' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Critere' => array(
			'className' => 'Critere',
			'foreignKey' => 'critere_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Fiche' => array(
			'className' => 'Fiche',
			'foreignKey' => 'fiche_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
