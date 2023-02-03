<?php

namespace Deljdlx\WPForge;

class Admin
{
    public readonly Theme $theme;

    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
    }

    public function addPage( $name, $menuEntry, $callback, $priority = 100, $authorizations = 'manage_options', $icon = 'dashicons-admin-tools')
    {
        add_action('admin_menu', function() use($menuEntry, $name, $callback, $authorizations, $priority, $icon) {
            add_menu_page(
                $menuEntry,
                $menuEntry,
                $authorizations,
                $name,
                $callback,
                $icon,
                $priority
            );
        });

        return $this;
    }
}
