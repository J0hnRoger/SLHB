<?php 

PostType::make('slug-team', 'Equipes', 'Equipe')->set(array(

    'public'        => true,
    'menu_position' => 20,
    'supports'      => array('title'),
    'rewrite'       => false,
    'query_var'     => false

));