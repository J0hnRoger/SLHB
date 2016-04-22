<?php

class HomeController extends BaseController
{
    public function index()
    {
        return View::make('home.home-content')->with(array(
            'actus' => PostModel::all(),
            'last_match' => MatchModel::getLastResult(10),
            'next_match' => MatchModel::getNextMatchs(2),
            'home_banner' =>  themosis_assets() . "/images/banner.jpg"
        ));
    }

    public function getSingleActualite()
    {
      return View::make('actualites.single')->with(array(
        'actu' => PostModel::getCurrent()
        // 'relatedPosts'
      ));
    }

    //TODO - Get Related Posts from WP extension https://wordpress.org/plugins/related/installation/
    public function GetRelatedPost()
    {
        global $related;
        $rel = $related->show( get_the_ID(), true );
        // Display the title of each related post
        if( is_array( $rel ) && count( $rel ) > 0 ) {
            foreach ( $rel as $r ) {
                if ( is_object( $r ) ) {
                    if ($r->post_status != 'trash') {
                        echo get_the_title( $r->ID ) . '<br />';
                    }
                }
            }
        }
    }
}

?>
