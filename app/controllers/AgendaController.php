<?php

class AgendaController extends BaseController
{
    public function index()
    {
        return View::make('agenda.agenda-content')->with(array(
        ));
    }
}

?>
