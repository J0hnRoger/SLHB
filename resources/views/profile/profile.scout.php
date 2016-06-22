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
    <div class="avatar" style="background:url( {{ $currentPlayer->profilePicture }}) center / cover">
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
        <md-tab-body>
          @if (!isset($currentPlayer->nextMatch) || count($currentPlayer->nextMatch->players) == 0)
          <h5>La liste de gladiateurs morts de faim n'est pas encore sortie.</h5>
          @else
            <div class="match-header">
              <h1>{{$currentPlayer->nextMatch->match_team_dom}} VS {{$currentPlayer->nextMatch->match_team_ext}}</h1>
              <span>Date du rendez-vous : {{$currentPlayer->nextMatch->match_team_time}}</span>
              <md-subheader class="md-primary">Date du match : {{$currentPlayer->nextMatch->match_real_time}}</md-subheader>
            </div>
            <md-list class="players-list">
            @foreach($currentPlayer->nextMatch->players as $key => $player)
            <!-- NgMaterial -->
           <md-divider></md-divider>
           <md-list-item ng-click="" class="noright">
             <img alt="{{ $player['user_nicename'] }}" ng-src="{{ $player['profilePicture'] or 'default' }}" class="md-avatar" />
             <div class="md-list-item-text">
                {{ $player['user_nicename'] }}
              @if($player['positions'] != '')
              <div class="position-container">
                 @foreach($player['positions'] as $key => $pos)
                   <span class="label-pills ">{{ $pos }}</span>
                 @endforeach
              </div>
               @endif
             </div>
             <md-checkbox class="md-secondary" ng-model="$player.selected"></md-checkbox>
           </md-list-item>
            @endforeach
          </md-list>

            <!-- NgMaterial End-->
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
