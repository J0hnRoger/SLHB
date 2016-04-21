<?php

// Expose all users(not only the users that have published a post) in wp Rest api v2
add_filter( 'rest_user_query' , 'custom_rest_user_query' );
function custom_rest_user_query( $prepared_args, $request = null ) {
  unset($prepared_args['has_published_posts']);
  return $prepared_args;
}

/*Expose meta field to REST API*/
function my_rest_prepare_match( $data, $post, $request ) {
	$_data = $data->data;
	$_data['event_date'] = Meta::get($post->ID, 'slhb_role');;
	$data->data = $_data;
	return $data;
}

add_filter( 'rest_prepare_post', 'my_rest_prepare_match', 10, 3 );

/*
  Add SLHB Custom fields on profil page
*/

$user = User::addSections([
    Section::make('slhb-section', 'SLHB'),
]);

$user->addFields([
    'slhb-section'  => [
        Field::checkbox('slhb_role', [ 'slhb_player' => 'Joueur', 'slhb_direction' => 'Bureau', 'slhb_referee' => 'Arbitre', 'slhb_coach' => 'Coach'], ['title' => 'Rôle dans le club :']),
        Field::text('slhb-phone', ['title' => 'Téléphone : '], ['class' => 'regular-text'])
    ]
]);

// Display Responsibility Field only if the user is in the direction
$userId = isset($_REQUEST["user_id"]) ? $_REQUEST["user_id"] : "";

if ($userId != "")
{
  if(UserModel::hasTheRole($userId, 'slhb_direction'))
  {
    User::addFields([
          Field::select('slhb-responsibility', [
            [
                'Président' => 'Président',
                'Vice-Président' => 'Vice-Président',
                'Secrétaire' => 'Secrétaire',
                'Secrétaire Adjoint' => 'Secrétaire Adjoint',
                'Trésorière' => 'Trésorière',
                'Trésorier Adjoint' => 'Trésorier Adjoint',
                'Responsable Bar' => 'Responsable Bar',
                'Correspondant Jeune' => 'Correspondant Jeune',
                'Correspondant Arbitrage' => 'Correspondant Arbitrage',
                'Correspondant Animation' => 'Correspondant Animation',
                'Correspondant Matériel' => 'Correspondant Matériel',
                'Adjoint' => 'Adjoint',
                'Responsable Planning' => 'Responsable Planning',
                'Responsable Communication' => 'Responsable Communication'
            ]
        ], ['title' => 'Responsabilité dans le club :'])
    ]);
  }
}
