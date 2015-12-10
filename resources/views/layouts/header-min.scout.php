<header class="mdl-layout__header mdl-layout__header--scroll">
  <div id="menu" class="mdl-layout__header-row">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="{{ $logoMinUrl }}" alt="slhb" /></a>
    <nav class="mdl-navigation mdl-layout--large-screen-only">
    @foreach((array)$headerMenu as $key => $menuItem)
      <a class="mdl-navigation__link" href="{{$menuItem->url}}">{{$menuItem->title}}</a>
    @endforeach
    </nav>
  </div>
    <div id="banner" class="mdl-cell mdl-cell--12-col" style="background : url(<?php echo $home_banner ?>) top / cover;">
      <div class="overlay">
        <div class="container">
          <ul class="events">
            <li class="event">
              <div class="team">Senior 1</div>
              <div class="team">Prochain match</div>
              <span></span>
              <h2>HBCV - SLHB</h2>
              <span class="date">
                Samedi 18 Novembre - 18h00
              </span>
            </li>
            <li class="event">
              <div class="team">Senior 2</div>
              <div class="team">Prochain match</div>
              <h2>SLHB - SLAM</h2>
              <span class="date">
                Dimanche 19 Novembre - 17h00
              </span>
            </li>
          </ul>
        </div>
      </div>
    </div>
</header>
<div class="mdl-layout__drawer mdl-layout--small-screen-only">
  <span class="mdl-layout-title">{{ get_bloginfo('name') }}</span>
  <nav class="mdl-navigation">
    @foreach((array)$headerMenu as $key => $menuItem)
      <a class="mdl-navigation__link" href="{{$menuItem->url}}">{{$menuItem->title}}</a>
    @endforeach
  </nav>
</div>
