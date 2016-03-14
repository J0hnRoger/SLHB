<?php

/**
 * application.php - Write your custom code below.
 */

 function slug_get_post_meta_cb( $object, $field_name, $request ) {
     return get_post_meta( $object[ 'id' ], $field_name );
 }
