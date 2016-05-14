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

@section('main')
<div class="mdl-grid">
  <aside class="mdl-cell mdl-cell--4-col">
    <h1>Mon profil</h1>
  {{ get_avatar($current_user->ID, 128) }}
  {{$current_user->user_nicename}}

  @if($current_user->positions != '')
    @foreach($current_user->positions as $key => $pos)
      <span class="label-pills">{{ $pos }}</span>
    @endforeach
  @endif
  </aside>

  <div class="mdl-cell mdl-cell--8-col" ng-app="demoApp" ng-controller="DemoController">
    <md-tabs md-selected="selectedIndex">
      <img ng-src="img/angular.png" class="centered">
      <md-tab>
        <md-tab-label>
          Prochains Matchs
        </md-tab-label>
        <md-tab-body>
            @if (count($next_match->players) == 0)
              <h5>La liste de gladiateurs morts de faim n'est pas encore sortie.</h5>
            @else
              <ul>
              @foreach($next_match->players as $key => $player)
                <li>
                  {{ get_avatar($player['ID'], 32) }}
                  {{ $player['user_nicename'] }}
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
@stop