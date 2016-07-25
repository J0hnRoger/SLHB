<?php

class ProfileController extends BaseController
{
    public function index()
    {
      if (!UserModel::hasTheRole(User::current()->ID, 'slhb_player') && !UserModel::hasTheRole(User::current()->ID, 'slhb_coach'))
        return "<h1> Access Denied - Merci de vous authentifier avant d'accéder à cette page </h1>";

      $currentPlayer = UserModel::getCurrentPlayer();
      UserModel::LoadNextMatch($currentPlayer);
      if ($currentPlayer->isPlayer)
        return  View::make('profile.player-profile')->with(array(
          'home_banner' =>  themosis_assets() . "/images/_Profil_Header01.jpg",
          'currentPlayer' => $currentPlayer
        ));
      else
        return  View::make('profile.coach-profile')->with(array(
          'home_banner' =>  themosis_assets() . "/images/_Profil_Header01.jpg",
          'currentCoach' => $currentPlayer
        ));
    }
}

?>
