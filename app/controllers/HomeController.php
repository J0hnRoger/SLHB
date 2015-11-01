<?php

class HomeController extends BaseController
{
    public function index()
    {
        return View::make('layout')->with(array(
            'logoUrl' =>     themosis_assets().'/images/slhb-logo.png',
             'actus' => PostModel::all()  
        ));
    }
}

?>