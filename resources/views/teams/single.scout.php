<?php
/*
  Use $team variable for retrieve informations on the current team
*/
?>



@extends('layouts.main')

@section('main')
<div class="details-team">
  	<header>
      <h1>{{ $team->post_title }}</h1>
    </header>
    <article>
      {{ $team->post_content }}
    </article>
    <h2>Entraineur :</h2>

  <div class="the-crew">
    <ul>
    @foreach($coaches as $coach)
    <li>
      <img src="{{ $coach->profilePicture  }}" alt="" />
      <p>
        <b>{{ $coach->display_name }}</b>
        <p>{{ $coach->user_email }}</p>
        <p>Tel : {{ $coach->phone }}</p>
      </p>
    </li>
    @endforeach
  </ul>
  </div>

  </div>

@stop
