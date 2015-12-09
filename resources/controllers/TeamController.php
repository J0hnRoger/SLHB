<?php

class TeamController extends BaseController
{
    public function index()
    {
        return  View::make('teams.archive')->with(array(
          'teams' =>  TeamModel::all()
        ));
    }

    function getSingle(){
      return View::make('teams.single')->with(array(
        'page' =>  PageModel::getCurrentPage()
      ));
    }
}

?>
