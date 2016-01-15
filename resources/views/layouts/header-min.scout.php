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
