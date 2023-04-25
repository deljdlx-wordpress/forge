<?php
namespace Deljdlx\WPForge\Controllers;

use Deljdlx\WPForge\Theme;

class Controller
{
    protected Theme $theme;

    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
    }
}
