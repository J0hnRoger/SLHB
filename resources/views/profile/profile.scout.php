<?php
/*
  Use $current_user variable for retrieve informations of the current user
for each players : Array
  (
      [ID] => 5
      [user_login] => guillaume
      [user_pass] => $P$BZYgCdcGX.kFTwbHcRgHt6hlIY4EOE/
      [user_nicename] => guillaume
      [user_email] => guillaume@example.com
      [user_url] =>
      [user_registered] => 2016-04-20 15:05:25
      [user_activation_key] =>
      [user_status] => 0
      [display_name] => guillaume
      [teams] => Array
          (
              [0] => SLHB 1
          )
  )
*/
?>

@extends('layouts.main')
@section('main-wrapper')
<main id="profile" class="mdl-layout__content">
<div class="mdl-grid">
  <aside class="mdl-cell mdl-cell--4-col">
    <h2>Mon profil</h2>
    <div class="avatar" style="background:url( {{$currentPlayer->profilePicture }}) center / cover">
    </div>
    <div class="infos">
  <h4>{{$currentPlayer->user_nicename}}</h4>
    @if($currentPlayer->positions != '')
      @foreach($currentPlayer->positions as $key => $pos)
        <span class="label-pills">{{ $pos }}</span>
      @endforeach
    @endif
    </div>
  </aside>

  <div class="mdl-cell mdl-cell--8-col" ng-app="demoApp" ng-controller="DemoController">
    <md-tabs md-selected="selectedIndex" md-dynamic-height>
      <img ng-src="img/angular.png" class="centered">
      <md-tab>
        <md-tab-label>
          Prochains Matchs
        </md-tab-label>
        <md-tab-body class="match-list">
          @if (!isset($currentPlayer->nextMatch) || count($currentPlayer->nextMatch->players) == 0)
          <h5>La liste de gladiateurs morts de faim n'est pas encore sortie.</h5>
          @else
            <div class="match-header">

              <h1>{{$currentPlayer->nextMatch->match_team_dom}} - {{$currentPlayer->nextMatch->match_team_ext}}</h1>
              <span>Date du rendez-vous : 18h</span>
            </div>
            <!-- NgMaterial -->
            <md-card>
              <md-card-title>
                <md-card-title-media>
                  <div class="md-media-sm card-media" layout layout-align="center center" >
                    <md-icon md-svg-icon="person" style="color:grey"></md-icon>
                  </div>
                </md-card-title-media>
                <md-card-title-text>
                  <span class="md-headline">Test</span>
                  <span class="md-subhead description">Ipsum lorem caveat emptor...</span>
                </md-card-title-text>
              </md-card-title>
            </md-card>
            <!-- NgMaterial End-->
            <ul class="mdl-list players-list">
              @foreach($currentPlayer->nextMatch->players as $key => $player)
              <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                {{ get_avatar($player['ID'], 32) }}
                {{ $player['user_nicename'] }}
                </span>
              </li>
              @endforeach
            </ul>
            @endif

        </md-tab-body>
      </md-tab>
      <md-tab>
        <md-tab-label>
          Planning repas
        </md-tab-label>
        <md-tab-body>
          <ul>
            <li>bouffe 1</li>
            <li>bouffe 2</li>
            <li>bouffe 3</li>
            <li>bouffe 4</li>
            <li>bouffe 5</li>
            <li>bouffe 6</li>
            <li>bouffe 7</li>
            <li>bouffe 8</li>
            <li>bouffe 9</li>
            <li>bouffe 10</li>
            <li>bouffe 11</li>
            <li>bouffe 12</li>
            <li>bouffe 13</li>
            <li>bouffe 14</li>
            <li>bouffe 15</li>
            <li>bouffe 16</li>
            <li>bouffe 17</li>
            <li>bouffe 18</li>
            <li>bouffe 19</li>
            <li>bouffe 20</li>
          </ul>
        </md-tab-body>
      </md-tab>
      <md-tab>
        <md-tab-label>
          Arbitrage/Table/Bar
        </md-tab-label>
        <md-tab-body>
          <iframe width='100%' height='800px' frameborder='0'
              src='https://docs.google.com/spreadsheets/d/1uVbWy_Pg03BnxqZ9HMN63vYmsrM5EMP3ZSEQXw5WFIo/pubhtml'>
          </iframe>
        </md-tab-body>
      </md-tab>
    </md-tabs>
  </div>
</div>
</main>
@overwrite
