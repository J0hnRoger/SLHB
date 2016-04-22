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
    register_rest_field(
        'slhb_match',
        'slhb_players',
        array(
            'get_callback' => function ( $object, $field_name, $request ) {
                $players = Meta::get($object["id"], 'slhb_players');
                return $players;
            },
            'update_callback'    => function ( $value, $object, $field_name ) {
              if ( ! $value || ! is_string( $value ) ) {
                   return;
               }

               return update_post_meta( $object->ID, $field_name, strip_tags( $value ) );
            },
        )
    );
}
