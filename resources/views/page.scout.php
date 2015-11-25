<?php
/*
  Use $page variable for retrieve informations of the current page
*/
?>

@extends('layouts.main')

@section('main')
  {{ get_the_date('j F Y') }}
    <h1>{{ $page->post_name }}</h1>
    <article>{{ $page->post_content }}</article>
    <ul class="comments">
    @foreach($page->comments as $comment)
      <li>{{ $comment->comment_author }} :  {{ $comment->comment_content }}.</p>
    @endforeach
    </ul>
@stop
