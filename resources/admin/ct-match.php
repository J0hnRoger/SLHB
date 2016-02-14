<?php
/*-----------------------------------------------------------------------*/
// Match Custom Post
/*-----------------------------------------------------------------------*/
$match = PostType::make('slhb_match', 'Les matchs', 'match')->set(array(
    'public'        => true,
    'menu_position' => 20,
    'supports'      => false,
    'rewrite'       => false,
    'query_var'     => false,
    'show_in_rest'       => true,
    'labels' => [
        'add_new' => 'Ajouter un nouveau match',
        'add_item' => 'Ajouter un match',
        'all_items' => 'Tous les matchs',
        'edit_item' => 'Modifier un match'
      ]
));

/*-----------------------------------------------------------------------*/
// Match informations
/*-----------------------------------------------------------------------*/

$infos = Metabox::make('Informations du match', $match->get('name'))->set(array(
    Field::date('match_date', ['title' => 'Date du match']),
    Field::select('match_team_dom', TeamModel::getTeamsArray()),
    Field::text('match_team_ext', ['title' => 'Equipe à l\'exterieur']),
    Field::number('score_dom', ['title' => 'Score de l\'équipe à domicile']),
    Field::number('score_ext', ['title' => 'Score de l\'équipe extérieur'])
));
/*-----------------------------------------------------------------------*/
// Match Defaults Values
/*-----------------------------------------------------------------------*/
function slhb_set_title ( $post_id, $post , $update){
  $dateStr = Meta::get($post_id, 'match_date');
  $title =  $dateStr . ' - '.
            Meta::get($post_id, 'match_team_dom') . ' - '.
            Meta::get($post_id, 'match_team_ext');
    $date = date($dateStr);
    //This temporarily removes filter to prevent infinite loops
    remove_action('save_post_slhb_match', __FUNCTION__ );

    wp_update_post( array('ID' => $post_id, 'post_title' => $title, 'match_date' => $date) );

    //redo filter
    add_action('save_post_slhb_match', __FUNCTION__, 10, 3 );
}
add_action( 'save_post_slhb_match', 'slhb_set_title', 10, 3 );
