<?php 
class SlugRoute extends CakeRoute {
 
    function parse($url) {
        $params = parent::parse($url);
        if (empty ($params)) {
            return false;
        }
        $slugs = Cache::read('contenus_slugs');
        if (empty($slugs)) {
            App::import('Model', 'Contenus');
            $Contenu = new Contenus();
            $contenus = $Contenu->find('all', array(
                'fields' => array('Contenus.slug'),
                'recursive' => -1
            ));
            $slugs = array_flip(Set::extract('/Contenus/slug', $contenus));
            Cache::write('contenus_slugs', $slugs);
        }
        if (isset($slugs[$params['slug']])) {
            return $params;
        }
        return false;
    }
 
}

?>