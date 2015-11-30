<?php

$team = PostType::make('slhb_team', 'Equipes', 'Equipe')->set(array(

    'public'        => true,
    'menu_position' => 30,
    'supports'      => array('title'),
    'rewrite'       => false,
    'query_var'     => false

));

/*-----------------------------------------------------------------------*/
// Team informations
/*-----------------------------------------------------------------------*/
$infos = Metabox::make('Informations de l\'équipe', $team->get('name'))->set(array(
  Field::select('Niveau', [
  [
      'Excellence Région',
      'Honneur Région',
      'Pré-Région',
      'Deuxième division'
  ]
], ['title' => 'Quelle division? '])
));
