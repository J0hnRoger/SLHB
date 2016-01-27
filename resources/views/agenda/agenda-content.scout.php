@extends('layouts.main')

@section('main')
<div ng-app="calendar">
  <h1 class="mdl-layout--large-screen-only">Agenda 2016</h1>
<div class="agenda mdl-grid">
  <span id="btn-navigation" class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--fab mdl-button--mini-fab count">3</span>
  <span id="btn-navigation" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect count back"><i class="material-icons">arrow_back</i></span>
<div class="mdl-tooltip" for="btn-navigation">
   Back to the article
</div>
<div class="timeline mdl-shadow--8dp">
  <ul>
    <li>
      <span class="num">1</span>
      <span class="month">sep</span>
    </li>
    <li><span class="num">2</span><span class="month">sep</span></li>
    <li class="selected"><span class="num">3</span><span class="month">sep</span></li>
    <li><span class="num">4</span><span class="month">sep</span></li>
    <li><span class="num">5</span><span class="month">sep</span></li>
    <li><span class="num">6</span><span class="month">sep</span></li>
    <li><span class="num">7</span><span class="month">sep</span></li>
  </ul>
</div>

<div class="left-panel header mdl-shadow--2dp">
  <div class="header mdl-shadow--3dp">
    <h4>September</h4>
  </div>
  <ul>
    <li>
      <div class="hour">12:00</div>
      <span class="descr">Stage jeune</span>
    </li>
    <li>
      <div class="hour">18:30</div>
      <span class="descr">Tournoi de hand sur gazon</span>
    </li>
    <li>
      <div class="hour">21:00</div>
      <span class="descr">Fête du hand à la salle</span>
    </li>
  </ul>
</div>
<div class="event-details">
    <div class="cover mdl-shadow--3dp" style="background : url(//192.168.0.30:3000/content/themes/SLHB/resources/assets/images/banner.jpg) top / cover;" alt="" />
      <div class="header-content">
        <h1>Stage jeune</h1>
        <div class="date">26 SEPT</div>
      </div>
    </div>

    <div class="mdl-grid carousel mdl-shadow--2dp">
      <div style="background-image : url(http://192.168.0.30:3000/content/uploads/2015/10/SENIORSGARS1.jpg);background-position:top" > </div>
      <div style="background-image : url(http://192.168.0.30:3000/content/uploads/2015/10/SENIORSGARS1.jpg);background-position:right" > </div>
      <div class="more-pictures" > <h1>+5</h1> Photos</div>
      <div style="background-image : url(http://192.168.0.30:3000/content/uploads/2015/10/SENIORSGARS1.jpg);background-position:center" ></div>
    </div>
    <div class="event-content">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </div>

  </div>
</div>

@stop
