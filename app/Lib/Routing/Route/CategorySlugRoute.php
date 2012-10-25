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
            $Category = new Post();
            $categories = $Category->find('all', array(
                'fields' => array('ParentCategory.slug'),
                'recursive' => -1
            ));
            $slugsPC = array_flip(Set::extract('/Contenus/slug', $categories));
            Cache::write('parents_categories_slugs', $slugsPC);
        }

        $slugsSC = Cache::read('categories_slugs');
        if (empty($slugsSC)) {
            $Category = new Post();
            $categories = $Category->find('all', array(
                'fields' => array('Category.slug'),
                'recursive' => -1
            ));
            $slugsSC = array_flip(Set::extract('/Contenus/slug', $categories));
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
            $slugsP = array_flip(Set::extract('/Post/slug', $categories));
            Cache::write('posts_slugs', $slugsP);
        }
        if (isset($slugsPC[$params['category-slug']]) && isset($slugsSC[$params['sscategory-slug']])  && isset($slugsP[$params['post-slug']])) {
            return $params;
        }
        return false;
    }
 
}

?>