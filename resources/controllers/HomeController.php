<?php

class HomeController extends BaseController
{
    public function index()
    {
        return View::make('home.home-content')->with(array(
            'actus' => PostModel::all(),
            'last_match' => MatchModel::getLastResult(10),
            'next_match' => MatchModel::getNextMatchs(2),
            'home_banner' =>  themosis_assets() . "/images/banner.jpg",
            'login_url' =>  home_url(),
            'actu_default_image' => themosis_assets() . '/images/_Actu_270x250.jpg'
        ));
    }

    public function getSingleActualite()
    {
      return View::make('actualites.single')->with(array(
        'actu' => PostModel::getCurrent(),
        'next_post' => get_next_post(),
        'previous_post' => get_previous_post()
      ));
    }

}

?>
