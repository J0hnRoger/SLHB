<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
   <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Ne pas supprimer les marqueurs suivants ! Sinon Bower sera perdu -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/content/themes/SLHB//resources/assets/material-design-lite/material.min.css">
    <link rel="stylesheet" href="/content/themes/SLHB//resources/assets/prism/prism.css">
    <link rel="stylesheet" href="/content/themes/SLHB//resources/assets/css/styles.css">
    <!-- endinject -->
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-grid--no-spacing">

	@section('header')
		@include('layouts.header-min')
	@show

  <div style="clear:both"></div>
  <main id="content" class="mdl-layout__content">
      @yield('main')
  </main>
  @yield('pre-footer')

  <section id="bottom-banner">
  @include('layouts.bottom-banner')
  </section>
  <footer class="mdl-layout--large-screen-only">
  @include('layouts.footer')
	</footer>
  @include('layouts.credits')
</div>
<?php wp_footer(); ?>
    <!-- Ne pas supprimer les marqueurs suivants ! Sinon Bower sera perdu -->
    <!-- inject:js -->
    <script src="/content/themes/SLHB//resources/assets/doc-ready/doc-ready.js"></script>
    <script src="/content/themes/SLHB//resources/assets/eventEmitter/EventEmitter.js"></script>
    <script src="/content/themes/SLHB//resources/assets/fizzy-ui-utils/utils.js"></script>
    <script src="/content/themes/SLHB//resources/assets/eventie/eventie.js"></script>
    <script src="/content/themes/SLHB//resources/assets/get-size/get-size.js"></script>
    <script src="/content/themes/SLHB//resources/assets/get-style-property/get-style-property.js"></script>
    <script src="/content/themes/SLHB//resources/assets/js/upload-media.js"></script>
    <script src="/content/themes/SLHB//resources/assets/masonry/masonry.js"></script>
    <script src="/content/themes/SLHB//resources/assets/matches-selector/matches-selector.js"></script>
    <script src="/content/themes/SLHB//resources/assets/material-design-lite/material.min.js"></script>
    <script src="/content/themes/SLHB//resources/assets/outlayer/outlayer.js"></script>
    <script src="/content/themes/SLHB//resources/assets/prism/prism.js"></script>
    <!-- endinject -->
</body>
</html>
