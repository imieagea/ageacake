<?php 
class CategorySlugRoute extends CakeRoute {
 
    function parse($url) {
        $params = parent::parse($url);
        if (empty ($params)) {
            return false;
        }
        $slugsPC = Cache::read('parents_categories_slugs');
        if (empty($slugsPC)) {
            App::import('Model', 'Category');
            $Category = new Category();
            $categories = $Category->find('all', array(
                'fields' => array('Category.slug'),
                'conditions' => array('Category.parent_id'=>null),
                'recursive' => 1
            ));
            $slugsPC = array_flip(Set::extract('/Category/slug', $categories));
            Cache::write('parents_categories_slugs', $slugsPC);
        }

        $slugsSC = Cache::read('categories_slugs');
        if (empty($slugsSC)) {
            App::import('Model', 'Category');
            $Category = new Category();
            $categories = $Category->find('all', array(
                'fields' => array('Category.slug'),
                'recursive' => -1
            ));
            $slugsSC = array_flip(Set::extract('/Category/slug', $categories));
            Cache::write('categories_slugs', $slugsSC);
        }

        $slugsP = Cache::read('posts_slugs');
        if (empty($slugsP)) {
            App::import('Model', 'Post');
            $Post = new Post();
            $posts = $Post->find('all', array(
                'fields' => array('Post.slug'),
                'recursive' => -1
            ));
            $slugsP = array_flip(Set::extract('/Post/slug', $posts));
            Cache::write('posts_slugs', $slugsP);
        }
        if (isset($slugsPC[$params['categoryslug']]) && isset($slugsSC[$params['sscategoryslug']])  && isset($slugsP[$params['slug']])) {
            return $params;
        }
        return false;
    }
 
}

?>