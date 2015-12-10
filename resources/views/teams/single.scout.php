<?php
/*
  Use $team variable for retrieve informations on the current team
*/
?>



@extends('layouts.main')

@section('main')

    <h1>{{ $team->post_title }}</h1>
    <article>{{ $team->post_content }}</article>

    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Team Widget Zone')) : ?>
    <?php endif; ?>
@stop
