<?php
/*
  Use $team variable for retrieve informations on the current team
*/
?>



@extends('layouts.main')

@section('main')

    <h1>{{ $team->post_title }}</h1>
    <article>{{ $team->post_content }}</article>
  
@stop
