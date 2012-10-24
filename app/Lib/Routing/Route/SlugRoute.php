<?php 
class SlugRoute extends CakeRoute {
 
    function parse($url) {
        $params = parent::parse($url);
        if (empty ($params)) {
            return false;
        }
        App::import('Model', 'Contenus');
        $Contenus = new Contenus();
        $count = $Contenus->find('count', array (
            'conditions' => array ('Contenus.slug' => $params['slug']),
            'recursive' => -1
        ));
        if ($count) {
            return $params;
        }
        return false;
    }
 
}

?>