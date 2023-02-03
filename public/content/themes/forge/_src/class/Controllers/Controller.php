<?php
namespace Deljdlx\WPForge\Controllers;

class Controller
{
    protected $theme;

    public function __construct($theme)
    {
        $this->theme = $theme;
    }
}