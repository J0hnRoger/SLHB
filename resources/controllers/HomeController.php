<?php

class HomeController extends BaseController
{
    public function index()
    {
        return View::make('home.home-content')->with(array(
            'actus' => PostModel::all()
        ));
    }
}

?>
