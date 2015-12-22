<?php

class InfosPratiquesController extends BaseController
{
    public function index()
    {
        return View::make('infos-pratiques.infos-content')->with(array(
        ));
    }
}

?>
