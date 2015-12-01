<?php
class NextMatch_Widget extends WP_Widget
{
    public function __construct()
    {
        $params = [
            'description'   => 'Affiche le prochain match',
            'name'          => 'Prochain Match'
        ];
        parent::__construct('NextMatch_Widget', '', $params);
    }
    public function widget( $args, $instance ) {
        $match = MatchModel::getNextMatch();
        echo "<h5>Prochain match</h6>" . "<h1>". $match->match_team_dom." - ". $match->match_team_ext ."</h1>";
    }
}
?>
