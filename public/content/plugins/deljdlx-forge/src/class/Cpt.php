<?php

namespace Deljdlx\WPForge\Plugin;


class Cpt
{

    protected Plugin $plugin;

    public function __construct($plugin)
    {
        $this->plugin = $plugin;
    }
}
