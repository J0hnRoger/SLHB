<?php

class MatchModel {

    /**
     * Return a list of all matchs.
     *
     * @return array
     */
    public static function all()
    {
        $query = new WP_Query(array(
            'post_type'         => 'slhb_match',
            'posts_per_page'    => -1,
            'post_status'       => 'publish'
        ));

        return $query->get_posts();
    }


    /**
     * Return only the matchs wich are played, ordered by the most recent match_date
     * to the older.
     *
     * @return array
     */
    public static function getLastResults($limit)
    {
        $query = new WP_Query(array(
            'post_type'       => 'slhb_match',
            'posts_per_page'  => $limit,
            'post_status'     => 'publish',
            'meta_query'   => array
  					(
  						array
  						(
  							'key'     => 'match_date',
  							'value'   => date("Y-m-d"),
  							'type'    => 'DATE', // TRIED: DATE, SIGNED, NUMBER
  							'compare' => '<'
  						)
  					),
            'orderby'         => 'match_date',
            'order'           => 'DESC'
        ));
        $matchs = $query->get_posts();
        return $matchs;
    }

    /**
     * Return only the matchs wich are played, ordered by the most recent match_date
     * to the older.
     *
     * @return Match Object
     */
    public static function getLastResult()
    {
        $matchs = MatchModel::getLastResults(1);
        if (count($matchs) == 1) {
          $match = $matchs[0];
          $matchId = $match->ID;

          $match->match_date = Meta::get($matchId, 'match_date');
          $match->match_team_dom = Meta::get($matchId, 'match_team_dom');
          $match->match_team_ext = Meta::get($matchId, 'match_team_ext');
          $match->score_dom = Meta::get($matchId, 'score_dom');
          $match->score_ext = Meta::get($matchId, 'score_ext');
        }
        return $match;
    }
}
