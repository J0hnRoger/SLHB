  <header class="mdl-layout__header mdl-layout__header--scroll">
    <div class="mdl-layout__header-row">
      <div class="mdl-layout-title mdl-cell--2-col">
        <img class="logo" src="{{ $logoUrl }}" alt="">
      </div>
      <div class="mdl-layout-spacer"></div>
      <div id="widget-last-results" class="mdl-cell--3-col">
        <h3>Derniers résultats</h3>
          @if(isset($last_match))
          <span class="results">{{$last_match->match_team_dom}}
            <b>{{$last_match->score_dom}}</b>
              -
            <b>{{$last_match->score_ext}}</b> {{$last_match->match_team_ext}}</span>
            @else
            <span class="results">L'important, c'est de participer...</span>
            @endif
      </div>
      <div class="mdl-layout-spacer"></div>
      <div id="login" class="mdl-cell mdl-cell--4-col mdl-grid">
        @if($currentUser->user_login != false )
        <div class="mdl-cell mdl-cell--6-col user-information">
          <h5>Bonjour {{ $currentUser->user_login }}</h5>
          <a href="/my-profile">Accéder à votre compte </a>
          @if(UserModel::hasTheRole($currentUser->ID, 'slhb_player'))
            @if (!empty($currentUser->nextMatch))
          <a href="/my-profile"><div id="ttPlay" class="animated bounceIn icon material-icons">announcement</div></a>
          <div id="play" class="mdl-tooltip mdl-tooltip--large" for="ttPlay">
            Tu joues le {{$currentUser->nextMatch->match_date}} contre {{ $currentUser->nextMatch->match_team_ext }}!
          </div>
            @endif
          <div ng-app="presential">
            <is-present init="{{ $currentUser->is_present }}"></is-present>
          </div>
          @endif
        </div>
        <div class="mdl-cell mdl-cell--4-col">
          <img class="avatar avatar-65 photo"  src="<?php echo get_cupp_meta($currentUser->ID, 'thumbnail'); ?>" alt="" />
        </div>
        @else
        <?php
            echo "<a href=\"" . $login_url. "/cms/wp-login.php?redirect_to=". $login_url ."\"> Cliquez ici </a>  pour vous connecter"; ?>
        @endif
      </div>
    </div>
    <div id="menu" class="mdl-layout__header-row">
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
              @if(isset($next_match[0]))
              <li class="event">
                <div class="label">Prochain match</div>
                <span></span>
                <h2>{{$next_match[0]->match_team_dom}} - {{$next_match[0]->match_team_ext}}</h2>
                <span class="date">
                  {{ $next_match[0]->match_date }}
                </span>
              </li>
              @endif
              @if(isset($next_match[1]))
              <li class="event">
                <div class="label">Prochain match</div>
                <h2>{{$next_match[1]->match_team_dom}} - {{$next_match[1]->match_team_ext}}</h2>
                <span class="date">
                  {{ $next_match[1]->match_date }}
                </span>
              </li>
              @endif
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
