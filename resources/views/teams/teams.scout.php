<?php
/*
  Use $team variable for retrieve informations on the current team
*/
?>

@extends('layouts.main')

@section('main')
<pre><code class="language-markup">
  &lt!-- TODO - Modifier dynamiquement le bandeau  -->
</code></pre>

    <h1>{{ $page->post_title }}</h1>
    <article>{{ $page->post_content }}</article>

    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Team Widget Zone')) : ?>
    <?php endif; ?>
@stop
