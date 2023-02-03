<?php

namespace Deljdlx\WPForge;

use WP_Customize_Control;
use WP_Customize_Manager;

class Customizer
{

    public readonly Theme $theme;


    public readonly array $sections;
    public readonly array $settings;

    public function __construct(Theme $theme)
    {
        $this->theme = $theme;

        add_action(
            'customize_preview_init',
            function () {
                wp_enqueue_style(
                    'customizer-style',
                    get_theme_file_uri('assets/admin/customizer/customizer-global.css'),
                );

                wp_enqueue_script(
                    'customizer-loader',
                    get_theme_file_uri('assets/admin//customizer/customizer-loader.js'),
                    [], // gestion des dépendances,
                    false,
                    true // nous demandons à wp de mettre le javascript dans le footer
                );

                wp_enqueue_script(
                    'customizers',
                    get_theme_file_uri('assets/admin//customizer/customizers.js'),
                    [],
                    false,
                    true
                );
            }
        );
    }

    public function getSetting($name, $default = null)
    {
        return get_theme_mod($name, $default);
    }

    public function addPreview($name, $selector)
    {
        add_action(
            'customize_register',
            function (WP_Customize_Manager $themeCustomizerObject) use ($name, $selector)
            {
                $themeCustomizerObject->selective_refresh->add_partial(
                    $name,
                    [
                        'selector' => $selector,
                        'fallback_refresh' => false,
                    ]
                );
            }
        );

        /*
        add_action( 'wp_footer', function() use ($name) {
            echo '<script>
                document.addEventListener(
                    "DOMContentLoaded",
                    () => {
                        if(typeof(registerCustomizer) !== "undefined") {
                            registerBackgroundColorCustomizer("'. $name .'", "body");
                            console.log("CUSTOMIZER INLINE");
                        }
                    }
                );
            </script>';
        }, 1000);
        */
    }

    public function addSection($name, $label, $order = 300)
    {
        add_action(
            'customize_register',
            function (WP_Customize_Manager $themeCustomizerObject) use ($name, $label, $order)
            {
                $themeCustomizerObject->add_section(
                    $name,
                    [
                        'title' => __($label),
                        'priority' => $order
                    ]
                );
            }
        );
    }

    public function addSetting($section, $name, $label, $control = WP_Customize_Control::class, $default = null)
    {
        add_action(
            'customize_register',
            function (WP_Customize_Manager $themeCustomizerObject) use ($section, $name, $label, $control, $default)
            {
                $themeCustomizerObject->add_setting(
                    $name,
                    [
                        'default' => $default,
                        'transport' => 'postMessage'
                    ]
                );

                $themeCustomizerObject->add_control(
                    new $control(
                        $themeCustomizerObject,
                        $name,
                        [
                            'label' => __($label),
                            'section' => $section,
                            'settings' => $name,
                        ]
                    )
                );
            }
        );
    }
}




