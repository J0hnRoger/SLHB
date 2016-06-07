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

///* redirect users to front page after login */
function redirect_to_front_page() {
  global $redirect_to;
  if (!isset($_GET['redirect_to'])) {
    $redirect_to = get_option('siteurl');
  }
}
add_action('login_form', 'redirect_to_front_page');
