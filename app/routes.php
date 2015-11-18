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
   'defaultAvatar' => themosis_assets(). '/images/slhb-default-avatar.png',
   'currentUser' => User::current(),
   'headerMenu' =>  NavigationModel::getMenuItems("header-nav")
 ));

/*Page par défaut*/
Route::get('page', array( array('historique', 'infos-pratiques', 'boutique-officielle', 'contact'), function (){
  return View::make('page')->with(array(
    'page' =>  PageModel::getCurrentPage()
  ));
}));

/*Page d'accueil */
Route::any('front', 'HomeController@index');

/*Page de détails d'une actualité */

Route::get('singular', array('post', function (){
	return View::make('actualites.single');
}));

/* Page Calendrier */
Route::get('template', array('calendar-template', 'uses' => 'AgendaController@index'));

/* Page Toutes les équipes */

/* Page de détails d'une équipes */

/* Page Infos pratiques */

/* Page Médiathèque */

/* Page Contacts */

/* Page Boutique */

/* Page Profil  */
