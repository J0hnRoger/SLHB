<?php
/*
  Use $team variable for retrieve informations on the current team
*/
?>



@extends('layouts.main')

@section('main')
<?php $bannerId = Meta::get($page->ID, 'profile', $single = true);
$image_attributes = wp_get_attachment_image_src( $bannerId ); // returns an array
if( $image_attributes ) {
?>
<img src="<?php echo $image_attributes[0]; ?>" width="<?php echo $image_attributes[1]; ?>" height="<?php echo $image_attributes[2]; ?>">
<?php } ?>

{{ get_the_post_thumbnail($page->ID) }}
<pre><code class="language-markup">
  &lt!-- TODO - Modifier dynamiquement le bandeau  -->
</code></pre>

    <h1>{{ $page->post_title }}</h1>
    <article>{{ $page->post_content }}</article>

    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Team Widget Zone')) : ?>
    <?php endif; ?>
@stop
