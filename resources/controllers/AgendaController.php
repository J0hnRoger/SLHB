<?php

class AgendaController extends BaseController
{
    public function index()
    {
        // admin/application.php or inside any controllers or route closure.
        add_filter('themosisGlobalObject', function($data)
        {
            // Add your data.
            $data['baseurl'] = get_template_directory_uri();
            return $data;
        });

        return View::make('agenda.agenda-content')->with(array(
          'events' => PostModel::getEventPosts(100)
        ));
    }
}

?>
