<?php

class ProfileController extends BaseController
{
    public function index()
    {
      if (!UserModel::hasTheRole(User::current()->ID, 'slhb_player') && !UserModel::hasTheRole(User::current()->ID, 'slhb_coach'))
        return "<h1> Access Denied - Merci de vous authentifier avant d'accéder à cette page </h1>";

      $currentUser = UserModel::getCurrentUser();
      UserModel::LoadNextMatch($currentUser);
      if ($currentUser->isPlayer)
        return  View::make('profile.player-profile')->with(array(
          'home_banner' =>  themosis_assets() . "/images/_Profil_Header01.jpg",
          'currentPlayer' => $currentUser
        ));
      else
        return  View::make('profile.coach-profile')->with(array(
          'home_banner' =>  themosis_assets() . "/images/_Profil_Header01.jpg",
          'currentCoach' => $currentUser
        ));
    }
}

?>
