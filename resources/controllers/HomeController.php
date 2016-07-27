<?php

class HomeController extends BaseController
{
    public function index()
    {
        // admin/application.php or inside any controllers or route closure.
        add_filter('themosisGlobalObject', function($data)
        {
            $user = User::current();
            // Add your data.
            $data['userId'] = $user->ID;
            return $data;
        });

        $currentUser = UserModel::getCurrentPlayer();

        $viewParams = array(
            'actus' => PostModel::getLastPosts(4),
            'last_match' => MatchModel::getLastResult(10),
            'next_match' => MatchModel::getNextMatchs(2),
            'home_banner' =>  themosis_assets() . "/images/banner.jpg",
            'login_url' =>  home_url(),
            'actu_default_image' => themosis_assets() . '/images/_Actu_270x250.jpg',
            'currentUser' => $currentUser,
            'url' => ( $currentUser->isCoach ) ? '/coach-profile' : '/player-profile'
        );

        if ($currentUser->isPlayer) {
            UserModel::LoadNextMatch($currentUser);
            return View::make('home.home-content')->with($viewParams);
        }
        else if ($currentUser->isCoach) {
            return View::make('home.home-content')->with($viewParams);
        }
    }

    public function getSingleActualite()
    {
      return View::make('actualites.single')->with(array(
        'actu' => PostModel::getCurrent(),
        'next_post' => get_next_post(),
        'previous_post' => get_previous_post(),
        'home_banner' =>  themosis_assets() . "/images/_Actu_Header01.jpg"
      ));
    }

}
