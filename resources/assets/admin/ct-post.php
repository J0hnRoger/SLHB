<?php
/*-----------------------------------------------------------------------*/
// Add Custom field to the native Post Type for manage News wich must appear in agenda
/*-----------------------------------------------------------------------*/

$infos = Metabox::make('Informations sur l\'évènement', "post")->set(array(
  Field::date('eventDate', ['title' => 'Date de l\'évènement'])
));

/*Expose meta field to REST API*/
add_action( 'rest_api_init', function() {
 register_rest_field( 'post',
    'eventDate',
    array(
       'get_callback'    => 'slug_get_eventDate',
       'update_callback' => 'slug_update_post_meta_cb',
       'schema'          => null,
    )
 );
});

function slug_get_eventDate( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
}
