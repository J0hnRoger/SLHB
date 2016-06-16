<?php

class ProfileController extends BaseController
{
    public function index()
    {
      if (!UserModel::hasTheRole(User::current()->ID, 'slhb_player') && !UserModel::hasTheRole(User::current()->ID, 'slhb_coach'))
        return "<h1> Access Denied - Merci de vous authentifier avant d'accéder à cette page </h1>";

      $currentPlayer = UserModel::getCurrentPlayer();

      if (isset($currentPlayer->teams)){
        $matchs = [];
        foreach ($currentPlayer->teams as $teamName) {
          array_push($matchs, MatchModel::getFullNextMatchForTeam($teamName));
        }
      }

      return  View::make('profile.profile')->with(array(
        'current_user' => $currentPlayer,
        'next_match' => MatchModel::getFullNextMatch()
      ));
    }
}

?>
