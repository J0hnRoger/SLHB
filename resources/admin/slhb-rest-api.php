<?php
/*-----------------------------------------------------------------------*/
// SLHB REST API
// Endpoint : http://<siteUrl>/wp-json/slhb/v1/<methodName>
/*-----------------------------------------------------------------------*/

add_action( 'rest_api_init', function () {
    register_rest_route( 'slhb/v1', '/get-players-by-team', array(
        'methods' => 'GET',
        'callback' => 'get_players_by_team',
    ) );
} );

// Return all post IDs
function get_players_by_team(WP_REST_Request $request) {
  $teamName = $request->get_param( 'team_name' );
  $players = UserModel::getPlayersByTeam($teamName);
  return $players;
}


// Update only the slhb_players metadata
// @match_id - The ID of the match team sheet
// @slhb_players - an array of plyer's IDs
add_action( 'rest_api_init', 'dt_register_updateTeamPlayer_hooks' );
function dt_register_updateTeamPlayer_hooks() {
    register_rest_route( 'slhb/v1', '/set-players-by-team', array(
        'methods' => 'POST',
        'callback' => 'set_players_by_team',
    ) );
}

//Update the meta field of the current match
function set_players_by_team() {
    $jsonData = json_decode(file_get_contents('php://input'), true);
    $return = array();

    if (!isset($jsonData['match_id']) || !(isset($jsonData['slhb_players'])))
      return new WP_Error( 'cant-update', __( 'Il n\'y a pas de propriete match_id ou slhb_player dans les datas', 'text-domain'), array( 'status' => 500 ) );

    $match_id    = $jsonData['match_id'];
    $slhb_players    = $jsonData['slhb_players'];

    update_post_meta($match_id, 'slhb_players', $slhb_players);

    $return[] = 'match players list updated: '.$match_id;

    $response = new WP_REST_Response( $return , 200);
    return $response;
}

/*-----------------------------------------------------------------------*/
// Match REST API
/*-----------------------------------------------------------------------*/

add_action( 'rest_api_init', 'dt_register_team_hook' );
function dt_register_team_hook() {
    register_rest_field(
        'slhb_match',
        'slhb_team',
        array(
            'get_callback'    => function ( $object, $field_name, $request ) {
                $team = Meta::get($object["id"], 'match_team_dom');
                return $team;
            },
        )
    );
}

add_action( 'rest_api_init', 'dt_register_match_date_hook' );
function dt_register_match_date_hook() {
    register_rest_field(
        'slhb_match',
        'match_date',
        array(
            'get_callback'    => function ( $object, $field_name, $request ) {
                $team = Meta::get($object["id"], 'match_date');
                return $team;
            },
        )
    );
}

add_action( 'rest_api_init', 'dt_register_match_opponent_hook' );
function dt_register_match_opponent_hook() {
    register_rest_field(
        'slhb_match',
        'opponent',
        array(
            'get_callback'    => function ( $object, $field_name, $request ) {
                $team = Meta::get($object["id"], 'match_team_ext');
                return $team;
            },
        )
    );
}

add_action( 'rest_api_init', 'dt_register_update_players_hook' );
function dt_register_update_players_hook() {
    register_api_field(
        'slhb_match',
        'slhb_players',
        array(
            'get_callback' => function ( $object, $field_name, $request ) {
                $players = get_post_meta($object["id"], 'slhb_players');
                return $players;
            },
            'schema'          => null
        )
    );
}
