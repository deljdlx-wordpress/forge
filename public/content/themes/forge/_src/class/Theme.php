<?php

namespace Deljdlx\WPForge;

class Theme
{

    public readonly View $view;
    public readonly Loop $loop;
    public readonly Model $model;
    public readonly Menu $menu;
    public readonly Customizer $customizer;
    public readonly Admin $admin;
    public readonly Sidebar $sidebar;


    private string $name;
    private array $css = [];
    private array $js = [];
    private array  $supports = [];



    public function __construct($name)
    {

        $this->name = $name;

        $this->view = new View(
            $this,
            [
                get_stylesheet_directory() . '/templates',
                get_template_directory() . '/templates',
            ],
            get_stylesheet_directory() . '/cache'
        );
        $this->loop = new Loop($this);
        $this->model = new Model($this);
        $this->menu = new Menu($this);
        $this->customizer = new Customizer($this);
        $this->admin = new Admin($this);

        $this->sidebar = new Sidebar($this);


        $this->registerHooks();


        add_filter('pre_get_posts', function($query) {
            // $query->init();
            // dump($query);
            // $query->set('p', 7);
            // wp_reset_query();
            // return new WP_Query();
            // return $query;
        });



        // $posts = Post::published()->get();
        // dump($posts);
        // $posts = Post::status('publish')->get();


    }

    private function registerHooks()
    {
        add_action(
            'wp_enqueue_scripts', // hook name
            [$this, 'loadCss'],
        );

        // loading assets (js/css)
        add_action(
            'wp_enqueue_scripts',
            [$this, 'loadJs'],
        );

        add_action(
            'after_setup_theme', // hook name
            [$this, 'loadSupports'],
        );
    }

    public function addCss(array $css)
    {
        $this->css = array_merge($this->css, $css);
        return $this;
    }

    public function addJs(array $js)
    {
        $this->js = array_merge($this->js, $js);
        return $this;
    }

    public function addSupports(array $supports)
    {
        $this->supports = array_merge($this->supports, $supports);
    }

    public function loadCss()
    {
        foreach ($this->css as $index => $url) {
            if(strpos($url, 'http') === 0) {
                $cssURL = $url;
            }
            else {
                $cssURL = get_theme_file_uri($url);
            }

            wp_enqueue_style(
                'forge-css-' . $index,
                $cssURL,
            );
        }
    }

    public function loadJs()
    {
        foreach ($this->js as $index => $url) {

            if(strpos($url, 'http') !==0 ) {
                $url = get_theme_file_uri($url);
            }

            wp_enqueue_script(
                'forge-js-' . $index,   // js unique name
                $url,
                [], // handle dependencies
                '1.0.0', // javascript file version
                true // js file loaded at the end of body
            );
        }
    }

    public function loadSupports()
    {
        // DOC WP add_theme_support https://developer.wordpress.org/reference/functions/add_theme_support/
        foreach ($this->supports as $feature) {
            add_theme_support($feature);
        }
    }
}

