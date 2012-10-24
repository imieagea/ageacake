<?php 
class SlugRoute extends CakeRoute {
 
    function parse($url) {
        $params = parent::parse($url);
        if (empty ($params)) {
            return false;
        }
        $count = 0;
        App::import('Model', 'Contenus');
        App::import('Model', 'Post');
        $Contenus = new Contenus();
        $count = $Contenus->find('count', array (
            'conditions' => array ('Contenus.slug' => $params['slug']),
            'recursive' => -1
        ));
        $Post = new Post();
        $count += $Post->find('count', array (
            'conditions' => array ('Post.slug' => $params['slug']),
            'recursive' => -1
        ));

        if ($count) {
            return $params;
        }
        return false;
    }
 
}

?>