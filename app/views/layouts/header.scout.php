  <header class="mdl-layout__header mdl-layout__header--scroll">
    <div class="mdl-layout__header-row">
      <div class="mdl-layout-title mdl-layout--large-screen-only mdl-cell--5-col">
        <h1>SLHB</h1>
        <h4>Chavagnes en Paillers</h4>
      </div>
      <div class="logo mdl-cell mdl-cell--1-col">
        <img src="{{ $logoUrl }}" alt="">
      </div>
      <div class="mdl-layout-spacer"></div>
      @if($currentUser->user_login != false )
      <div id="login" class="mdl-cell mdl-cell--4-col mdl-grid">
        <div class="mdl-cell mdl-cell--8-col user-information">
          <h5>Bonjour {{ $currentUser->user_login }}</h5>
          <a href="">Accéder à votre compte </a>
        </div>
        <div class="mdl-cell mdl-cell--4-col">
          <?php echo get_avatar( $currentUser->user_email, 65); ?>
        </div>
      </div>
      @endif
    </div>
    <div id="menu" class="mdl-layout__header-row">
      <nav class="mdl-navigation mdl-layout--large-screen-only">
      @foreach((array)$headerMenu as $key => $menuItem)
        <a class="mdl-navigation__link" href="{{$menuItem->url}}">{{$menuItem->title}}</a>
      @endforeach
      </nav>
    </div>
      <div id="banner" class="mdl-grid mdl-cell mdl-cell--12-col">
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
