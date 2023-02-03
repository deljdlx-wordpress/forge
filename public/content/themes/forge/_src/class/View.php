<?php

namespace Deljdlx\WPForge;

use Deljdlx\WPForge\WpBlade;


class View
{

    public readonly Theme $theme;
    public readonly WpBlade $blade;

    public function __construct(Theme $theme, string|array $templatePaths, string $cachePath)
    {

        $this->theme = $theme;
        $this->blade = new WpBlade(
            (array) $templatePaths,
            $cachePath,
        );

        $this->blade->directive('datetime', function ($expression) {
            return "<?php echo with({$expression})->format('F d, Y g:i a'); ?>";
        });

        $this->blade->directive('wp_head', function () {
            return "<?php wp_head(); ?>";
        });

        $this->blade->directive('wp_footer', function () {
            return "<?php wp_footer(); ?>";
        });

        $this->blade->directive('themeUri', function ($expression) {
            return "<?php echo get_theme_file_uri({$expression});?>";
        });

        $this->blade->directive('termLink', function ($expression) {
            return "<a href=\"<?php echo get_term_link($expression);?>\" class=\"forge-wp-term wp-term\"><?php echo {$expression}->name;?></a>";
        });
    }

    public function component(string $name, $callback)
    {
        return $this->blade->component($name, $callback);
    }

    public function getUri($path)
    {
        return get_theme_file_uri($path);
    }

    public function render($template, $variables = [])
    {
        return $this->blade->make($template, $variables)->render();
    }
}


