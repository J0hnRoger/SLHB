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
