<?php

use Deljdlx\WPForge\Components\Card;
use Deljdlx\WPForge\Components\RandomNumber;
use Deljdlx\WPForge\Controllers\CategoryController;
use Deljdlx\WPForge\Models\Category;
use Deljdlx\WPForge\Theme;

require get_theme_file_path('composer/autoload.php');


if(!function_exists('wp_forge')) {
    function wp_forge(): Theme
    {
        static $theme;
        if(!$theme) {


            // add_post_type_support('page', 'excerpt');

            $theme = new Theme('Forge');
            $theme->addCss([
                // 'https://fonts.googleapis.com/css2?family=IBM+Plex+Mono&display=swap',
                'https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap',
                'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css',
                'assets/css/theme.css',
            ]);

            $theme->addJs([
                'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js',
            ]);

            // ===========================================================

            $theme->addSupports([
                'title-tag',
                'post-thumbnails',
                'menus',
            ]);

            // ===========================================================

            $theme->view->blade->component('card', Card::class);

            // ===========================================================

            $theme->sidebar->register('sidebar-right', 'Right sidebar');
            $theme->sidebar->register('sidebar-top', 'Top sidebar');
            $theme->sidebar->register('sidebar-footer', 'Footer sidebar');

            // ===========================================================

            $theme->menu->addLocation('location_header', 'Header menu');
            $theme->menu->add('Header menu', 'location_header');


            $theme->customizer->addSection('colors', 'Colors');
                $theme->customizer->addSetting('colors', 'background-color', 'Background color', WP_Customize_Color_Control::class);
                $theme->customizer->addPreview('background-color', '.header__top');

                $theme->customizer->addSetting('colors', 'header-background-color', 'Header menubackground color', WP_Customize_Color_Control::class);
                $theme->customizer->addPreview('header-background-color', '#header-menu');

            $theme->customizer->addSection('theme-configuration', 'Theme configuration');
                $theme->customizer->addSetting('theme-configuration', 'logo', 'Logo', WP_Customize_Image_Control::class);
                $theme->customizer->addPreview('logo', '.header__logo');


                $theme->customizer->addSetting('theme-configuration', 'footer-text', 'Footer text');
                $theme->customizer->addPreview('footer-text', '.theme-footer-text');

            // ===========================================================

            $theme->admin->addPage('test', 'My plugin', function() use($theme) {
                $controller = new CategoryController($theme);

                if(filter_input(INPUT_GET, 'delete')) {
                    $controller->delete(filter_input(INPUT_GET, 'delete'));
                }

                if(filter_input(INPUT_POST, 'categoryName')) {
                    $controller->add(filter_input(INPUT_POST, 'categoryName'));
                }

                $controller->index();
            });

            $theme->admin->addPage('demo', 'Demo entry', function() {
                echo 'demo entry';
            });


        }

        return $theme;
    }
}

wp_forge();


if(!function_exists('forge_display_categories')) {
    function forge_display_categories($template = '<a href="%url">%name</a> ')
    {
        $categories = get_the_category();
        if(!empty($categories)) {
            foreach($categories as $category) {
                $categoryURL = get_category_link($category);
                $name = $category->name;

                $content = str_replace('%url', $categoryURL, $template);
                $content = str_replace('%name', $category->name, $content);
                echo $content;
            }
        }
    }
}


