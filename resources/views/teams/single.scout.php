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

    <ul class="the-crew animated bounceIn">
    @foreach($coaches as $coach)
    <li class="the-crew__item">
      <img src="{{ $coach->profilePicture  }}" alt="" />
      <p>
        <b>{{ $coach->display_name }}</b>
        <p>{{ $coach->user_email }}</p>
        <p>Tel : {{ $coach->phone }}</p>
      </p>
    </li>
    @endforeach
  </ul>

  <div id="widget-next-match">
    <h3>Prochain match</h3>
    @if(isset($next_match))
      <div class="next-match">
        <span class="left">
          <b>
            <i class=" fa <?php if ($next_match->lieu == "activate") { echo "fa-home"; } else { echo "fa-bus";} ?>" aria-hidden="true"></i>
          {{$next_match->match_team_dom}}
          </b>
        </span>
        contre
        <span class="right">
          <b>{{$next_match->match_team_ext}}
            <i class="fa <?php if ($next_match->lieu == "activate") { echo "fa-bus"; } else { echo "fa-home";} ?>" aria-hidden="true"></i>
          </b>
        </span>
      </div>
      <span>
        {{$next_match->formatedDate}}
      </span>
        @else
        <span class="results">Pas encore de match de planifié</span>
        @endif
  </div>
</div>

@stop
