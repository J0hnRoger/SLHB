<?php

/*
 * Define your routes and which views to display
 * depending of the query.
 *
 * Based on WordPress conditional tags from the WordPress Codex
 * http://codex.wordpress.org/Conditional_Tags
 *
 */

 /*Layouts Data - Header */
 View::share(array(
   'logoUrl' =>     themosis_assets().'/images/slhb-logo.png',
   'logoMinUrl' =>     themosis_assets().'/images/white_logo.png',
   'logoFb' =>     themosis_assets().'/images/logo-fb.png',
   'logoGMap' =>     themosis_assets().'/images/logo-gmap.png',
   'footerImage' => themosis_assets(). '/images/image-footer-2015.png',
   'defaultAvatar' => themosis_assets(). '/images/slhb-default-avatar.png',
   'currentUser' => User::current(),
   'headerMenu' =>  NavigationModel::getMenuItems("header-nav")
 ));

 /*Page d'accueil */
 Route::any('front', 'HomeController@index');


 /* Page de détails d'une équipes */
 Route::get('singular', ['slhb_team', function (){
   return View::make('teams.teams')->with(array(
     'page' =>  PageModel::getCurrentPage()
   ));
 }]);

/*Page par défaut*/
Route::get('page', function (){
  return View::make('page')->with(array(
    'page' =>  PageModel::getCurrentPage()
  ));
});

/*Page de détails d'une actualité */

Route::get('singular', array('post', function (){
	return View::make('actualites.single');
}));

/* Page Calendrier */
Route::get('template', array('calendar-template', 'uses' => 'AgendaController@index'));

/* Page Toutes les équipes */

/* Page Infos pratiques */

/* Page Médiathèque */

/* Page Contacts */

/* Page Boutique */

/* Page Profil  */
