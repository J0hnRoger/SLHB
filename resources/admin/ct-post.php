<?php
/*-----------------------------------------------------------------------*/
// Add Custom field to the native Post Type for manage News wich must appear in agenda
/*-----------------------------------------------------------------------*/

$infos = Metabox::make('Informations sur l\'évènement', "post")->set(array(
  Field::checkbox('isEvent',  'C\'est un évènement'),
  Field::date('eventDate', ['title' => 'Date de l\'évènement'])
));
