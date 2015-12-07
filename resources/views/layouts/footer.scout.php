<?php

$images = Option::get("section-slhb-options", "logos");
?>

@foreach($images as $i => $image)
<?php echo wp_get_attachment_image( $image );  ?>
@endforeach
