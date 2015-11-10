<?php

class HomeController extends BaseController
{
    public function index()
    {
        return View::make('home.home-content')->with(array(
            'logoUrl' =>     themosis_assets().'/images/slhb-logo.png',
            'defaultAvatar' => themosis_assets(). '/images/slhb-default-avatar.png',
            'currentUser' => User::current(),
            'actus' => PostModel::all()
        ));
    }
}

?>