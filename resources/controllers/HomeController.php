<?php

class HomeController extends BaseController
{
    public function index()
    {
        return View::make('home.home-content')->with(array(
            'actus' => PostModel::all(),
            'last_match' => MatchModel::getLastResult(10),
            'home_banner' =>  themosis_assets() . "/images/banner.jpg"
        ));
    }
}

?>
