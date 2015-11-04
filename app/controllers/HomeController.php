<?php

class HomeController extends BaseController
{
    public function index()
    {
        return View::make('home.home-content')->with(array(
            'logoUrl' =>     themosis_assets().'/images/slhb-logo.png',
             'actus' => PostModel::all()  
        ));
    }
}

?>