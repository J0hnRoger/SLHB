<?php $facebookUrl = Option::get('section-slhb-options', 'facebook_url');
      $gmapUrl = Option::get('section-slhb-options', 'gmap_url');
?>
<ul class="social">
  <li>
    <a href="{{$facebookUrl}}" target="_blank">
      <img src="{{$logoFb}}" alt="" />
      <div class="mdl-layout--large-screen-only">Suivez nous sur Facebook
      Et découvrez toute notre actualité</div>
    </a>
  </li>
  <li>
    <a href="{{$gmapUrl}}" target="_blank">
      <img src="{{$logoGMap}}" alt="" />
      <div class="mdl-layout--large-screen-only">Trouvez-nous facilement
      Plan détaillé et informations utiles</div>
    </a>
  </li>
</ul>
<div id="banner-image" class="mdl-layout--large-screen-only">
  <!-- <img src="{{$footerImage}}" alt="" /> -->
</div>
<div id="banner-image" class="mdl-layout--small-screen-only">
  <!-- <img src="{{ $logoUrl}}" alt="" /> -->
</div>
