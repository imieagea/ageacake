<?php
App::uses('AppModel', 'Model');
/**
 * AvisFiche Model
 *
 * @property Fiche $Fiche
 */
class AvisFiche extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'texte';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'texte' => array(
			'notempty' => array(
				'rule' => array('notempty'),
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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Fiche' => array(
			'className' => 'Fiche',
			'foreignKey' => 'fiche_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
