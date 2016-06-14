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

      $team =  TeamModel::getCurrent();

      $options = array(
        'team' => $team,
        'coaches' => UserModel::getCoachsByTeam($team->post_title)
        );

      if (isset($team->banner))
        $options["home_banner"] = $team->banner;

      return View::make('teams.single')->with($options);
    }
}

?>
