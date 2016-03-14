<?php

$infosPratiques = get_page_by_path('infos-pratiques');

if (isset($infosPratiques) && themosis_is_post($infosPratiques->ID))
{
    /*-----------------------------------------------------------------------*/
    // TEAM METABOX
    /*-----------------------------------------------------------------------*/
    Metabox::make('Team', 'page')->set(array(

        Field::infinite('collaborators', array(
            Field::text('full-name', array('title' => 'Full name')),
            Field::text('job'),
            Field::media('pic')
        ), array('title' => 'Collaborateurs'))
    ));
}
