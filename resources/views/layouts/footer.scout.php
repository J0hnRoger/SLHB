<?php

$images = Option::get("section-slhb-options", "logos");
?>

<h1>Nos Partenaires</h1>
<ul class="partners">
  @foreach($images as $i => $image)
  <li>
    <?php echo wp_get_attachment_image( $image );  ?>
  </li>
  @endforeach
</ul>
