<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {


    var $uses = array('Contenus','Post');

	public $components = array(
        'Auth' => array(
            'loginRedirect' => '/',
            'logoutRedirect' => '/',
            'authorize' => array('Controller')
        ),
        'Session'
    );
    public $helpers = array('Html', 'Form', 'Session');

    public function beforeFilter() {
        //Configure AuthComponent
        
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'home', 'action' => 'index');
        $this->Auth->loginRedirect = array('controller' => 'home', 'action' => 'index');
        $this->Auth->allow('display');

        //Menu initialisation
        $tabs = $this->Contenus->find('all');
        $this->set('tabs',$tabs);		
        $this->set('session',$this->Session);
		
		$options['joins'] = array(    
			array('table' => 'categories',
			'alias' => 'cat',
			'type' => 'INNER',
			'conditions' => array( 
				'cat.id= Post.category_id',
				)    
				),
			array('table' => 'categories',
			'alias' => 'cat2',
			'type' => 'INNER',
			'conditions' => array( 
				'cat2.id= cat.parent_id',
				)    
				)	
				
				);
			$options['limit'] = 3;
			$options['order'] = 'Post.id DESC';
		$options['conditions'] = array( 'cat2.slug' => 'actualites');
		 $side_actus = $this->Post->find('all',$options);
        $this->set('side_actus',$side_actus);
		
		$options2['conditions'] = array( 'Category.slug' => 'informations-de-contact');
		 $infos_contact = $this->Post->find('first',$options2);
        $this->set('infos_contact',$infos_contact);
		
    }

    public function isAuthorized($user) {
    // Admin peut accéder à toute action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }

        // Refus par défaut
        return false;
    }
}
