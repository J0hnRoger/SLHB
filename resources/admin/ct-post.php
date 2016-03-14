<?php
/*-----------------------------------------------------------------------*/
// Add Custom field to the native Post Type for manage News wich must appear in agenda
/*-----------------------------------------------------------------------*/

$infos = Metabox::make('Informations sur l\'évènement', "post")->set(array(
  Field::date('eventDate', ['title' => 'Date de l\'évènement'])
));

/*Expose meta field to REST API*/
function my_rest_prepare_post( $data, $post, $request ) {
	$_data = $data->data;
	$_data['event_date'] = Meta::get($post->ID, 'eventDate');;
	$data->data = $_data;
	return $data;
}

add_filter( 'rest_prepare_post', 'my_rest_prepare_post', 10, 3 );
