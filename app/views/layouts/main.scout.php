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
    <link rel="stylesheet" href="/content/themes/SLHB//app/assets/material-design-lite/material.min.css">
    <link rel="stylesheet" href="/content/themes/SLHB//app/assets/prism/prism.css">
    <link rel="stylesheet" href="/content/themes/SLHB//app/assets/css/styles.css">
    <!-- endinject -->
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-grid--no-spacing">
  @include('layouts.header')
  <div style="clear:both"></div>
  <main id="content" class="mdl-layout__content">
      @yield('main')
  </main>
  @yield('pre-footer')
  
  <section class="bottom-banner">
  @include('layouts.bottom-banner')
  </section>
  <footer>
  @include('layouts.footer')
  
  @include('layouts.credits')
  </footer>
</div>
<?php wp_footer(); ?>
    <!-- Ne pas supprimer les marqueurs suivants ! Sinon Bower sera perdu -->
    <!-- inject:js -->
    <script src="/content/themes/SLHB//app/assets/material-design-lite/material.min.js"></script>
    <script src="/content/themes/SLHB//app/assets/prism/prism.escapeHtmlMarkup.js"></script>
    <script src="/content/themes/SLHB//app/assets/prism/prism.js"></script>
    <!-- endinject -->
</body>
</html>