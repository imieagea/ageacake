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


    var $uses = array('Contenus');

	public $components = array(
        'Auth' => array(
            'loginRedirect' => array('controller' => 'pages', 'action' => 'display','home'),
            'logoutRedirect' => array('controller' => 'pages', 'action' => 'display' , 'home'),
            'authorize' => array('Controller')
        ),
        'Session'
    );
    public $helpers = array('Html', 'Form', 'Session');

    public function beforeFilter() {
        //Configure AuthComponent
        
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'pages', 'action' => 'display','home');
        $this->Auth->loginRedirect = array('controller' => 'pages', 'action' => 'display','home');
        $this->Auth->allow('display');

        //Menu initialisation
        $tabs = $this->Contenus->find('all');
        $this->set('tabs',$tabs);
        $this->set('session',$this->Session);
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
