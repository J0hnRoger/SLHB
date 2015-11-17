<?php

return array(

    /**
     * Mapping for all classes without a namespace.
     * The key is the class name and the value is the
     * absolute path to your class file.
     *
     * Watch your commas...
     */
    // Controllers
    'BaseController'        => themosis_path('app').'controllers'.DS.'BaseController.php',
    'HomeController'        => themosis_path('app').'controllers'.DS.'HomeController.php',
    'AgendaController'        => themosis_path('app').'controllers'.DS.'AgendaController.php',
    // Models
    'PostModel'             => themosis_path('app').'models'.DS.'PostModel.php',
    'NavigationModel'       => themosis_path('app').'models'.DS.'NavigationModel.php',
    'PageModel'             => themosis_path('app').'models'.DS.'PageModel.php',
    // Miscellaneous

);
