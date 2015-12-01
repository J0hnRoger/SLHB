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

    <pre><code class="language-markup">
    	&lt!-- TODO - Zone de widget  -->
    	&lt;section id="team-widget">
        &lt;!-- Afficher le prochain match -->
    	&lt;/section>
    </code></pre>
@stop
