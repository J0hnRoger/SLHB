wp post create --post_type=page --post_title="Accueil" --post_status=publish
wp post create --post_type=page --post_title="Agenda" --post_status=publish
wp post create --post_type=page --post_title="Nos équipes" --post_status=publish
wp post create --post_type=page --post_title="Infos pratiques" --post_status=publish
wp post create --post_type=page --post_title="Historique" --post_status=publish
wp post create --post_type=page --post_title="Boutique officielle" --post_status=publish
wp post create --post_type=page --post_title="Contact" --post_status=publish

wp menu create "Menu Principal"
wp menu item add-post menu-principal 1
wp menu item add-post menu-principal 2
wp menu item add-post menu-principal 3
wp menu item add-post menu-principal 4
wp menu item add-post menu-principal 5
wp menu item add-post menu-principal 6
wp menu location assign menu-principal header-navigation
