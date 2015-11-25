<?php
/*-----------------------------------------------------------------------*/
// Match Custom Post
/*-----------------------------------------------------------------------*/
$match = PostType::make('slhb-match', 'Matchs', 'match')->set(array(
    'public'        => true,
    'menu_position' => 20,
    'supports'      => false,
    'rewrite'       => false,
    'query_var'     => false
));

/*-----------------------------------------------------------------------*/
// Match informations
/*-----------------------------------------------------------------------*/
$infos = Metabox::make('Informations du match', $match->get('name'))->set(array(
    Field::date('match-date', ['title' => 'Date du match']),
    Field::text('match-team-dom', ['title' => 'Equipe à domicile']),
    Field::text('match-team-ext', ['title' => 'Equipe à l\'exterieur']),
    Field::number('score-dom', ['title' => 'Score de l\'équipe à domicile']),
    Field::number('score-ext', ['title' => 'Score de l\'équipe extérieur'])
));
/*-----------------------------------------------------------------------*/
// Match Defaults Values
/*-----------------------------------------------------------------------*/
