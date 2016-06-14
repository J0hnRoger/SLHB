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
      $nextMatch = MatchModel::getFullNextMatchForTeam($team->post_title);
      $nextMatch->formatedDate = "Le ".formatedDate($nextMatch->match_date);
      td($nextMatch);
      if (isset($nextMatch->match_real_time) && !empty($nextMatch->match_real_time))
        $nextMatch->formatedDate .=  " à " . $nextMatch->match_real_time;

      $options = array(
        'team' => $team,
        'coaches' => UserModel::getCoachsByTeam($team->post_title),
        'next_match' => $nextMatch
        );

      if (isset($team->banner))
        $options["home_banner"] = $team->banner;

      return View::make('teams.single')->with($options);
    }
}

?>
