<?php $facebookUrl = Option::get('section-slhb-options', 'facebook_url');
      $gmapUrl = Option::get('section-slhb-options', 'gmap_url'); 
?>
<ul class="social">
  <li>
    <a href="{{$facebookUrl}}" target="_blank">
      <img src="{{$logoFb}}" alt="" />
      <div>Suivez nous sur Facebook</div>
      Et découvrez toute notre actualité
    </a>
  </li>
  <li>
    <a href="{{$gmapUrl}}" target="_blank">
      <img src="{{$logoGMap}}" alt="" />
      <div>Trouvez-nous facilement</div>
      Plan détaillé et informations utiles
    </a>
  </li>
</ul>
<div id="banner-image">
  <img src="{{$footerImage}}" alt="" />
</div>
