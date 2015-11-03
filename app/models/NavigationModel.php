<?php

class NavigationModel {

    /**
     * Return a list of menu items.
     *
     * @return array
     */
    public static function all()
    {
        $query = new WP_Query(array(
            'post_type'         => 'nav_menu_item'
        ));
		
        return $query->get_posts();
    }
	
    /**
     * Return the global menu with a material design HTML structure
     */
	public function getMaterialMenu($menuName){
        //TODO
    }

} 