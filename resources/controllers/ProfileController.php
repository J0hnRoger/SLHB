<?php

class ProfileController extends BaseController
{
    public function index()
    {
      if (!UserModel::hasTheRole(User::current()->ID, 'slhb_player') && !UserModel::hasTheRole(User::current()->ID, 'slhb_coach'))
        return "<h1> Access Denied - Merci de vous authentifier avant d'accéder à cette page </h1>";

<<<<<<< HEAD
      $currentPlayer = UserModel::getCurrentPlayer();
      $teams = $currentPlayer->getSubscribeTeams();
      td($teams);
=======
      $team = TeamModel::getTeam("Equipe 1");
>>>>>>> 401f03d30ab2597ad838ea514840ed6f44408fae
      return  View::make('profile.profile')->with(array(
        'current_user' => $currentPlayer,
        'next_match' => MatchModel::getFullNextMatch()
      ));
    }
}

?>
