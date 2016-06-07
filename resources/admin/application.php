<?php

/**
 * application.php - Write your custom code below.
 */

Asset::add('my-jquery', 'jquery/dist/jquery.js', '2.2.3', true)->to('admin');

function formatedDate($date){
  setlocale (LC_TIME, 'fr_FR.utf8','fra');
  $date = DateTime::createFromFormat("Y-m-d", $date);
  return strftime("%A %d %B %Y", $date->getTimestamp());
}


//Allow Contributors to Add Media
if ( current_user_can('contributor') && !current_user_can('upload_files') )
add_action('admin_init', 'allow_contributor_uploads');

function allow_contributor_uploads() {
     $contributor = get_role('contributor');
     $contributor->add_cap('upload_files');
}
