<?php

class PostModel {

    /**
     * Return a list of all published posts.
     *
     * @return array
     */
    public static function all()
    {
        $query = new WP_Query(array(
            'post_type'         => 'post',
            'posts_per_page'    => -1,
            'post_status'       => 'publish'
        ));

        return $query->get_posts();
    }

    public static function getLastPosts($limit)
    {
        $query = new WP_Query(array(
            'post_type'         => 'post',
            'posts_per_page'    => $limit,
            'post_status'       => 'publish',
        ));
        return $query->get_posts();
    }

    public static function getEventPosts($limit)
    {
        $query = new WP_Query(array(
            'post_type'         => 'post',
            'posts_per_page'    => $limit,
            'post_status'       => 'publish',
            'meta_key'          => 'isEvent',
            'meta_value'        => 0
        ));

        $events =  $query->get_posts();
        foreach ($events as $key => $event) {
          $eventId = $event->ID;
          $event->eventDate = Meta::get($eventId, 'eventDate');
          $event->isEvent = Meta::get($eventId, 'isEvent');
          //array_push($filledMatchs, $match);
        }
        return $events;
    }

    public static function getCurrent()
    {
      $post = get_queried_object();
      return $post;
    }

}
