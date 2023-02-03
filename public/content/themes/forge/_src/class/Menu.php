<?php

namespace Deljdlx\WPForge;


class Menu
{
    public readonly Theme $theme;

    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
    }

    public function addLocation($name, $label)
    {
        add_action( 'after_setup_theme', function() use ($name, $label) {
            //DOC register_nav_menus register menu emplacement https://developer.wordpress.org/reference/functions/register_nav_menus/
            register_nav_menus( array(
                $name => __($label),
            ));
        }, 0);
    }

    public function render($locatioName, $rendererOrOptions = null)
    {
        $menuLocations = get_nav_menu_locations();
        $html = '';
        if (isset($menuLocations[$locatioName])) {
            // DOC wp_get_nav_menu_object get menu by name https://developer.wordpress.org/reference/functions/wp_get_nav_menu_object/
            $menu = wp_get_nav_menu_object($menuLocations[$locatioName]);

            if(is_callable($rendererOrOptions)) {
                $html = '';
                // DOC wp_get_nav_menu_items get menu items https://developer.wordpress.org/reference/functions/wp_get_nav_menu_items/
                $menuitems = wp_get_nav_menu_items($menu->term_id, array( 'order' => 'DESC' ));
                foreach ($menuitems as $index => $post) {
                    $html .= $rendererOrOptions($post);
                }
            }
            else {

                $defaultOptions = [
                    'menu' => $menu->slug,
                    'container' => 'nav',    // la balise HTML qui sera utilisée pour encapsuler le menu
                    'container_class' => 'nav-menu navbar',    // la classe qui sera appliqué au container
                    'container_id' => 'navbar', // l'id qui sera application au container

                    // 'menu_class' => 'navbar-nav nav ml-auto', // la classe CSS qui sera appliquée au menu (balise ul)
                    'echo' => false,    // nous ne souhaitons pas afficher le menu directement ; nous souhaitons récupérer la "chaine de caractères" retournée

                    // 'link_before' => '<span>',  // le "contenu" qui s'affiche avant le texte du lien
                    // 'link_after' => '</span>', // le "contenu" qui s'affiche après le texte du lien
                ];

                if(is_array($rendererOrOptions)) {
                    $options = array_merge($defaultOptions, $rendererOrOptions);
                }
                else {
                    $options = $defaultOptions;
                }

                // DOC wp_nav_menu render a menu https://developer.wordpress.org/reference/functions/wp_nav_menu/
                $html = wp_nav_menu($options);
            }

        }
        return $html;
    }

    public function add($name, $location)
    {

        add_action( 'after_setup_theme', function() use ($name, $location){
            $menuExists = wp_get_nav_menu_object($name);

            if( !$menuExists) {
                // DOC wp_create_nav_menu https://developer.wordpress.org/reference/functions/wp_create_nav_menu/
                $menu_id = wp_create_nav_menu($name);

                /*
                // Set up default BuddyPress links and add them to the menu.
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' =>  __('Home'),
                    'menu-item-classes' => 'home',
                    'menu-item-url' => home_url( '/' ),
                    'menu-item-status' => 'publish'));

                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' =>  __('Activity'),
                    'menu-item-classes' => 'activity',
                    'menu-item-url' => home_url( '/activity/' ),
                    'menu-item-status' => 'publish'));

                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' =>  __('Members'),
                    'menu-item-classes' => 'members',
                    'menu-item-url' => home_url( '/members/' ),
                    'menu-item-status' => 'publish'));

                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' =>  __('Groups'),
                    'menu-item-classes' => 'groups',
                    'menu-item-url' => home_url( '/groups/' ),
                    'menu-item-status' => 'publish'));

                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' =>  __('Forums'),
                    'menu-item-classes' => 'forums',
                    'menu-item-url' => home_url( '/forums/' ),
                    'menu-item-status' => 'publish'));
                */

                // Grab the theme locations and assign our newly-created menu
                // to the BuddyPress menu location.
                if(!has_nav_menu( $location ) && $location){
                    $locations = get_theme_mod('nav_menu_locations');
                    $locations[$location] = $menu_id;
                    set_theme_mod('nav_menu_locations', $locations);
                }
            }
        }, 0);
    }
}

