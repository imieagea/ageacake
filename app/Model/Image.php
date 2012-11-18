<?php
App::uses('AppModel', 'Model');
/**
 * Partenaire Model
 *
 */
class Image extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'src';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'src' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
