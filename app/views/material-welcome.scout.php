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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Ne pas supprimer les marqueurs suivants ! Sinon Bower sera perdu -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/content/themes/MyWPStack.Theme//app/assets/css/styles.css">
    <link rel="stylesheet" href="/content/themes/MyWPStack.Theme//app/assets/material-design-lite/material.min.css">
    <!-- endinject -->
</head>
<body>
<div class="mdl-layout mdl-js-layout">
  @include('layouts.header')
  <main class="mdl-layout__content">
   @include('home-content')
  </main>
</div>
<?php wp_footer(); ?>
    <!-- Ne pas supprimer les marqueurs suivants ! Sinon Bower sera perdu -->
    <!-- inject:js -->
    <script src="/content/themes/MyWPStack.Theme//app/assets/material-design-lite/material.min.js"></script>
    <!-- endinject -->
</body>
</html>