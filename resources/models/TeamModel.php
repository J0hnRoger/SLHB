<?php

class TeamModel {

    /**
     * Return a list of all published posts.
     *
     * @return array
     */
    public static function all()
    {
        $query = new WP_Query(array(
            'post_type'         => 'slhb_team',
            'posts_per_page'    => -1,
            'post_status'       => 'publish'
        ));
        return $query->get_posts();
    }

    public static function getCurrent()
    {
      $team = get_queried_object();
      #add custom properties
      $bannerId = Meta::get($team->ID, 'profile', $single = true);
      $image_attributes = wp_get_attachment_image_src( $bannerId , "full");
      if( $image_attributes ) {
        $image_attributes[0];
        $team->banner = $image_attributes[0];
      }

      return $team;
    }

    public static function getTeamsArray(){
      $teamNames = [];
      foreach (TeamModel::all() as $key => $team) {
        array_push($teamNames, [$team->post_title => $team->post_title]);
      }
      return $teamNames;
    }

    public static function getTeams(){
      $teamNames = [];
      foreach (TeamModel::all() as $key => $team) {
        $teamNames[$team->post_title] = $team->post_title;
      }
      return $teamNames;
    }

    public static function getTeam($name){
      $query = new WP_Query(array(
          'post_type'         => 'slhb_team',
          'posts_per_page'    => 1,
          'post_status'       => 'publish',
          'meta_key'   => 'post_title',
          'meta_value' => 'Equipe 1'
      ));
      return $query->get_posts();
    }
}
